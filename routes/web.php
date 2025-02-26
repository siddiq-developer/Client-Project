<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('home', [App\Http\Controllers\HomeController::class, 'home']);
Route::get('blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
Route::get('bylaws', [App\Http\Controllers\HomeController::class, 'bylaws'])->name('bylaws');

Route::get('what-we-do', [App\Http\Controllers\HomeController::class, 'what_we_do'])->name('what_we_do');
Route::get('by-laws', [App\Http\Controllers\HomeController::class, 'by_laws'])->name('by_laws');
Route::get('bod', [App\Http\Controllers\HomeController::class, 'bod'])->name('bod');
Route::get('leadership', [App\Http\Controllers\HomeController::class, 'leadership'])->name('leadership');
Route::get('events/list', [App\Http\Controllers\HomeController::class, 'events'])->name('events/list');
Route::get('event/details/{slug}', [App\Http\Controllers\HomeController::class, 'event_single'])->name('event_single');
Route::get('blog/details/{slug}', [App\Http\Controllers\HomeController::class, 'blog_single'])->name('blog_single');
Route::get('search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('user.dashboard')->middleware('auth');
Route::get('/events', [App\Http\Controllers\EventController::class, 'event_index'])->name('user.event.index')->middleware('auth');
Route::get('/event/show/{id}', [App\Http\Controllers\Admin\EventController::class, 'event_details'])->name('user.event.show')->middleware('auth');
Route::get('/event/vote/{id}', [App\Http\Controllers\EventController::class, 'event_voting'])->name('user.event.voting')->middleware('auth');

Route::post('/event/post/vote', [App\Http\Controllers\EventController::class, 'post_event_voting'])->name('user.cast.vote')->middleware('auth');

Route::get('/contact_us', [App\Http\Controllers\FrontendController::class, 'contact_us'])->name('user.contact_us')->middleware('auth');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/profile/update', [App\Http\Controllers\HomeController::class, 'profile_update'])->name('profile.update')->middleware('auth');
Route::post('/profile/password/update', [App\Http\Controllers\HomeController::class, 'profile_password_update'])->name('profile.password.update')->middleware('auth');

Route::post('/profile/expertise/update', [App\Http\Controllers\HomeController::class, 'profile_expertise_update'])->name('profile.expertise.update')->middleware('auth');

Route::post('/profile/interest/update', [App\Http\Controllers\HomeController::class, 'profile_interest_update'])->name('profile.interest.update')->middleware('auth');


Route::get('/event/confirm/availablility/{token}', [App\Http\Controllers\FrontendController::class, 'confirm_event'])->name('event_confirm_availablility');

Route::post('/send-contact-us', [App\Http\Controllers\FrontendController::class, 'sendContactUs'])->name('send-contact-us');


Route::post('/register/post', [App\Http\Controllers\HomeController::class, 'register'])->name('post.register');
Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/event/', [App\Http\Controllers\Admin\EventController::class, 'index'])->name('event.index');    
    Route::get('/calender/', [App\Http\Controllers\Admin\EventController::class, 'calender'])->name('event.calender');        
    Route::get('/event/create', [App\Http\Controllers\Admin\EventController::class, 'create'])->name('event.create');    
    Route::post('/event/store', [App\Http\Controllers\Admin\EventController::class, 'store'])->name('event.store');    
    Route::get('/event/edit/{id}', [App\Http\Controllers\Admin\EventController::class, 'edit'])->name('event.edit');    
    Route::post('/event/update/{id}', [App\Http\Controllers\Admin\EventController::class, 'update'])->name('event.update');    
    Route::get('/event/delete/{id}', [App\Http\Controllers\Admin\EventController::class, 'delete'])->name('event.delete'); 
    Route::get('/event/attendance/{id}', [App\Http\Controllers\Admin\EventController::class, 'attendance'])->name('event.attendance');    
    Route::get('/event/candidates/{id}', [App\Http\Controllers\Admin\EventController::class, 'candidates'])->name('event.candidates');    
    Route::get('/event/invite/{id}', [App\Http\Controllers\Admin\EventController::class, 'invite'])->name('event.invite');    
    Route::post('/event/invite/members', [App\Http\Controllers\Admin\EventController::class, 'invite_members'])->name('event.invite.members');    
    Route::get('/event/markattendance/{id}', [App\Http\Controllers\Admin\EventController::class, 'markattendance'])->name('events.markattendance');  
    Route::post('/event/set/candidates', [App\Http\Controllers\Admin\EventController::class, 'set_candidates'])->name('event.set.candidates');    

    Route::get('/event/voting/{id}', [App\Http\Controllers\Admin\EventController::class, 'voting'])->name('event.voting');
    Route::get('/event/voting/result/{id}', [App\Http\Controllers\Admin\EventController::class, 'voting_result'])->name('event.voting.results');
    Route::get('/event/voting/status/{id}/{status}', [App\Http\Controllers\Admin\EventController::class, 'change_voting_status'])->name('event.change_voting_status');

    Route::get('/event/details/{id}', [App\Http\Controllers\Admin\EventController::class, 'event_details'])->name('event.details');    
   Route::get('/event/member/ec/{id}/{event_id}/{status}', [App\Http\Controllers\Admin\EventController::class, 'event_member_ec'])->name('event.members.setasec');

   Route::get('/event/member/ec_status/remove/{id}/{event_id}', [App\Http\Controllers\Admin\EventController::class, 'remove_event_member_ec'])->name('event.members.removeasec');

    Route::get('/members/', [App\Http\Controllers\Admin\MemberController::class, 'index'])->name('members.index');    
    Route::get('/members/create', [App\Http\Controllers\Admin\MemberController::class, 'create'])->name('members.create');    
    Route::post('/members/store', [App\Http\Controllers\Admin\MemberController::class, 'store'])->name('members.store');    
    Route::get('/members/edit/{id}', [App\Http\Controllers\Admin\MemberController::class, 'edit'])->name('members.edit');    
    Route::post('/members/update/{id}', [App\Http\Controllers\Admin\MemberController::class, 'update'])->name('members.update');    
    Route::get('/members/delete/{id}', [App\Http\Controllers\Admin\MemberController::class, 'delete'])->name('members.delete');
    Route::get('/members/view/{user}', [App\Http\Controllers\Admin\MemberController::class, 'show'])->name('members.view');
    Route::get('/members/bod/{user}', [App\Http\Controllers\Admin\MemberController::class, 'bod'])->name('members.bod');
    Route::post('/members/setBOD', [App\Http\Controllers\Admin\MemberController::class, 'setBOD'])->name('members.setBOD');
    Route::get('/members/removebod/{user}', [App\Http\Controllers\Admin\MemberController::class, 'removebod'])->name('members.removebod');
        


    Route::get('/blogs/', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('blogs.index');    
    Route::get('/blogs/create', [App\Http\Controllers\Admin\BlogController::class, 'create'])->name('blogs.create');    
    Route::post('/blogs/store', [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('blogs.store');    
    Route::get('/blogs/edit/{id}', [App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('blogs.edit');    
    Route::post('/blogs/update/{id}', [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('blogs.update');    
    Route::get('/blogs/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'delete'])->name('blogs.delete');


    Route::get('/contact-us', [App\Http\Controllers\Admin\ContactUsController::class, 'contact_us'])->name('contact_us');    
    Route::get('/read-contact-us-all', [App\Http\Controllers\Admin\ContactUsController::class, 'contact_us_mark_all'])->name('mark_as_read.contact.us');
    Route::get('/contacts/reply/{id}', [App\Http\Controllers\Admin\ContactUsController::class, 'contacts_reply'])->name('contacts.reply');
    Route::get('/contacts/block/{id}', [App\Http\Controllers\Admin\ContactUsController::class, 'contacts_block'])->name('contacts.block');
    Route::post('/contacts/reply/save/', [App\Http\Controllers\Admin\ContactUsController::class, 'contacts_reply_save'])->name('contacts.reply.save');
    Route::post('/delete-contact-us', [App\Http\Controllers\Admin\ContactUsController::class, 'contact_us_delete'])->name('delete.contact.us');
    Route::post('/read-contact-us', [App\Http\Controllers\Admin\ContactUsController::class, 'contact_us_readALL'])->name('readALL.contact.us')->middleware('auth');
});
