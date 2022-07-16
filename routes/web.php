<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Analytics\Period;

/*
|--------------------------------------------------------------------------
| Front-end Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () { return redirect()->route('home'); });

Route::get('/home', [App\Http\Controllers\Controller::class, 'index'])->name('home');

Route::get('/contact', function () {
    request()->session()->put('lien', '/contact');
    return view('frontend.contact');
})->name('frontend.contact');

Route::get('/legales', function () {
    request()->session()->put('lien', '/legales');
    return view('frontend.legales');
});

Route::get('/gallery', function () {
    return view('backend.images.index');
});

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

/********* CATEGORIES *********/
//Route::get('/maintenance', [App\Http\Controllers\DisplayController::class, 'maintenance'])->name('maintenance');

Route::get('ateliers', [App\Http\Controllers\AtelierController::class, 'index'])->name('ateliers');

Route::get('temoignages', [App\Http\Controllers\Controller::class, 'temoignages'])->name('temoignages');

Route::get('yogas/reservation', [App\Http\Controllers\YogaController::class, 'reservation'])->name('yogas.reservation');
Route::get('yogas', [App\Http\Controllers\YogaController::class, 'index'])->name('yogas');
Route::get('yogas/{el}', [App\Http\Controllers\YogaController::class, 'show'])->name('yogas.show');
Route::post('yogas/avis/{el}/{discipline}', [App\Http\Controllers\YogaController::class, 'avis'])->name('yogas.avis');

Route::get('therapies', [App\Http\Controllers\TherapieController::class, 'index'])->name('therapies');
Route::get('therapies/{el}', [App\Http\Controllers\TherapieController::class, 'show'])->name('therapies.show');
Route::post('therpies/avis/{el}/{discipline}', [App\Http\Controllers\TherapieController::class, 'avis'])->name('therapies.avis');

Route::get('formations', [App\Http\Controllers\FormationController::class, 'index'])->name('formations');
Route::get('formations/{el}', [App\Http\Controllers\FormationController::class, 'show'])->name('formations.show');

