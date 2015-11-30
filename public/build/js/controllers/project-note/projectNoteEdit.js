angular.module('app.controllers')
    .controller('ProjectNoteEditController', ['$scope', 'ProjectNote', '$location','$routeParams', function($scope, ProjectNote, $location, $routeParams){
        $scope.projectNote = ProjectNote.get({
            id: $routeParams.id,
            idNote: $routeParams.idNote
        });

        $scope.save = function(){

            if($scope.formCadastro.$valid){

                ProjectNote.update({id: null, idNote: $scope.projectNote.id},$scope.projectNote,
                function(){
                    $location.path('/project/'+$routeParams.id+'/notes');
                });
            }
        }
        
    }]);