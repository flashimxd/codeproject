angular.module('app.controllers')
    .controller('ClientNewController', ['$scope', 'Client', '$location', function($scope, Client, $location){
        $scope.clients = new Client();
        $scope.save = function(){
            $scope.client.$save().then(function(){
                $location.path('/clients');
            });
        }
        
    }]);