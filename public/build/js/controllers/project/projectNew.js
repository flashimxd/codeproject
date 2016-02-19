angular.module('app.controllers')
    .controller('ProjectNewController', ['$scope','Project', '$location', '$cookies', 'Client','appConfig', function($scope, Project, $location, $cookies ,Client, appConfig){
        $scope.project  = new Project();
        $scope.status   = appConfig.project.status;

        $scope.due_date = {
            status:{
                opened: false
            }
        };

        $scope.open = function($event){
            $scope.due_date.status.opened = true;
        }

        $scope.save = function(){
            if($scope.formCadastro.$valid){
                $scope.project.owner_id = $cookies.getObject('user').id;
                $scope.project.$save().then(function(){
                    $location.path('/projects');
                });
            }
        }

        $scope.getName = function(model){

            if(model){
                return model.name;
            }else{
                return '';
            }
        };

        $scope.getClients = function(name){

            return Client.query({
                search: name,
                searchFields: 'name:like'
            }).$promise;
        };

        $scope.selectClient = function(item){
            $scope.project.client_id = item.id;
        }
        
    }]);