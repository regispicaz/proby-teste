<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    ProjectController,
    SiteController,
    StatusProjectController
};

// Rota da home do site
Route::get('/', [SiteController::class, 'index'])->name('site.index');

// Rotas que passam pelo middleware auth, só acessíveis após autenticação do usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Recurso para rotas de projects
    Route::resource('projects', ProjectController::class);

    // Rotas de projetos por status.
    Route::get('/projects/status/pending', [StatusProjectController::class, 'pending'])->name('projects.pending');
    Route::get('/projects/status/in_progress', [StatusProjectController::class, 'inProgress'])->name('projects.in_progress');
    Route::get('/projects/status/completed', [StatusProjectController::class, 'completed'])->name('projects.completed');
});



require __DIR__.'/auth.php';
