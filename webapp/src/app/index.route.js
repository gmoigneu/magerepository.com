(function() {
  'use strict';

  angular
    .module('magerepository')
    .config(routerConfig);

  /** @ngInject */
  function routerConfig($stateProvider, $urlRouterProvider) {

    $stateProvider
      .state('list-mp', {
        url: '/:order/page/:page',
        templateUrl: 'app/list/list.html',
        controller: 'ListController',
        controllerAs: 'list'
      })
      .state('list-m', {
        url: '/:order',
        templateUrl: 'app/list/list.html',
        controller: 'ListController',
        controllerAs: 'list'
      })
      .state('module', {
        url: '/module/:moduleId',
        templateUrl: 'app/module/module.html',
        controller: 'ModuleController',
        controllerAs: 'module'
      })
      .state('author', {
        url: '/author/:authorId',
        templateUrl: 'app/author/author.html',
        controller: 'AuthorController',
        controllerAs: 'author'
      });
    $urlRouterProvider.otherwise('/');
  }
  
})();
