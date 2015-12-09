angular.module('app.controllers')
    .controller('ProjectNewController', ['$scope','Project', '$location', '$cookies', 'Client','appConfig', function($scope, Project, $location, $cookies ,Client, appConfig){
        $scope.project  = new Project();
        $scope.clients  = Client.query();
        $scope.status   = appConfig.project.status;
        
        $scope.save = function(){
            if($scope.formCadastro.$valid){
                $scope.project.owner_id = $cookies.getObject('user').id;
                $scope.project.$save().then(function(){
                    $location.path('/projects');
                });
            }
        }
        
    }]);