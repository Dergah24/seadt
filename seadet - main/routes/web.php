<?php

use App\Models\Event;
use App\Models\Halls;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\HallController;
use App\Http\Controllers\Back\AboutController;
use App\Http\Controllers\Back\EventController;
use App\Http\Controllers\Back\InnerHallcontroller;
use App\Http\Controllers\Back\InnerEventController;
use App\Http\Controllers\Back\MetaTagController;
use App\Http\Controllers\Back\UsersController;
use App\Http\Controllers\Back\FormController;
use App\Http\Controllers\Back\ReservController;
use App\Http\Controllers\Back\SettingsController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\EventsController;
use App\Http\Controllers\Front\HallController as FrontHallController;
use App\Http\Controllers\Front\HallsController;
use App\Http\Controllers\Front\MainController;
use App\Models\About;
use App\Models\Logs;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('history', function () {

    $title = 'title_'. app()->getLocale();
    $content = 'content_'. app()->getLocale();
    $about =  About::selectRaw($title . ' as title, ' .$content. ' as content, image')->first();
    return view('Front.about',compact('about'));

})->name('histroy');

Route::get('/',[MainController::class,'index'])->name('/');
Route::get('contact',[ContactController::class,'index'])->name('frontcontact');


Route::GET('event-view/{slug?}',[EventsController::class,'single'])->name('event-view');
Route::GET('hall-view/{slug?}',[HallsController::class,'single'])->name('hall-view');



Route::middleware(['auth:sanctum', 'verified'])->get('/Admin', function () {
    return view('dashboard');
})->name('dashboard');

    Route::POST('/get_hall', [InnerHallcontroller::class, 'get_hall'])->name('get_hall');
    Route::POST('/get_evvent', [InnerEventController::class, 'get_event'])->name('get_event');





    //Admin panel roots

Route::middleware(['auth'])->group(function () {


        Route::resource('about', AboutController::class);
        Route::resource('/users',UsersController::class);
        // Hall routes
        Route::get('hall-delete/{id}',[HallController::class,'destroy'])->name('hall-destroy');
        Route::resource('hall', HallController::class);

        //Inner Hall
        Route::POST('/add_hall', [InnerHallcontroller::class, 'add_hall'])->name('add_hall');
        Route::POST('/delete_hall', [InnerHallcontroller::class, 'delete_hall'])->name('delete_hall');
        Route::POST('/set_status_hall', [InnerHallcontroller::class, 'set_status_hall'])->name('set_status_hall');
        Route::POST('/edit_hall', [InnerHallcontroller::class, 'edit_hall'])->name('edit_hall');
        Route::POST('/halledit_save', [InnerHallcontroller::class, 'edit_save'])->name('halledit_save');

        Route::get('/Admin/hall', function () {
                $halls = Halls::get();
                return view('Back.InnerHalls.index', compact('halls'));
         })->name('hall');

         //Meta Tags
         Route::get('meta_tags', [MetaTagController::class, 'index'])->name('meta');
         Route::post('/meta_update', [MetaTagController::class, 'update'])->name('meta_update');

        //
        Route::get('/newsletter', [FormController::class, 'getNewsletter'])->name('newsletter');
        Route::post('/addnewsletter', [FormController::class, 'newsletter'])->name('addnewsletter');
        Route::post('/addconnact', [FormController::class, 'contactForm'])->name('addconnact');

        //Event routes
        Route::get('event-delete/{id}',[EventController::class,'destroy'])->name('event-destroy');
         Route::resource('event', EventController::class);

        //Inner Event

        Route::POST('/add_event', [InnerEventController::class, 'add_event'])->name('add_event');
        Route::POST('/delete_event', [InnerEventController::class, 'delete_event'])->name('delete_event');
        Route::POST('/set_status_event', [InnerEventController::class, 'set_status_event'])->name('set_status_event');
        Route::POST('/edit_event', [InnerEventController::class, 'edit_event'])->name('edit_event');
        // Route::get('/edit/{id}',[InnerEventController::class, 'edit']);
        Route::POST('/edit_save', [InnerEventController::class, 'edit_save'])->name('edit_save');

        Route::get('/Admin/event', function () {
        $events = Event::get();
        return view('Back.InnerEvent.index', compact('events'));
         })->name('event');


         Route::get('logs',  function () {
            $response = Logs::with('user')->with('types')->get();
            return view('Back.logs', compact('response'));
        })->name('logs');

        Route::get('Admin/contact', [FormController::class, 'getForm'])->name('getcontact');

        // Resrev
        Route::post('reserv',[ReservController::class,'addReserv'])->name('reserv');
        Route::get('reservetion',[ReservController::class,'index'])->name('getReserv');

        //Site settings

        Route::Get('/settings',  [SettingsController::class,'index'])->name('settings');
        Route::any('/settingsUpdate/{id}',  [SettingsController::class,'update'])->name('settingsUpdate');

});
