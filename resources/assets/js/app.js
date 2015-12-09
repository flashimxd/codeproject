var app = angular.module('app',['ngRoute','app.controllers', 'angular-oauth2', 'app.services', 'app.filters']);

angular.module('app.controllers',['angular-oauth2','ngMessages']);
angular.module('app.services',['ngResource']);
angular.module('app.filters',[]);

app.provider('appConfig', function(){
    var config = {
        baseUrl: 'http://localhost:8000',
        project: {
            status: [
                {value: 1 ,  label:'Não iniciado'},
                {value: 2,   label: 'Iniciado'},
                {value: 3,   label: 'Concluído'}
            ]
        }
    };

    return {
        config:config,
        $get: function(){
            return config;
        }
    }
});

app.config(['$routeProvider', '$httpProvider','OAuthProvider','OAuthTokenProvider', 'appConfigProvider',function($routeProvider,$httpProvider,OAuthProvider,OAuthTokenProvider, appConfigProvider){
    
    $httpProvider.defaults.headers.post['content-type'] = 'application/x-www-form-urlenconded;charset=utf-8';
    $httpProvider.defaults.headers.put['content-type'] = 'application/x-www-form-urlenconded;charset=utf-8'; 
    $httpProvider.defaults.transformResponse = function(data, headers){
        var headerContent = headers();
        if(headerContent['content-type'] == 'application/json' || headerContent['content-type'] == 'text-json'){
            var dataJson = JSON.parse(data);
            if(dataJson.hasOwnProperty('data')){
                dataJson = dataJson.data;
            }
            return dataJson;
        }

        return data;
    };
    

    $routeProvider
        .when('/login',{
            'templateUrl': 'build/views/login.html',
            'controller' : 'loginController'
        })

        .when('/home',{
            'templateUrl': 'build/views/home.html',
            'controller' : 'homeController'
        })

        .when('/clients',{
            'templateUrl': 'build/views/client/list.html',
            'controller' : 'ClientListController'
        })

        .when('/clients/new',{
            'templateUrl': 'build/views/client/new.html',
            'controller' : 'ClientNewController'
        })

        .when('/clients/:id/edit',{
            'templateUrl': 'build/views/client/edit.html',
            'controller' : 'ClientEditController'
        })

        .when('/clients/:id/remove',{
            'templateUrl': 'build/views/client/remove.html',
            'controller' : 'ClientRemoveController'
        })

        .when('/clients/:id',{
            'templateUrl': 'build/views/client/show.html',
            'controller' : 'ClientShowController'
        })

        //project

        .when('/projects',{
            'templateUrl': 'build/views/project/list.html',
            'controller' : 'ProjectListController'
        })

        .when('/projects/new',{
            'templateUrl': 'build/views/project/new.html',
            'controller' : 'ProjectNewController'
        })

        .when('/projects/:id/edit',{
            'templateUrl': 'build/views/project/edit.html',
            'controller' : 'ProjectEditController'
        })

        .when('/projects/:id/remove',{
            'templateUrl': 'build/views/project/remove.html',
            'controller' : 'ProjectRemoveController'
        })

        //Project note
        .when('/project/:id/notes',{
            'templateUrl': 'build/views/project-note/list.html',
            'controller' : 'ProjectNoteListController'
        })

        .when('/project/:id/notes/:idNote/show',{
            'templateUrl': 'build/views/project-note/show.html',    
            'controller' : 'ProjectNoteShowController'
        })

        .when('/project/:id/notes/new',{
            'templateUrl': 'build/views/project-note/new.html',
            'controller' : 'ProjectNoteNewController'
        })

        .when('/project/:id/notes/:idNote/edit',{
            'templateUrl': 'build/views/project-note/edit.html',
            'controller' : 'ProjectNoteEditController'
        })

        .when('/project/:id/notes/:idNote/remove',{
            'templateUrl': 'build/views/project-note/remove.html',
            'controller' : 'ProjectNoteRemoveController'
        });

    
    OAuthProvider.configure({
      baseUrl: appConfigProvider.config.baseUrl,
      clientId: 'appid',
      clientSecret: 'appsecret', // optional
      grantPath: 'oauth/access_token'
    });
  

    //home config
    /*
    OAuthProvider.configure({
      baseUrl: 'http://localhost:8000',
      clientId: 'rnett',
      clientSecret: '123456', // optional
      grantPath: 'oauth/access_token'
    });
    */

    OAuthTokenProvider.configure({
        name: 'token',
        options: {
            secure: false
        }
    });

}]);


app.run(['$rootScope', '$window', 'OAuth', function($rootScope, $window, OAuth) {
    $rootScope.$on('oauth:error', function(event, rejection) {
      // Ignore `invalid_grant` error - should be catched on `LoginController`.
      if ('invalid_grant' === rejection.data.error) {
        return;
      }

      // Refresh token when a `invalid_token` error occurs.
      if ('invalid_token' === rejection.data.error) {
        return OAuth.getRefreshToken();
      }

      // Redirect to `/login` with the `error_reason`.
      return $window.location.href = '/login?error_reason=' + rejection.data.error;
    });
  }]);