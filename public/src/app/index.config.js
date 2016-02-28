(function() {
  'use strict';

  angular
    .module('magerepository')
    .config(config);

  /** @ngInject */
  function config($logProvider, toastrConfig, RestangularProvider) {
    // Enable log
    $logProvider.debugEnabled(true);

    // Set options third-party lib
    toastrConfig.allowHtml = true;
    toastrConfig.timeOut = 3000;
    toastrConfig.positionClass = 'toast-top-right';
    toastrConfig.preventDuplicates = true;
    toastrConfig.progressBar = true;

    RestangularProvider.setBaseUrl('http://magerepository.app/api/');
    RestangularProvider.addResponseInterceptor(function(data, operation, what, url, response, deferred) {
      var extractedData;
      // .. to look for getList operations
      if (operation === "getList") {
        // .. and handle the data and meta data
        extractedData = data.data;
        extractedData.meta = data.meta;
      } else {
        extractedData = data.data;
      }
      console.log(extractedData);
      return extractedData;
    });
  }

})();
