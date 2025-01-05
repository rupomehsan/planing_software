<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



require_once __DIR__ . '/../app/Modules/Routes/ApiRoutes.php';



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// // Route::get('/test',function(){
// //     return ['user'=> 'test'];
// // });

// Route::group(['prefix' => 'v1','namespace' => 'App\Http\Controllers\Auth', 'middleware' => 'guest:api'], function(){
//     Route::group(['prefix' => '/user'] , function(){
//         Route::post('/login', 'LoginController@login');
//     });
// });
// Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function(){
//     Route::get('user/check_user', [App\Http\Controllers\Auth\LoginController::class,'check_user']);
//     Route::post('/api-logout', [App\Http\Controllers\Auth\LoginController::class,'logout']);

//     Route::group(['prefix' => 'users'], function(){
//         Route::get('', [App\Http\Controllers\User\UserController::class,'index']);
//         Route::post('store', [App\Http\Controllers\User\UserController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\User\UserController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\User\UserController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\User\UserController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\User\UserController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\User\UserController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\User\UserController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\User\UserController::class,'show']);
//     });

//     Route::group(['prefix' => 'tasks'], function(){
//         Route::get('', [App\Http\Controllers\Admin\Task\TaskController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\Task\TaskController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\Task\TaskController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\Task\TaskController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\Task\TaskController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\Task\TaskController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\Task\TaskController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\Task\TaskController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\Task\TaskController::class,'show']);
//     });

//     Route::group(['prefix' => 'task-assigns'], function(){
//         Route::get('', [App\Http\Controllers\Admin\Task\TaskAssignController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\Task\TaskAssignController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\Task\TaskAssignController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\Task\TaskAssignController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\Task\TaskAssignController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\Task\TaskAssignController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\Task\TaskAssignController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\Task\TaskAssignController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\Task\TaskAssignController::class,'show']);
//     });

//     Route::group(['prefix' => 'kendrio-barshik-porikolponas'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });

//     Route::group(['prefix' => 'bivagio-barshik-porikolponas'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });
//     Route::group(['prefix' => 'barshik-porikolponas'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });

//     Route::group(['prefix' => 'barshik-karjokori-porikolponas'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });

//     Route::group(['prefix' => 'mashik-porikolponas'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });
//     Route::group(['prefix' => 'mashik-karjokori-porikolponas'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });

//     Route::group(['prefix' => 'porikolpona-bastobayoner-mashik-reports'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });

//     Route::group(['prefix' => 'karjokori-porikolpona-bastobayoner-mashik-reports'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });
//     Route::group(['prefix' => 'kendrer-porikolpona-bastobayoner-reports'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });
//     Route::group(['prefix' => 'bivager-porikolpona-bastobayoner-reports'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });
//     Route::group(['prefix' => 'archive'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });
//     Route::group(['prefix' => 'bivag-sections'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });
//     Route::group(['prefix' => 'bivag-sub-sections'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });
//     Route::group(['prefix' => 'porikolponar-dhorons'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });
//     Route::group(['prefix' => 'budgets'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });
//     Route::group(['prefix' => 'karjokori-porikolponas'], function(){
//         Route::get('', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'index']);
//         Route::post('store', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'store']);
//         Route::post('update/{id}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'update']);
//         Route::post('soft-delete', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'soft_delete']);
//         Route::delete('destroy/{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'destroy']);
//         Route::post('restore', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'restore']);
//         Route::post('import', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'import']);
//         Route::post('bulk-action', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class, 'bulkAction']);
//         Route::get('{slug}', [App\Http\Controllers\Admin\BarshikPorikolpona\BarshikPoricolponaController::class,'show']);
//     });





// });
