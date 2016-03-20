(function() {
  'use strict';

  angular
    .module('magerepository')
    .controller('MainController', MainController);

  /** @ngInject */
  function MainController(Restangular, toastr) {
    var vm = this;

    vm.addForm = false;

    vm.showForm = (function() {
      vm.addForm = !vm.addForm;
    });

    vm.submitForm = (function() {
      Restangular.all('modules').post({uri: vm.github_url}, ''
      ).then(function(response) {
        toastr.success('Thank you. We\'ll review this very soon.', 'Module added!');
        vm.addForm = false;
        vm.github_url = null;
      }, function(response) {
        toastr.error('Please provide a valid GitHub URI', 'Malformed URI');
      });
    });
  }
})();
