<?php

use Illuminate\Support\Facades\Route;

/*
*
* Frontend Routes
*
* --------------------------------------------------------------------
*/

Route::group(['namespace' => '\Modules\Collection\Http\Controllers\Frontend', 'as' => 'frontend.', 'middleware' => 'web', 'prefix' => ''], function () {
    /*
     *
     *  Subjects Routes
     *
     * ---------------------------------------------------------------------
     */
    $module_name = 'subjects';
    $controller_name = 'SubjectsController';
    Route::get("{$module_name}", ['as' => "{$module_name}.index", 'uses' => "{$controller_name}@index"]);
    Route::get("{$module_name}/{id}/{slug?}", ['as' => "{$module_name}.show", 'uses' => "{$controller_name}@show"]);

    // /*
    //  *
    //  *  Taxons Routes
    //  *
    //  * ---------------------------------------------------------------------
    //  */
    // $module_name = 'taxons';
    // $controller_name = 'TaxonsController';
    // Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    // Route::get("$module_name/{id}/{slug?}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);
});

/*
*
* Backend Routes
*
* --------------------------------------------------------------------
*/
Route::group(['namespace' => '\Modules\Collection\Http\Controllers\Backend', 'as' => 'backend.', 'middleware' => ['web', 'auth', 'can:view_backend'], 'prefix' => 'admin'], function () {
    /*
    * These routes need view-backend permission
    * (good if you want to allow more than one group in the backend,
    * then limit the backend features by different roles or permissions)
    *
    * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
    */

    /*
     *
     *  Subjects Routes
     *
     * ---------------------------------------------------------------------
     */
    $module_name = 'subjects';
    $controller_name = 'SubjectsController';
    Route::get("{$module_name}/index_list", ['as' => "{$module_name}.index_list", 'uses' => "{$controller_name}@index_list"]);
    Route::get("{$module_name}/index_data", ['as' => "{$module_name}.index_data", 'uses' => "{$controller_name}@index_data"]);
    Route::get("{$module_name}/trashed", ['as' => "{$module_name}.trashed", 'uses' => "{$controller_name}@trashed"]);
    Route::patch("{$module_name}/trashed/{id}", ['as' => "{$module_name}.restore", 'uses' => "{$controller_name}@restore"]);
    Route::resource("{$module_name}", "{$controller_name}");

    // /*
    //  *
    //  *  Taxons Routes
    //  *
    //  * ---------------------------------------------------------------------
    //  */
    // $module_name = 'taxons';
    // $controller_name = 'TaxonsController';
    // Route::get("$module_name/index_list", ['as' => "$module_name.index_list", 'uses' => "$controller_name@index_list"]);
    // Route::get("$module_name/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
    // Route::get("$module_name/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    // Route::patch("$module_name/trashed/{id}", ['as' => "$module_name.restore", 'uses' => "$controller_name@restore"]);
    // Route::resource("$module_name", "$controller_name");
});
