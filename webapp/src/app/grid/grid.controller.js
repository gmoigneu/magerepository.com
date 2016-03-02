(function() {
  'use strict';

    angular
        .module('magerepository')
        .controller('GridController', GridController)
    ;

    /** @ngInject */
    function GridController($log, $state, Restangular) {
        var vm = this;

        var mode = $state.current.name;

        switch(mode) {
            case 'popular':
                vm.gridTitle = "Popular modules";
                break;
            case 'updated':
                vm.gridTitle = "Recently updated modules";
                break;
            case 'new':
                vm.gridTitle = "New modules";
                break;
        }

        Restangular.all('modules').getList({'order': mode}).then(function(modules) {
            vm.modules = modules;
            var pagination = modules.meta.pagination;
            vm.page = pagination.current_page;
            vm.pageSize = pagination.per_page;
            vm.total = pagination.total;
        });

        vm.DoCtrlPagingAct = function(text, page, pageSize, total) {
            $log.info({
                text: text,
                page: page,
                pageSize: pageSize,
                total: total
            });

            Restangular.all('modules').getList({'order': mode, 'page': page, 'count': pageSize}).then(function(modules) {
                vm.modules = modules;
                var pagination = modules.meta.pagination;
                vm.page = pagination.current_page;
                vm.pageSize = pagination.per_page;
                vm.total = pagination.total;
            });
        };
    }

})();

