<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/api/users', function () {
    $formats = [
        7 => '%Y-%m-%d',
        30 => '%Y-%m-%d',
        365 => '%Y-%m',
    ];

    $format = $formats[request('days')] ?? '%Y-%m';

    $users = User::selectRaw("DATE_FORMAT(created_at, '$format') as label, COUNT(id) as data")
        ->when(request('days'), function ($query) {
            $query->where('created_at', '>=', now()->subDays(request('days')));
        })
        ->groupBy('label')
        ->pluck('data', 'label');

    return [
        'data' => $users->values(),
        'labels' => $users->keys(),
    ];
});
