angular.module('app.controllers')
    .controller('ProjectNoteEditController', ['$scope', 'Client', '$location','$routeParams', function($scope, Client, $location, $routeParams){
        $scope.client = Client.get({id: $routeParams.id});
        $scope.save = function(){
            if($scope.formCadastro.$valid){

                Client.update({id: $scope.client.id},$scope.client,
                function(){
                    $location.path('/clients');
                });
            }
        }
        
    }]);