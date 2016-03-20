(function() {
  'use strict';

  angular
    .module('magerepository')
    .config(config);

  /** @ngInject */
  function config($logProvider, toastrConfig, RestangularProvider, envServiceProvider) {
    // Enable log
    $logProvider.debugEnabled(true);

    // Set options third-party lib
    toastrConfig.allowHtml = true;
    toastrConfig.timeOut = 3000;
    toastrConfig.positionClass = 'toast-top-right';
    toastrConfig.preventDuplicates = true;
    toastrConfig.progressBar = true;

    var newBaseUrl = "";
    if (window.location.hostname == "localhost") {
      newBaseUrl = "http://magerepository.app/api/";
    } else {
      newBaseUrl = "/api/";
    }

    RestangularProvider.setBaseUrl(newBaseUrl);
    RestangularProvider.addResponseInterceptor(function(data, operation) {
      var extractedData;
      // .. to look for getList operations
      if (operation === "getList") {
        // .. and handle the data and meta data
        extractedData = data.data;
        extractedData.meta = data.meta;
      } else {
        extractedData = data.data;
      }
      return extractedData;
    });
  }

})();
