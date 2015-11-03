angular.module('app.controllers')
    .controller('ClientShowController', ['$scope', 'Client', '$location','$routeParams', function($scope, Client, $location, $routeParams){
        $scope.client = Client.get({id: $routeParams.id});
    }]);