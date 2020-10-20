<?php

use Illuminate\Support\Facades\Route;
use App\Abusdesc;
use App\AbusLeader;
use App\Agenda;
use App\Announcement;
use App\Gallery;
use App\Portfolio;
use App\Testimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
     $data_agenda = Agenda::latest()->paginate(3);
     $data_gallery = Gallery::latest()->paginate(9);
     $data_abusdesc = Abusdesc::all();
     $data_testimonials = Testimonial::all();
     return view('front-pages.landing', compact(
         'data_agenda',
         'data_abusdesc',
         'data_gallery',
         'data_testimonials'
        ));
 });
Route::get('home', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@index')->name('user');

//HOME CONTROLLER
Route::middleware('role:superadministrator')->group(function(){
    //ABOUT US
    Route::resource('abusdesc','AbusdescsController');
    Route::resource('abusleader','AbusLeadersController');
    Route::get('DownloadFileLeader/{id}', 'AbusLeadersController@DownloadFile')->name('abusleader.DownloadFile');
    //Home Testimonials
    Route::resource('testimonials','TestimonialsController');
    Route::get('DownloadFileTestimonials/{id}', 'TestimonialsController@DownloadFile')->name('testimonials.DownloadFile');
    //ANNOUNCEMENT
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::resource('announcement','AnnouncementsController');
    Route::post('ckeditor/image_upload', 'AnnouncementsController@upload')->name('upload');
    Route::post('/del', 'AnnouncementsController@deleteall')->name('deleteall');
    Route::get('/searchAnnouncements','AnnouncementsController@search');
    

    //AGENDAS
    Route::resource('agenda','AgendasController');
    Route::get('/searchAgendas','AgendasController@search');
    Route::get('DownloadFileAgd/{id}', 'AgendasController@DownloadFileAgd')->name('agenda.DownloadFile');
    Route::post('/delAgd', 'AgendasController@deleteall')->name('deleteallAgd');

    //GALLERY
    Route::resource('gallery','GallerysController');
    Route::get('DownloadFileGal/{id}', 'GallerysController@DownloadFile')->name('gallery.DownloadFile');

    //MATERIALS
    Route::resource('material','MaterialsController');

    //PORTFOLIOS
    Route::resource('portfolio','PortfoliosController');
    Route::get('/searchPortfolio','PortfoliosController@search');

    //REGISTER
    Route::get('/searchnewrangers','NewRangersController@search');
    Route::get('export-new-rangers','NewRangersController@export');
    Route::post('/delNgr', 'NewRangersController@deleteall')->name('deleteallNgr');
    
   
    });

//DOWNLOAD
Route::get('DownloadFile/{id}', 'AnnouncementsController@DownloadFile')->name('announcement.DownloadFile');

//MATERIALS

Route::get('DownloadFileMtr/{id}', 'MaterialsController@DownloadFile')->name('material.DownloadFile');
//Route::get('/', 'HomeController@index')->name('home');


//NEW-RANGERS
Route::resource('newranger','NewRangersController');



//DISCUSSIONS
Route::resource('discussion','DiscussionsController');



//FRONT-PAGES
//AGENDA
Route::get('agenda-list', function () {
    $data_agenda = Agenda::latest()->paginate(9999);
    return view('front-pages.agenda-list', compact(
        'data_agenda'
    ));
})->name('agenda-list');

Route::get('agenda-detail/{id}', function ($id) {
    $data_agenda = Agenda::findOrFail($id);
    return view('front-pages.agenda-detail', compact(
        'data_agenda'
    ));
})->name('agenda-detail');

Route::get('searchagendafront', function(Request $request){
    $search = $request->get('search');
    $data_agenda = Agenda::where('judul','like','%' . $search . '%')->paginate(10);
    return view('front-pages.agenda-list',compact('data_agenda','search'));
})->name('searchagendafront');

//NEWS
Route::get('news-list', function () {
    $data_pengumuman = Announcement::latest()->paginate(9);
    return view('front-pages.news-list', compact(
        'data_pengumuman'
    ));
})->name('news-list');

Route::get('news-detail/{id}', function ($id) {
    $data_pengumuman = Announcement::findOrFail($id);
    return view('front-pages.news-detail', compact(
        'data_pengumuman'
    ));
})->name('news-detail');

Route::get('searchnewsfront', function(Request $request){
    $search = $request->get('search');
    $data_pengumuman = Announcement::where('judul','like','%' . $search . '%')->paginate(9);
    return view('front-pages.news-list',compact('data_pengumuman','search'));
})->name('searchnewsfront');


//GALLERY
Route::get('gallery-front', function () {
    $data_gallerys = Gallery::latest()->simplePaginate(9);
    return view('front-pages.gallery', compact(
        'data_gallerys'
    ));
})->name('gallery-front');

//MATERIAL
Route::get('material-list', function () {
    return view('front-pages.material-list');
})->name('material-list');

Route::get('categories/{category:name}','CategoryController@show');

//PORTFOLIO
Route::get('portfolio-list', function () {
    $data_portfolio = Portfolio::latest()->paginate(9);
    return view('front-pages.portfolio-list', compact(
        'data_portfolio'
    ));
})->name('portfolio-list');

Route::get('portfolio-detail/{id}', function ($id) {
    $data_portfolio = Portfolio::findOrFail($id);
    return view('front-pages.portfolio-detail', compact(
        'data_portfolio'
    ));
})->name('portfolio-detail');
//REGISTER
//Register Global
Route::get('register-global', function () {
    return view('front-pages.register-global');
})->name('register-global');

//ABOUT-US-FRONT
Route::get('about-us', function () {
    $data_abusleader = AbusLeader::latest()->paginate(4);
    $data_abusdesc = Abusdesc::all();
    return view('front-pages.about-us', compact(
        'data_abusdesc',
        'data_abusleader'
    ));
})->name('about-us');



Auth::routes(['verify' => true]);