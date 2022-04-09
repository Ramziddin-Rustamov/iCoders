<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\ClientViewController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminSlideImageController;
use App\Http\Controllers\AdminTechnoligyController;

Route::get('/', [WelcomeController::class,'index']);

Auth::routes();


//for google
Route::get('/login/google',[App\Http\Controllers\Auth\LoginController::class , 'redirectToGoogle'])->name('login.google')->middleware('guest');
Route::get('public/login/google/callback',[App\Http\Controllers\Auth\LoginController::class  , 'handleGoogleCallback'])->middleware('guest');

//for facebook
// Route::get('/login/facebook',[App\Http\Controllers\Auth\LoginController::class , 'redirectToFacebook'])->name('login.facebook')->middleware('guest');
// Route::get('public/login/facebook/callback',[App\Http\Controllers\Auth\LoginController::class  , 'handleFacebokkCallback'])->middleware('guest');

//for github
Route::get('/login/github',[App\Http\Controllers\Auth\LoginController::class , 'redirectToGithub'])->name('login.github')->middleware('guest');
Route::get('public/login/github/callback',[App\Http\Controllers\Auth\LoginController::class  , 'handleGithubCallback'])->middleware('guest');



// post controller
Route::get('/ourposts',[PostsController::class,'index'])->name('posts.allposts');//for public
Route::get('posts-read/{id}', [PostsController::class,'findOne'])->name('posts.findOne');//for read more public

// Comment 
Route::get('comment/{id}', [CommentController::class,'showUser'])->name('comment.owner');

// About us
Route::get('/about',[AboutUsController::class,'index'])->name('about');
// Client view 
Route::get('/clientViews',[ClientViewController::class,'index'])->name('view');
Route::get('/clientViews/{id}',[ClientViewController::class,'show'])->name('client.show');
Route::post('/clientViews',[ClientViewController::class,'store'])->name('client.store');
// price 
Route::get('price',[PriceController::class,'index'])->name('price.index');

// services 
Route::get('/services', [ServicesController::class,'index'])->name('services');

// Portfolio
Route::get('/portfolio' , [PortfolioController::class , 'index'])->name('portfolio'); //public
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');//public

// Contact
Route::get('/contact' , [ContactController::class , 'index'])->name('contact');
Route::post('/contact' , [ContactController::class , 'store'])->name('contact.store');

// price return only one method

Route::middleware('can:admin')->group(function(){
  Route::get('admin-portfolio',[PortfolioController::class, 'indexAdmin'])->name('admin.portfolio.index');//for admin
  Route::get('admin-portfolio-cteate', [PortfolioController::class, 'create'])->name('admin.portfolio.create');//for admin
  Route::post('portfolio/store', [PortfolioController::class, 'store'])->name('admin.portfolio.store');//for admin
  Route::get('portfolio/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('admin.portfolio.edit');//for admin
  Route::put('portfolio/{portfolio}', [PortfolioController::class, 'update'])->name('admin.portfolio.update');//for admin
  Route::delete('admin-portfolio/{portfolio}/delete',[PortfolioController::class,'delete'])->name('admin.portfolio.delete');//for admin page

  //   posts controller for admin
  Route::get('admin-posts',[AdminPostController::class,'index'])->name('posts.index');//for admin page
  Route::get('admin-post',[AdminPostController::class,'create'])->name('posts.create.index');
  Route::delete('AdminPostDelete/{id}',[AdminPostController::class,'destroy'])->name('post.delete');//for admin page
  Route::post('admin-posts',[AdminPostController::class, 'store'])->name('posts.create'); //
  Route::get('admin-post-edit/{id}/edit',[AdminPostController::class,'edit'])->name('posts.edit');
  Route::put('admin-post-update/{id}',[AdminPostController::class,'update'])->name('posts.update');
  // slide
  Route::get('slide',[AdminSlideImageController::class,'index'])->name('slide.index');
  Route::get('slide-create',[AdminSlideImageController::class,'create'])->name('slide.create');
  Route::post('slide-store',[AdminSlideImageController::class,'store'])->name('slide.store');
  Route::delete('slide-delete/{id}',[AdminSlideImageController::class,'delete'])->name('slide.delete');
  // AdminUserControl
  Route::get('admin-users',[AdminUsersController::class, 'index'])->name('admin.user.index');
  Route::get('admin-users/{id}',[AdminUsersController::class, 'show'])->name('admin.user.show');
  // contact Controller
  Route::get('admin-contact',[AdminContactController::class,'index'])->name('admin.contact.index');
  Route::get('admin-contacts/{id}/edit',[AdminContactController::class,'show'])->name('admin.contact.show');
  // technoligy
  Route::get('admin-technoligy',[AdminTechnoligyController::class,'index'])->name('admin.technology.index');
  Route::get('admin-technoligy-create',[AdminTechnoligyController::class,'create'])->name('admin.technology.create');
  Route::post('admin-technoligy-post',[AdminTechnoligyController::class,'store'])->name('admin.technology.store');
  Route::get('admin-technoligy/{id}/show',[AdminTechnoligyController::class,'show'])->name('admin.technology.show');
  Route::delete('admin-technoliogy-delete/{id}',[AdminTechnoligyController::class,'delete'])->name('admin.technology.delete');

  //Home Dashboard 
  Route::get('/home',[HomeController::class, 'index'])->name('home');
});

// For Super Admin
Route::get('super-admin-users/{id}/edit',[AdminUsersController::class, 'edit'])->name('admin.user.edit')->middleware('can:super-admin');
Route::put('super-admin-update-user/{user}',[AdminUsersController::class , 'update'])->name('admin.user.update')->middleware('can:super-admin');
Route::delete('admin-delete/{id}/delete',[AdminUsersController::class, 'delete'])->name('admin.user.delete')->middleware('can:super-admin');
Route::delete('admin-contact-delete/{id}/delete',[AdminContactController::class,'delete'])->name('admin.contact.delete')->middleware('can:super-admin');


Route::middleware('auth')->group(function(){
// PostLikesController
Route::post('post/{post:id}/likes',[PostLikesController::class,'store'])->name('posts.like');//auth
Route::delete('post/{post}/likes',[PostLikesController::class,'destroy'])->name('posts.like');//auth
Route::post('posts/{post:id}/comments',[CommentController::class, 'store']);//for auth
Route::delete('posts/{comment:id}/destroy',[CommentController::class, 'destroy'])->name('comment.destroy');//for auth

// MyProfile Controller
Route::get('profile',[MyProfileController::class , 'index'])->name('profile.index');
Route::get('profile/{id}/edit',[MyProfileController::class , 'edit'])->name('profile.edit');
Route::put('profile/{user}',[MyProfileController::class , 'update'])->name('profile.update');
Route::get('profile/{id}',[MyProfileController::class , 'show'])->name('profile.show');
});
