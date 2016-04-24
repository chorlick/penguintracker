/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


app.controller("PenguinController", function ($scope, $log, NgTableParams, PenguinListService) {
    $scope.data = [];
    $scope.filters = {};
    $scope.sorting = {
        scientificName: "asc"
    };

    $scope.tableParams = new NgTableParams({
        count: 5,
        sorting: $scope.sorting,
        filter: $scope.filters
    }, {counts: [5, 10, 25], data: $scope.data});

    PenguinListService.getPenguinList().then(function (response) {
        $scope.tableParams = new NgTableParams({
            count: 5,
            sorting: $scope.sorting,
            filter: $scope.filters
        }, {counts: [5, 10, 25], data: response});
        $scope.data = response;
    });
    
    $scope.notify = function() {
        alert('blah');
    }
});