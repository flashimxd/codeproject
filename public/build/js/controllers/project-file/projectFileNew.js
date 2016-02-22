angular.module('app.controllers')
    .controller('ProjectFileNewController', ['$scope', '$routeParams', '$location', 'appConfig', 'Url', 'Upload', function($scope, $routeParams, $location, appConfig, Url ,Upload){

        $scope.projectFile = {
            project_id: $routeParams.id
        };
        //console.log(appConfig.urls.projectFile); debugger;
        $scope.save = function(){

            if($scope.formCadastro.$valid){

                var url = appConfig.baseUrl+Url.getUrlFromUrlSymbol(appConfig.urls.projectFile,{
                    id: $routeParams.id,
                    idFile: ''
                });

                //console.log($scope.projectFile.file); debugger;

                Upload.upload({
                    url: url,
                    fields: {
                        name: $scope.projectFile.name,
                        description: $scope.projectFile.description,
                        project_id: $routeParams.id
                    },

                    file: $scope.projectFile.file,
                }).then(function (resp) {
                    console.log('Success ' + resp.data.name + 'uploaded. Response: ' + resp.data);
                }, function (resp) {
                    console.log('Error status: ' + resp.status);
                })

            }
        }

    }]);