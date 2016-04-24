<!DOCTYPE html>
<html lang="en" ng-app="app" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/images/favicon.ico">
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

        <title>Penguin Tracker</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <?php include './includes/common.header.php'; ?>
        <style>
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            #map {
                width: 100%;
                height: 500px;
            }
        </style>
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <?php include 'includes/common.toolbar.php'; ?>
        </nav>

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Penguin Tracker</h1>
                </div>
            </div>
            <div class="row" ng-controller="AngularController">
                <div class="col-md-4">
                    <section class="slider">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="images/penguin-baby.jpg" />
                                </li>
                                <li>
                                    <img src="images/penguin-group.jpg" />
                                </li>
                                <li>
                                    <img src="images/penguin-parent.jpg" />
                                </li>
                                <li>
                                    <img src="images/penguin-sweater.jpeg" />
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="col-md-8"  >
                    Penguin Tracker is a sample website for MSSE 663 Web Frameworks.</br>
                    Now with more AngularJS! (v{{version}})
                </div>

                <div class="col-md-8" ng-controller="PenguinController">
                    <table ng-table="tableParams" class="table table-condensed table-bordered table-striped" show-filter="true">
                        <tr ng-repeat="row in $data">
                            <td data-title="'Scientific Name'" 
                                filter="{scientificName: 'text'}" 
                                sortable="'scientificName'">
                                <a ng-click="notify()"  href="#/penguin/{{row.uuid}}"> {{row.scientificName}}</a></td>

                            <td data-title="'Common Name'" 
                                filter="{commonName: 'text'}" 
                                sortable="'commonName'">{{row.commonName}}</td>
                            <td data-title="'Favorite Food'" 
                                filter="{favoriteFood: 'text'}" 
                                sortable="'favoriteFood'">{{row.favoriteFood}}</td>
                        </tr>
                    </table>
                    <div class="row" ng-controller="PenguinDetailController"> 
                        <ng-view> </ng-view>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="map"></div>
                <script>
                    var map;

                    function initMap() {
                        
                        var styles = [
                            {
                                stylers: [
                                    {hue: "#00ffe6"},
                                    {saturation: -20}
                                ]
                            }, {
                                featureType: "road",
                                elementType: "geometry",
                                stylers: [
                                    {lightness: 100},
                                    {visibility: "simplified"}
                                ]
                            }, {
                                featureType: "road",
                                elementType: "labels",
                                stylers: [
                                    {visibility: "off"}
                                ]
                            }
                        ];

                        var mapOptions = {
                            zoom: 1,
                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                            styles: styles,
                            center: {lat: 0, lng: 0}
                        };
                        map = new google.maps.Map(document.getElementById('map'), mapOptions);
                        new google.maps.Marker({ position: {lat: -75.267354 , lng:  -0.096797}, map: map, title: 'Adelie Penguin'});
                        new google.maps.Marker({ position: {lat: -27.102303 , lng:  15.652575}, map: map, title: 'African Penguin'});
                        new google.maps.Marker({ position: {lat: -54.423812 , lng:  3.338895}, map: map, title: 'ChinStrap Penguin'});
                        new google.maps.Marker({ position: {lat: -75.267354 , lng:  -0.096797}, map: map, title: 'Adelie Penguin'});
                        new google.maps.Marker({ position: {lat: -75.267354 , lng:  -0.096797}, map: map, title: 'Adelie Penguin'});
                        new google.maps.Marker({ position: {lat: -75.267354 , lng:  -0.096797}, map: map, title: 'Adelie Penguin'});
                        new google.maps.Marker({ position: {lat: -75.267354 , lng:  -0.096797}, map: map, title: 'Adelie Penguin'});
                        
                        

                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBeU4aKeJYgT8Ce5tDnquKYYu8VIwNZu8&callback=initMap"
                async defer></script>
            </div>

        </div><!-- /.container -->
        <?php include './includes/common.javascript.php'; ?>
    </body>
</html>