<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Models\userData;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

Route::get('/home', function () {
   // $data = App\Models\userData::all();
    $data = DB::table('user_data')
    ->join('salaries','u_ID','userID')
    ->select('user_data.userID','user_data.userName','user_data.address','user_data.contact','user_data.email','salaries.salary')
    ->paginate(3);
    //->get();

    return view('Home',compact('data'));
    //return view('Home')->with('user',$data);
});

Route::post('/view','App\Http\Controllers\FrontEndController@insertData');

Route::get('/viewData/{id}','App\Http\Controllers\FrontEndController@viewData');

Route::get('/updateViewData/{id}','App\Http\Controllers\FrontEndController@updateViewData');

Route::post('/updateData','App\Http\Controllers\FrontEndController@updateData');

Route::get('/deleteData/{id}','App\Http\Controllers\FrontEndController@deleteData');
