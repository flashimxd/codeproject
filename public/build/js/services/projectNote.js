angular.module('app.services')
    .service('ProjectNote', ['$resource', 'appConfig', function($resource, appConfig){
        return $resource(appConfig.baseUrl+'/project/:id/note/:idNote',
            {
                id:'@id',
                idNote:'@idNote'
            },
            {
            update: {
                method: 'PUT'
            }/*,
            query: {
                method: 'GET',
                isArray: true,
                transformResponse: function(data, headers){
                    var returnJson = JSON.parse(data);
                    return returnJson.data;
                }
            }/*,
            get: {
                method: 'GET',
                //isArray: true,
                transformResponse: function(data, headers){
                    console.log(headers); debugger;
                    var returnJson = JSON.parse(data);
                    return returnJson.data[0];
                }
            } */
            /*
            get: {
                method: 'GET',
                transformRequest: function(data, headers){
                    //debugger;
                   // console.log(data, headers); debugger;
                    var headerContent = headers();
                    console.log(headerContent); debugger;

                    if(headerContent.accept == 'application/json, text/plain, *'){
                        var dataJson = JSON.parse(data);
                        //console.log(dataJson); debugger;
                        if(dataJson.hasOwnProperty('data')){
                            dataJson = dataJson.data;
                        }
                        //console.log(dataJson); debugger;
                        
                        return dataJson[0];
                    }

                    return data;
                }
            } */
        
            
        });
    }]);


/*

Route::get('{id}/note', 'ProjectNoteController@index'); 
Route::post('{id}/note', 'ProjectNoteController@store');
Route::get('{id}/note/{id_note}', 'ProjectNoteController@show');
Route::put('{id}/note/{id_note}', 'ProjectNoteController@update');
Route::delete('{id}/note/{id_note}', 'ProjectNoteController@destroy');

*/