angular.module('app.controllers')
    .controller('ProjectFileNewController', ['$scope', '$routeParams','ProjectNote', '$location', function($scope,$routeParams, ProjectNote, $location){
        $scope.projectNote            = new ProjectNote();
        $scope.projectNote.project_id = $routeParams.id;
        
        $scope.save = function(){
            if($scope.formCadastro.$valid){

                $scope.projectNote.$save({id: $routeParams.id}).then(function(){
                    $location.path('/project/'+$routeParams.id+'/notes');
                });
            }
        }
        
    }]);