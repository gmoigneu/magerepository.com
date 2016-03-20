(function() {
    'use strict';

    angular
        .module('magerepository')
        .controller('ModuleController', ModuleController)
    ;

    /** @ngInject */
    function ModuleController($log, $stateParams, Restangular) {
        var vm = this;

        Restangular.one('modules', $stateParams.moduleId).get().then(function(module) {
            vm.module = module;
            vm.author = module.author.data;
            vm.readme = atob(module.readme);
        });

    }

})();

