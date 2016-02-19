angular.module('app.controllers')
    .controller('ProjectFileRemoveController', ['$scope', 'ProjectNote', '$location','$routeParams', function($scope, ProjectNote, $location, $routeParams){

        $scope.projectNote = ProjectNote.get({
            id: $routeParams.id,
            idNote: $routeParams.idNote
        });

        //console.log($scope.projectNote); debugger;

        $scope.remove = function(){
            $scope.projectNote.$delete({id: null, idNote: $scope.projectNote.id}).then(function(){
                $location.path('/project/'+$routeParams.id+'/notes');
            });
        }
        
    }]);