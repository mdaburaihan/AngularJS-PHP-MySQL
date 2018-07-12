<?php include("inc/header.php"); ?>
<div class="container" style="width: 500px;margin-top: 50px">

  <a href="index.php" class="btn btn-primary" role="button">Insert using ng-click</a>
  <a href="formsubmit.php" class="btn btn-primary" role="button">Insert using ng-submit</a>
  <a href="display.php" class="btn btn-primary" role="button">List</a>


  <h3>Select data from database with AngularJS</h3> 
  <div ng-app="myApp" ng-controller="userController">         
    <div class="alert alert-success" ng-show="successUpdate">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{successUpdate}}
    </div>

    <table class="table table-bordered table-hover">
      <thead style="background-color: #d0e4de;">
        <tr>
          <th>Sl No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
       <tr ng-repeat="x in myData">
        <td>{{ $index + 1 }}</td>
        <td>{{ x.name }}</td>
        <td>{{ x.email }}</td>
        <td>
          <button class="btn btn-info btn-xs" ng-click="editData(x.user_id, x.name, x.email)">Edit</button>
          <button class="btn btn-danger btn-xs" ng-click="deleteData(x.user_id)">Delete</button>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update data into database with AngularJS</h4>
        </div>
        <div class="modal-body">
         <input type="hidden" ng-model="user_id">
         <label for="name">Name:</label>
         <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" ng-model="name">
         <br>
         <span class="text-danger" ng-show="errorName">{{errorName}}</span>
         <br>
         <label for="email">Email:</label>
         <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" ng-model="emailid">
         <br>
         <span class="text-danger" ng-show="errorEmail">{{errorEmail}}</span>
         <br>
         <input type="submit" class="btn btn-success" value={{btnName}} ng-click="updateData()"> 
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</div>
</div>


<script>
  var app = angular.module('myApp', []);
  app.controller('userController', function($scope, $http) {
    $http.get("select.php").then(function (response) {
      $scope.myData = response.data;
    });


    $scope.editData =  function(id, name, email){
      $scope.user_id = id;
      $scope.name = name;
      $scope.emailid = email;

      $scope.btnName = "UPDATE";
      $('#myModal').modal('show');
    }


    $scope.updateData = function(){
      if($scope.name == "")
      {
        $scope.errorName = "Name is required.";
      }
      else if($scope.emailid == "")
      {
        $scope.errorEmail = "Email is required.";
      }
      else
      {
        $http.post(
          "update.php",
          {"user_id":$scope.user_id, "name":$scope.name, "email":$scope.emailid}
          ).success(function(data){
            $scope.name = null;
            $scope.emailid = null;
            $scope.user_id = null;
            $('#myModal').modal('hide');
            $scope.successUpdate = data;
            $http.get("select.php").then(function (response) {
              $scope.myData = response.data;
            });

          });
        }
      }


       $scope.deleteData = function(id){
        if(confirm("Are you sure? you want to delete this data?"))
        {
          $http.post(
          "delete.php",
          {"user_id":id}
          ).success(function(data){
            alert(data);
            $http.get("select.php").then(function (response) {
              $scope.myData = response.data;
            });
          });
        }
        else
        {
          return false;
        }
       }
    });
  </script>
