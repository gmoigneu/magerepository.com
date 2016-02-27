'use strict';

var angular = require('angular');

var WelcomeCtrl = require('./controllers/welcome');

var app = angular.module('mageRepository', []);
app.controller('WelcomeCtrl', ['$scope', WelcomeCtrl]);