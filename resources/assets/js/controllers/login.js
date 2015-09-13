angular.module('app.controllers')
    .controller('loginController', ['$scope','$location', 'OAuth', function($scope, $location, OAuth){
        $scope.user = {
            username: '',
            password: ''
        };

        $scope.error = {
            message: '',
            error: false
        };

        $scope.login = function(){
            if($scope.formlogin.$valid){
                OAuth.getAccessToken($scope.user).then(function(){
                $location.path('home');
                }, function(data){
                    //console.log(data.data.error_description);
                    //alert('login invalido');
                    $scope.error.error = true;
                    $scope.error.message = data.data.error_description;
                })
            }
        };
        
    }]);