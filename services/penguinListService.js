/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


app.service("PenguinListService", function ($http, $log) {

    this.getPenguinList = function () {
       return $http.get("/ajax/penguinListController.php").then(function (response) {
            return response.data;
        });
    }

});