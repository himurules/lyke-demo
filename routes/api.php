<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', function() {
    return User::all();
});

Route::get('user-events/{id}', function($id) {
    return User::find($id)->events;
});

Route::get('user-event-groups/{id}', function($id) {
    return DB::table('user_events')
        ->selectRaw('count(1) as count, event_type')
        ->where('user_id', $id)
        ->groupBy('event_type')
        ->get();
});

Route::delete('user-delete/{id}', function($id) {
    \App\Models\User::find($id)->delete();
    return 204;
});
