<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Clientes\HomeController;
use App\Http\Controllers\SalasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\UnidadesController;
use App\Http\Controllers\SalasAdmController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('cliente-home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', )->group(function () {
    //Rotas pertinentes  ao cliente 
    Route::get('/cliente/home', [HomeController::class, 'home'])->name('cliente-home');
    //Rotas referentes as salas
    Route::get('/cliente/busca/salas', [SalasController::class, 'BuscaSala'])->name('cliente-BuscaSala');
    Route::get('/cliente/ver/sala/{id}', [SalasController::class, 'VerSala'])->name('cliente-VerSala');
    //Rotas referentes as reservas
    Route::post('/cliente/pre/reservar/sala', [SalasController::class, 'PreReservarSala'])->name('cliente-PreReservarSala');
    Route::get('/cliente/ver/pre/reserva/{id}', [SalasController::class, 'VerPreReserva'])->name('cliente-VerPreReserva');
    Route::post('/cliente/reservar/sala', [SalasController::class, 'ReservarSala'])->name('cliente-ReservarSala');
    Route::get('/cliente/ver/reserva/{id}', [SalasController::class, 'VerReserva'])->name('cliente-VerReserva');
    Route::get('/cliente/minhas/reservas', [SalasController::class, 'MinhasReservas'])->name('cliente-MinhasReservas');
});
//PAINEL ADMINISTRATIVO
Route::middleware('admin')->group(function () {

    Route::get('/adm/home', [HomeController::class, 'home'])->name('cliente-home');

    //Rotas referentes a clientes 
    
    Route::get('/adm/form/clientes', [ClientesController::class, 'form'])->name('adm-form-clientes');
    Route::post('/adm/cad/clientes', [ClientesController::class, 'cad'])->name('adm-cad-clientes');
    Route::get('/adm/info/clientes/{id}', [ClientesController::class, 'info'])->name('adm-info-clientes');
    Route::get('/adm/edit/clientes/{id}', [ClientesController::class, 'edit'])->name('adm-edit-clientes');
    Route::post('/adm/upd/clientes', [ClientesController::class, 'upd'])->name('adm-upd-clientes');

    //Rotas referentes a unidades

    Route::get('/adm/form/unidades', [UnidadesController::class, 'form'])->name('adm-form-unidades');
    Route::post('/adm/cad/unidades', [UnidadesController::class, 'cad'])->name('adm-cad-unidades');
    Route::get('/adm/info/unidades/{id}', [UnidadesController::class, 'info'])->name('adm-info-unidades');
    Route::get('/adm/edit/unidades/{id}', [UnidadesController::class, 'edit'])->name('adm-edit-unidades');
    Route::post('/adm/upd/unidades', [UnidadesController::class, 'upd'])->name('adm-upd-unidades');

    //Rotas Referentes ao Cadastro e Edição de Sala
    Route::get('/adm/form/salas', [SalasAdmController::class, 'form'])->name('adm-form-salas');
    Route::post('/adm/cad/salas', [SalasAdmController::class, 'cad'])->name('adm-cad-salas');
    Route::get('/adm/info/salas/{id}', [SalasAdmController::class, 'info'])->name('adm-info-salas');
    Route::get('/adm/edit/salas/{id}', [SalasAdmController::class, 'edit'])->name('adm-edit-salas');
    Route::post('/adm/upd/salas', [SalasAdmController::class, 'upd'])->name('adm-upd-salas');

});

require __DIR__.'/auth.php';
