var app = angular.module('app',['ngRoute','app.controllers', 'angular-oauth2', 'app.services']);

angular.module('app.controllers',['angular-oauth2','ngMessages']);
angular.module('app.services',['ngResource']);

app.provider('appConfig', function(){
    var config = {
        baseUrl: 'http://localhost:8000'
    };

    return {
        config:config,
        $get: function(){
            return config;
        }
    }
});

app.config(['$routeProvider', 'OAuthProvider','OAuthTokenProvider',function($routeProvider,OAuthProvider,OAuthTokenProvider){
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

    OAuthProvider.configure({
      baseUrl: 'http://localhost:8000',
      clientId: 'rnett',
      clientSecret: '123456', // optional
      grantPath: 'oauth/access_token'
    });

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