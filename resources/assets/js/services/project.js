angular.module('app.services')
    .service('Project', ['$resource','$filter', '$httpParamSerializer', 'appConfig', function($resource, $filter, $httpParamSerializer, appConfig){
        
        //overider do método save para transformar o due_date no padrão de banco
            
        function _transformDate(data){

            if(angular.isObject(data) && data.hasOwnProperty('due_date')){
                var dt = angular.copy(data); 
                dt.due_date = $filter('date')(data.due_date, 'yyyy-MM-dd');
                console.log($httpParamSerializer(dt)); debugger;
                return $httpParamSerializer(dt);
            }
            return data;   
        };

        return $resource(appConfig.baseUrl+'/project/:id',{ id:'@id' },{
        
            save: {
                method: 'POST',
                transformRequest: _transformDate
            },
        
            update: {
                method: 'PUT'//,
                //transformRequest: _transformDate ->->-> transforme request retira a porra do request->all()
            },
            get: {
                method: 'GET',
                transformResponse: function(data, headers){
                    var dt = appConfig.utils.transformResponse(data, headers);
                    if(angular.isObject(dt) && dt.hasOwnProperty('due_date')){
                        var date  = dt.due_date.split('-');
                        var month = parseInt(date[1])-1;
                        dt.due_date = new Date(date[0], month, date[2]);
                    }

                    return dt;
                }
            }
        });
    }]);