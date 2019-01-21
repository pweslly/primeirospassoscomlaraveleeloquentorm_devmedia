<?php

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
Route::resource('imoveis', 'ImovelController');

$this->get('/test-conn', function () {
    // Insere um novo usuário ao banco de dados:
    $user = \App\User::create([
        'name'         => 'Carlos Ferreira',
        'email'     => 'carlos@especializati.com.br',
        'password'     => bcrypt('SenhaAqui'),
    ]);
    // Se quiser exibir os dados do usuário: dd($user);
 
    // Listando os usuários
    $users = \App\User::get();
 
    echo '<hr>';
    foreach ($users as $user) {
        echo "{$user->name} <br>";
    }
    echo '<hr>';
});

Route::get('/cache', function () {
    return Cache::get('key');
});