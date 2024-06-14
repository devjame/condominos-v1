<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrcamentoController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\ProprietarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Orçamento routers
    Route::get('orcamentos', [OrcamentoController::class, 'index'])->name('orcamento.index');
    Route::post('orcamentos/store', [OrcamentoController::class, 'store'])->name('orcamento.store');
    Route::get('orcamentos/edit/{id}', [OrcamentoController::class, 'edit'])->name('orcamento.edit');
    Route::patch('orcamentos/update/{id}', [OrcamentoController::class, 'update'])->name('orcamento.update');

    // Pagamentos Routers
    Route::get('contas', [ContaController::class, 'index'])->name('conta.index');

    Route::get('contas/divida', [ContaController::class, 'divida'])->name('conta.dividas');

    Route::get('contas/corrente/{id}', [ContaController::class, 'show'])->name('conta.corrente');
    Route::post('contas/{id}/pagamento', [ContaController::class, 'store'])->name('conta.pagamento');
    Route::delete('contas/{proprietario}/pagamento/{id}', [ContaController::class, 'destroy'])->name('conta.delete');

    // Propriétarios Routers
    Route::get('proprietarios', [ProprietarioController::class, 'index'])->name('proprietario.index');
    Route::post('proprietarios/store', [ProprietarioController::class, 'store'])->name('proprietario.store');
    Route::get('proprietarios/edit/{id}', [ProprietarioController::class, 'edit'])->name('proprietario.edit');
    Route::patch('proprietarios/update/{id}', [ProprietarioController::class, 'update'])->name('proprietario.update');
});

require __DIR__.'/auth.php';
