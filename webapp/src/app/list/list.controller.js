(function() {
  'use strict';

    angular
        .module('magerepository')
        .controller('ListController', ListController)
    ;
    
    
    function ListController($log, $state, $stateParams, Restangular) {
        var vm = this;

        var params = {};
        params.order = ($stateParams.order) ? $stateParams.order : 'popular';
        vm.order = params.order;
        params.page = ($stateParams.page) ? $stateParams.page : '1';

        Restangular.all('modules').getList(params).then(function(modules) {
            vm.modules = modules;
            var pagination = modules.meta.pagination;
            vm.currentPage = pagination.current_page;
            vm.pageSize = pagination.per_page;
            vm.total = pagination.total;
        });

        vm.DoCtrlPagingAct = function(text, page, pageSize, total) {
            $state.go('list-mp', {
                'order': params.order,
                'page': page
            });
        };
        
        vm.DoOrderUpdate = function() {
            $state.go('list-mp', {
                'order': vm.order,
                'page': params.page
            });
        };
    }
})();

