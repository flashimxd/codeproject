angular.module('app.controllers')
    .controller('ProjectNoteNewController', ['$scope', 'Client', '$location', function($scope, Client, $location){
        $scope.client = new Client();
        $scope.save = function(){
            if($scope.formCadastro.$valid){
                $scope.client.$save().then(function(){
                    $location.path('/clients');
                });
            }
        }
        
    }]);