/*
|--------------------------------------------------------------------------
| Back-end Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    request()->session()->put('lien', '/dashboard');
    $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::months(1));
    $mostVisitedPages = Analytics::fetchMostVisitedPages(Period::months(1));
    return view('backend.dashboard', ['analyticsData' => $analyticsData, 'mostVisitedPages' => $mostVisitedPages]);
})->middleware(['auth'])->name('dashboard');

Route::get('/backend', function () {
    return redirect('/dashboard');
})->middleware(['auth'])->name('backend');

Route::middleware(['auth'])->group(function () {
    Route::put('backend/settings', [App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');

    Route::get('backend/contacts', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');

    Route::get('backend/therapies', [App\Http\Controllers\TherapieController::class, 'backendIndex'])->name('therapies.backend.index');
    Route::get('backend/therapies/new', [App\Http\Controllers\TherapieController::class, 'backendCreate'])->name('therapies.backend.create');
    Route::post('backend/therapies', [App\Http\Controllers\TherapieController::class, 'backendStore'])->name('therapies.store');
    Route::get('backend/therapies/{el}', [App\Http\Controllers\TherapieController::class, 'backendEdit'])->name('therapies.backend.edit');
    Route::put('therapies/{el}', [App\Http\Controllers\TherapieController::class, 'update'])->name('therapies.update');
    Route::get('therapies/{el}/delete', [App\Http\Controllers\TherapieController::class, 'delete'])->name('therapies.delete');

    Route::get('backend/reviews/switch_validation/{el}', [App\Http\Controllers\ReviewController::class, 'switchValidation'])->name('reviews.backend.switchValidation');
    Route::get('backend/reviews', [App\Http\Controllers\ReviewController::class, 'backendIndex'])->name('reviews.backend.index');
    Route::get('backend/reviews/new', [App\Http\Controllers\ReviewController::class, 'backendCreate'])->name('reviews.backend.create');
    Route::post('backend/reviews', [App\Http\Controllers\ReviewController::class, 'backendStore'])->name('reviews.store');
    Route::get('backend/reviews/{el}', [App\Http\Controllers\ReviewController::class, 'backendEdit'])->name('reviews.backend.edit');
    Route::put('reviews/{el}', [App\Http\Controllers\ReviewController::class, 'update'])->name('reviews.update');
    Route::get('reviews/{el}/delete', [App\Http\Controllers\ReviewController::class, 'delete'])->name('reviews.delete');

    Route::get('backend/professionnels', [App\Http\Controllers\ProfessionnelController::class, 'backendIndex'])->name('professionnels.backend.index');
    Route::get('backend/profs/new', [App\Http\Controllers\ProfessionnelController::class, 'backendCreate'])->name('profs.backend.create');
    Route::post('backend/profs', [App\Http\Controllers\ProfessionnelController::class, 'backendStore'])->name('profs.store');
    Route::get('backend/profs/{el}', [App\Http\Controllers\ProfessionnelController::class, 'backendEdit'])->name('profs.backend.edit');
    Route::put('profs/{el}', [App\Http\Controllers\ProfessionnelController::class, 'update'])->name('profs.update');
    Route::get('profs/{el}/delete', [App\Http\Controllers\ProfessionnelController::class, 'delete'])->name('profs.delete');

    Route::get('backend/yogas', [App\Http\Controllers\YogaController::class, 'backendIndex'])->name('yogas.backend.index');
    Route::get('backend/yogas/new', [App\Http\Controllers\YogaController::class, 'backendCreate'])->name('yogas.backend.create');
    Route::post('backend/yogas', [App\Http\Controllers\YogaController::class, 'backendStore'])->name('yogas.store');
    Route::get('backend/yogas/{el}', [App\Http\Controllers\YogaController::class, 'backendEdit'])->name('yogas.backend.edit');
    Route::put('yogas/{el}', [App\Http\Controllers\YogaController::class, 'update'])->name('yogas.update');
    Route::post('yogas/avis/{el}/{discipline}', [App\Http\Controllers\YogaController::class, 'avis'])->name('yogas.avis');
    Route::get('yogas/{el}/delete', [App\Http\Controllers\YogaController::class, 'delete'])->name('yogas.delete');

    Route::get('backend/tags', [App\Http\Controllers\TagController::class, 'backendIndex'])->name('tags.backend.index');
    Route::get('backend/tags/new', [App\Http\Controllers\TagController::class, 'backendCreate'])->name('tags.backend.create');
    Route::post('backend/tags', [App\Http\Controllers\TagController::class, 'backendStore'])->name('tags.store');
    Route::get('backend/tags/{el}', [App\Http\Controllers\TagController::class, 'backendEdit'])->name('tags.backend.edit');
    Route::put('tags/{el}', [App\Http\Controllers\TagController::class, 'update'])->name('tags.update');
    Route::get('tags/{el}/delete', [App\Http\Controllers\TagController::class, 'delete'])->name('tags.delete');

    Route::get('connectas/{id}', [App\Http\Controllers\UserController::class, 'connectAs'])->name('users.connectAs');
    Route::get('rollbacklogin', [App\Http\Controllers\UserController::class, 'rollBackLogin'])->name('users.rollbacklogin');
    Route::get('backend/users', [App\Http\Controllers\UserController::class, 'backendIndex'])->name('users.backend.index');
    Route::get('backend/users/new', [App\Http\Controllers\UserController::class, 'backendCreate'])->name('users.backend.create');
    Route::post('backend/users', [App\Http\Controllers\UserController::class, 'backendStore'])->name('users.store');
    Route::get('backend/users/{el}', [App\Http\Controllers\UserController::class, 'backendEdit'])->name('users.backend.edit');
    Route::put('users/{el}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('users/{el}/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');

    Route::post('upload', [App\Http\Controllers\UploadController::class, 'store']);
    Route::delete('upload', [App\Http\Controllers\UploadController::class, 'upload']);
});

require __DIR__.'/auth.php';
