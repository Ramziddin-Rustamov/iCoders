<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ClientViewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminSlideImageController;
use App\Http\Controllers\AdminTechnoligyController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::middleware('auth')->group(function () {
    // Likes and Comments
    Route::post('post/{post:id}/likes', [PostLikesController::class, 'store'])->name('posts.like');
    Route::delete('post/{post}/likes', [PostLikesController::class, 'destroy'])->name('posts.like');
    Route::post('posts/{post:id}/comments', [CommentController::class, 'store']);
    Route::delete('posts/{comment:id}/destroy', [CommentController::class, 'destroy'])->name('comment.destroy');

    // MyProfile Controller
    Route::get('profile', [MyProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/{id}/edit', [MyProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/{user}', [MyProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/{id}', [MyProfileController::class, 'show'])->name('profile.show');
});

// Route::middleware('can:admin')->group(function () {

// });

Route::get('/ourposts', [PostsController::class, 'index'])->name('posts.allposts');
Route::get('posts-read/{post}', [PostsController::class, 'findOne'])->name('posts.findOne');
Route::get('comment/{id}', [CommentController::class, 'showUser'])->name('comment.owner');
Route::get('/about', [AboutUsController::class, 'index'])->name('about');
Route::get('/clientViews', [ClientViewController::class, 'index'])->name('view');
Route::get('/clientViews/{id}', [ClientViewController::class, 'show'])->name('client.show');
Route::post('/clientViews', [ClientViewController::class, 'store'])->name('client.store');
Route::get('question', [PriceController::class, 'index'])->name('question.index');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Super Admin Routes
Route::middleware('can:super-admin')->group(function () {
        Route::get('super-admin-users/{id}/edit', [AdminUsersController::class, 'edit'])->name('admin.user.edit');
        Route::put('super-admin-update-user/{user}', [AdminUsersController::class, 'update'])->name('admin.user.update');
        Route::delete('admin-delete/{id}/delete', [AdminUsersController::class, 'delete'])->name('admin.user.delete');
        Route::delete('admin-contact-delete/{id}/delete', [AdminContactController::class, 'delete'])->name('admin.contact.delete');

        // Portfolio Routes
        Route::get('admin-portfolio', [PortfolioController::class, 'indexAdmin'])->name('admin.portfolio.index');
        Route::get('admin-portfolio-create', [PortfolioController::class, 'create'])->name('admin.portfolio.create');
        Route::post('portfolio/store', [PortfolioController::class, 'store'])->name('admin.portfolio.store');
        Route::get('portfolio/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('admin.portfolio.edit');
        Route::put('portfolio/{portfolio}', [PortfolioController::class, 'update'])->name('admin.portfolio.update');
        Route::delete('admin-portfolio/{portfolio}/delete', [PortfolioController::class, 'delete'])->name('admin.portfolio.delete');
    
        // Admin Posts
        Route::get('admin-posts', [AdminPostController::class, 'index'])->name('posts.index');
        Route::get('admin-post-create', [AdminPostController::class, 'create'])->name('posts.create.index');
        Route::delete('AdminPostDelete/{id}', [AdminPostController::class, 'destroy'])->name('post.delete');
        Route::post('admin-posts', [AdminPostController::class, 'store'])->name('posts.create');
        Route::get('admin-post-edit/{id}/edit', [AdminPostController::class, 'edit'])->name('posts.edit');
        Route::put('admin-post-update/{id}', [AdminPostController::class, 'update'])->name('posts.update');
    
        // Slide Images
        Route::get('slide', [AdminSlideImageController::class, 'index'])->name('slide.index');
        Route::get('slide-create', [AdminSlideImageController::class, 'create'])->name('slide.create');
        Route::post('slide-store', [AdminSlideImageController::class, 'store'])->name('slide.store');
        Route::delete('slide-delete/{id}', [AdminSlideImageController::class, 'delete'])->name('slide.delete');
    
        // Admin Users
        Route::get('admin-users', [AdminUsersController::class, 'index'])->name('admin.user.index');
        Route::get('admin-users/{id}', [AdminUsersController::class, 'show'])->name('admin.user.show');
    
        // Admin Contact
        Route::get('admin-contact', [AdminContactController::class, 'index'])->name('admin.contact.index');
        Route::get('admin-contacts/{id}/edit', [AdminContactController::class, 'show'])->name('admin.contact.show');
    
        // Technology
        Route::get('admin-technoligy', [AdminTechnoligyController::class, 'index'])->name('admin.technology.index');
        Route::get('admin-technoligy-create', [AdminTechnoligyController::class, 'create'])->name('admin.technology.create');
        Route::post('admin-technoligy-post', [AdminTechnoligyController::class, 'store'])->name('admin.technology.store');
        Route::get('admin-technoligy/{id}/show', [AdminTechnoligyController::class, 'show'])->name('admin.technology.show');
        Route::delete('admin-technoliogy-delete/{id}', [AdminTechnoligyController::class, 'delete'])->name('admin.technology.delete');
});
