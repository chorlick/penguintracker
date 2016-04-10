
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


app.controller("PenguinDetailController", function ($scope, $log) {

    
    $log.debug("Uuid " + $scope.uuid);
    
});