<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Foods;
use Illuminate\Http\Request;
/**
* 食材のダッシュボード表示 */
Route::get('/', function () {
    $foods = Foods::orderBy('created_at', 'asc')->get();
    return view('foods', [
        'foods' => $foods
    ]);
});
/**
* 新「食材」を追加 */
Route::post('/foods ', function (Request $request) {
    $validator = Validator::make($request->all(), [
    'item_name' => 'required|max:255',
]);
    if ($validator->fails()) {
    return redirect('/')
        ->withInput()
        ->withErrors($validator);
}
    $foods = new Foods;
    $foods->item_name = $request->item_name; 
    $foods->item_number = '1';
    $foods->item_amount = '1000'; 
    $foods->published = '2017-03-07 00:00:00'; 
    $foods->save(); //「/」ルートにリダイレクト 
    return redirect('/');

//
});
/**
* 食材を削除 */
Route::delete('/foods/{food}', function (Foods $food) {
    $food->delete();
    return redirect('/');
//
});
