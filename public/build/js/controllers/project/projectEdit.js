angular.module('app.controllers')
    .controller('ProjectEditController', ['$scope','$routeParams','Project', '$location', '$cookies', 'Client','appConfig', function($scope, $routeParams, Project, $location, $cookies ,Client, appConfig){
        //console.log($routeParams.id); debugger;
        $scope.project  = Project.get({id: $routeParams.id});

        //console.log($scope.project); debugger;
        $scope.clients  = Client.query();
        $scope.status   = appConfig.project.status;
        
        $scope.save = function(){
            if($scope.formCadastro.$valid){
                $scope.project.owner_id = $cookies.getObject('user').id;
                console.log($scope.project); debugger;
                Project.update({id: $scope.project.id}, $scope.project, function(){
                    $location.path('/projects');
                });

                /*
                Client.update({id: $scope.client.id},$scope.client,
                function(){
                    $location.path('/clients');
                });
                */
            }
        }
        
    }]);