angular.module('app.services')
    .service('ProjectNote', ['$resource', 'appConfig', function($resource, appConfig){
        return $resource(appConfig.baseUrl+'/project/:id/note/:idNote',
            {
                id:'@id',
                idNote: '@idNote'
            },
            {
            update: {
                method: 'PUT'
            }
        });
    }]);


/*

Route::get('{id}/note', 'ProjectNoteController@index'); 
Route::post('{id}/note', 'ProjectNoteController@store');
Route::get('{id}/note/{id_note}', 'ProjectNoteController@show');
Route::put('{id}/note/{id_note}', 'ProjectNoteController@update');
Route::delete('{id}/note/{id_note}', 'ProjectNoteController@destroy');

*/