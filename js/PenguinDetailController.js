/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
app.controller("PenguinDetailController", function ($scope, $log, $routeParams, PenguinDetailService) {


    $scope.uuid = $routeParams.uuid;
    $scope.penguin = {};

    $scope.init = function () {
        PenguinDetailService.getPenguin($scope.uuid).then(function (response) {
            $scope.penguin = response;
        });
    }

    $scope.init();
});
