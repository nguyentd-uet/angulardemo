<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
    
    <base href="{{ asset('') }}">
    <style type="text/css">
        tr th {
            text-align: center;
        }
        .nav-menu li a {
            background-color: #ecf0f1;
        }
        .menu {
            margin-top: 0px;
            margin-left: 20px;
            margin-right: 20px;
            padding: 110px 10px;

        }
        .menu .nav li {
            padding: 2px;
        }
        .menu .nav li a {
            padding: 15px;
        }
        .validation-message {
            color: red;
            font-style: italic;
            font-weight: normal;
        }
        .content {
            margin-top: 100px;

        }
        .icon {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body ng-app="myApp" >
    <div class="wrapper">
    	<!-- Navbar -->
    	@include('admin.header')
    	<!-- ./ Navbar -->

		<div class="row">
			<!-- Menu -->
			<div class="col-md-2 menu">
                <ul class="nav nav-pills nav-stacked nav-menu">
                    <li><a href="/nguyen/angular/angulardemo/admin#/"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
                    <li><a href="/nguyen/angular/angulardemo/admin#user" ><span class="glyphicon glyphicon-user"></span> User</a></li>
                    <li><a href="/nguyen/angular/angulardemo/admin#category" ><span class="glyphicon glyphicon-list"></span> Category</a></li>
                    <li><a href="/nguyen/angular/angulardemo/admin#item" ><span class="glyphicon glyphicon-list"></span> Item</a></li>
                </ul>
            </div>
			<!-- ./ Menu -->
            <div class="col-md-9 content">
                <div ng-view></div>

               
            </div>
            
			
		</div>

	</div>

    <script>
        var app = angular.module("myApp", ["ngRoute"], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
        app.constant('CSRF_TOKEN', '{!! csrf_token() !!}')
        
        app.config(function($routeProvider) {
            $routeProvider
            .when("/", {
                templateUrl: "resources/views/admin/index2.htm",
                controller: "dashboardCtr"
            })
            .when("/user", {
                templateUrl: "resources/views/admin/user.blade.php" ,
                controller: "userCtr"
            })
            .when("/category", {

            })
            .when("/item", {

            });

        });

        app.controller('dashboardCtr', function($scope, $http){
            $http.get(window.location.protocol + '//' + window.location.hostname +"/nguyen/angular/angulardemo/admin/dashboard")
            .then(function(response) {
                // console.log(response.data);
                $scope.countUser = response.data.countUser;
                $scope.countCate = response.data.countCate;
                $scope.countItem = response.data.countItem;
            });
        });

        app.controller('userCtr', function($scope, $http, $httpParamSerializerJQLike){
            $scope.token = '{!! csrf_token() !!}';

            $http.get(window.location.protocol + '//' + window.location.hostname +"/nguyen/angular/angulardemo/admin/users")
            .then(function (response) {
                // console.log(response.data.users);
                $scope.users = response.data.users;
                
            });
            $scope.oderByMe = function(x) {
                $scope.myOder = x;
            };
            
            $scope.register = function() {
                $http({
                    method: 'POST',
                    url: window.location.protocol + '//' + window.location.hostname +"/nguyen/angular/angulardemo/register2",
                    data: $httpParamSerializerJQLike({
                            "_token":$scope.token,
                            "name":$scope.name,
                            "email":$scope.email,
                            "password":$scope.password,
                            "password_confirmation":$scope.password_confirmation
                    }),
                    headers:
                        {'Content-Type': 'application/x-www-form-urlencoded'}
                }).success(function (data, status, headers, config) {
                    
                }).error(function (data, status, headers, config) {
                    // handle error things
                });
            };
            
           

        });
    </script>

    
</body>
</html>