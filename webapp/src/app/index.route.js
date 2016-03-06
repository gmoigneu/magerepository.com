(function() {
  'use strict';

  angular
    .module('magerepository')
    .config(routerConfig);

  /** @ngInject */
  function routerConfig($stateProvider, $urlRouterProvider) {

    $stateProvider
      .state('popular', {
        url: '/',
        templateUrl: 'app/grid/grid.html',
        controller: 'GridController',
        controllerAs: 'grid'
      })
      .state('new', {
        url: '/new',
        templateUrl: 'app/grid/grid.html',
        controller: 'GridController',
        controllerAs: 'grid'
      })
      .state('updated', {
        url: '/updated',
        templateUrl: 'app/grid/grid.html',
        controller: 'GridController',
        controllerAs: 'grid'
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
