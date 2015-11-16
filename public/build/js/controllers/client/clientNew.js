angular.module('app.controllers')
    .controller('ClientNewController', ['$scope', 'Client', '$location', function($scope, Client, $location){
        $scope.client = new Client();
        $scope.save = function(){
            debugger;
            if($scope.formCadastro.$valid){
                $scope.client.$save().then(function(){
                     $location.path('/clients');
                });
            }
        }
        
    }]);