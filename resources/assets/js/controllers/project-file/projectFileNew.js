angular.module('app.controllers')
    .controller('ProjectFileNewController', ['$scope', '$routeParams', '$location', 'appConfig', 'Url', 'Upload', function($scope, $routeParams, $location, appConfig, Url ,Upload){

console.log('file newww'); debugger;
        $scope.save = function(){

            console.log('savee'); debugger;
            if($scope.formCadastro.$valid){

                var url = appConfig.baseUrl+Url.getUrlFromUrlSymbol(appConfig.urls.projecFile,{
                    id: $routeParams.id,
                    idFile: ''
                });

                console.log(url); debugger;

                Upload.upload({
                    url: url,
                    data: {
                        file: $scope.projecFile.file, 
                        'name': $scope.projecFile.name, 
                        'description': $scope.projecFile.description,
                        'project_id': $routeParams.id
                    }
                }).then(function (resp) {
                    console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
                }, function (resp) {
                    console.log('Error status: ' + resp.status);
                })

            }
        }
        
    }]);