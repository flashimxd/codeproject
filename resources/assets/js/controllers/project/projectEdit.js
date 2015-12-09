angular.module('app.controllers')
    .controller('ProjectEditController', ['$scope','$routeParams','Project', '$location', '$cookies', 'Client','appConfig', function($scope, $routeParams, Project, $location, $cookies ,Client, appConfig){
        $scope.project  = Project.get({id: $routeParams.id});

        console.log($scope.project); debugger;
        $scope.clients  = Client.query();
        $scope.status   = appConfig.project.status;
        
        $scope.save = function(){
            if($scope.formCadastro.$valid){
                $scope.project.owner_id = $cookies.getObject('user').id;
                Project.update({id: $scope.project_id}, $scope.project, function(){
                    $location.path('/projects');
                })
            }
        }
        
    }]);