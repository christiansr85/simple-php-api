<?php

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Controllers\Employee\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employee/{id?}', function (String $id = null, Request $request) {
    $controller = new EmployeeController();
    if ($id) {
        return $controller->read($id, $request);
    } else {
        return $controller->list($request);
    }
});

Route::post('/employee', function (Request $request) {
    $controller = new EmployeeController();
    return $controller->store($request);
});

Route::patch('/employee/{id}', function (String $id, Request $request) {
    $controller = new EmployeeController();
    return $controller->update($id, $request);
});

Route::delete('/employee/{id}', function (String $id, Request $request) {
    $controller = new EmployeeController();
    return $controller->delete($id, $request);
});