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

        <title>Penguin Tracker</title>

        <?php include './includes/common.header.php'; ?>
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
                    <img src="/images/240x342xemperor-penguin-clipart-2.png" alt="Penguin" class="img-rounded" style="max-width:100%;">
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
                                sortable="'scientificName'"><a href="#/penguin/{{row.uuid}}"> {{row.scientificName}}</a></td>
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

        </div><!-- /.container -->
        <?php include './includes/common.javascript.php'; ?>
    </body>
</html>