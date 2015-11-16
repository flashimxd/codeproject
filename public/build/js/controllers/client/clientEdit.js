angular.module('app.controllers')
    .controller('ClientEditController', ['$scope', 'Client', '$location','$routeParams', function($scope, Client, $location, $routeParams){
        //console.log($routeParams.id); debugger;
        $scope.client = Client.get({id: $routeParams.id});
        //console.log($scope.client); debugger;
        $scope.save = function(){
            if($scope.formCadastro.$valid){

                Client.update({id: $scope.client.id},$scope.client,
                function(){
                    $location.path('/clients');
                });
            }
        }
        
    }]);