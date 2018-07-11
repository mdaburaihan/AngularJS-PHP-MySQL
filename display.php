<?php include("inc/header.php"); ?>
<div class="container" style="width: 500px;margin-top: 50px">

<a href="index.php" class="btn btn-primary" role="button">Insert using ng-click</a>
<a href="formsubmit.php" class="btn btn-primary" role="button">Insert using ng-submit</a>
<a href="display.php" class="btn btn-primary" role="button">List</a>


 <h3>Select data from database with AngularJS</h3> 
 <div ng-app="myApp" ng-controller="userController">         
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Sl No</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
     <tr ng-repeat="x in myData">
      <td>{{ $index + 1 }}</td>
      <td>{{ x.name }}</td>
      <td>{{ x.email }}</td>
    </tr>
  </tbody>
</table>
</div>
</div>

<script>
  var app = angular.module('myApp', []);
  app.controller('userController', function($scope, $http) {
    $http.get("select.php").then(function (response) {
      $scope.myData = response.data;
    });
  });
</script>
