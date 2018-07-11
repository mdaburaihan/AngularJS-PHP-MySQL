
<!-- AngularJS form data insert using ng-click -->
<?php include("inc/header.php"); ?>
<div class="container" style="width: 500px;margin-top: 50px">

<a href="index.php" class="btn btn-primary" role="button">Insert using ng-click</a>
<a href="formsubmit.php" class="btn btn-primary" role="button">Insert using ng-submit</a>
<a href="display.php" class="btn btn-primary" role="button">List</a>

 <div ng-app="myApp" ng-controller="userController">
  <h3>Insert data into database with AngularJS</h3>
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" ng-model="name">
    <br>
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" ng-model="emailid">
    <br>
     <input type="submit" class="btn btn-success" value="Submit" ng-click="insertData()"> 
</div>
</div>

<script>
  var app = angular.module("myApp",[]);

  app.controller("userController",function($scope,$http){
    $scope.insertData = function(){
      $http.post(
        "insert.php",
        {"name":$scope.name, "email":$scope.emailid}
        ).success(function(data){
        alert(data);
        $scope.name = null;
        $scope.emailid = null;
      });
    }

  });
</script>