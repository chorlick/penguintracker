/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


app.service("PenguinDetailService", function ($http, $log) {

    this.getPenguin = function (uuid) {
       return $http.get("/ajax/penguinDetailController.php?uuid=" + uuid).then(function (response) {
            return response.data;
        });
    }

});