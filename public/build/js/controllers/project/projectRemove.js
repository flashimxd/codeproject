angular.module('app.controllers')
    .controller('ProjectRemoveController', ['$scope', 'ProjectNote', '$location','$routeParams','Project', function($scope, ProjectNote, $location, $routeParams, Project){

        $scope.project = Project.get({ id: $routeParams.id });

        //console.log($scope.projectNote); debugger;

        $scope.remove = function(){
            $scope.project.$delete({id: $scope.project.project_id}).then(function(){
                $location.path('/projects/');
            });
        }
        
    }]);