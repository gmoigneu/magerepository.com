(function() {
    'use strict';

    angular
        .module('magerepository')
        .controller('AuthorController', AuthorController)
    ;

    /** @ngInject */
    function AuthorController($log, $stateParams, Restangular) {
        var vm = this;

        Restangular.one('authors', $stateParams.authorId).get().then(function(author) {
            vm.author = author;
            $log.info(vm.author);
        });

    }

})();

