
var app = angular.module('app', ['ngTable', 'ngRoute']);

app.controller("AngularController", function ($scope) {
    $scope.version = angular.version.full;
});

app.config(function ($routeProvider) {
    $routeProvider.
      when('/penguin/:uuid', {
        templateUrl: 'partials/penguinDetail.html',
        controller: 'PenguinDetailController'
      }).
      otherwise({
        redirectTo: '/home'
      });
});


