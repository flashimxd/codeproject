angular.module('app.services')
    .service('ProjectFile', ['$resource', 'appConfig', 'Url', function($resource, appConfig, Url){
        var url  = appConfig.baseUrl+Url.getUrlResorces(appConfig.urls.projectFile);
        return $resource(url,
            {
                id:'@id',
                idFile:'@idFile'
            },
            {
            update: {
                method: 'PUT'
            }

            });
    }]);