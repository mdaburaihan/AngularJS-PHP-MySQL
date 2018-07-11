
<!-- AngularJS form data insert using ng-submit-->
<?php include("inc/header.php"); ?>
<div class="container" style="width: 500px;margin-top: 50px">
 <div ng-app="myApp" ng-controller="userController">
  <h3>Insert data into database with AngularJS</h3>
  <form name="myform" ng-submit="insertData()">
     <span class="text-success" ng-show="successInsert">{{successInsert}}</span>
     <br>
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" ng-model="insert.name">
    <br>
    <span class="text-danger" ng-show="errorName">{{errorName}}</span>
    <br>
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" ng-model="insert.emailid">
    <br>
    <span class="text-danger" ng-show="errorEmail">{{errorEmail}}</span>
    <br>
     <input type="submit" class="btn btn-success" name="insert" value="Submit"> 
   </form>
</div>
</div>

<script>
  var app = angular.module("myApp",[]);

  app.controller("userController",function($scope,$http){
    $scope.insert = {}; //blank form data object
    $scope.insertData = function(){
      $http({
        method:"POST",
        url:"insert_submit.php",
        data:$scope.insert,
      }).success(function(data){
        if(data.error)
        {
          $scope.errorName = data.error.name;
          $scope.errorEmail = data.error.email;
        }
        else
        {
          $scope.insert = null;
          $scope.errorName = null;
          $scope.errorEmail = null;
          $scope.successInsert = data.message;
        }
      });
    }
  });
</script>