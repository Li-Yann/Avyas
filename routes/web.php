<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Route::view('/admin-login', 'admin-login'); //url,view
Route::post('/admin-login', [AdminController::class, 'login']);

Route::get('/admin-login', function () {
    if (!session()->has('adminSession')) {
        return view('/admin-login');
    } else {
        return redirect('/dashboard');
    }
});

Route::middleware('CheckAdminAuth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin-categories', [AdminController::class, 'categories']);
    Route::get('/admin-logout', [AdminController::class, 'logout']);
    Route::post('/add-categories', [AdminController::class, 'addCategories']);
    Route::get('/categories/delete/{id}', [AdminController::class, 'deleteCategories']);
    Route::get('/add-quiz', [AdminController::class, 'showAddQuiz']); //Shows Quiz Form
    Route::post('/add-quiz', [AdminController::class, 'addQuiz']); //Handles Quiz Form Submission
    Route::get('/add-mcq', [AdminController::class, 'showAddMCQ']);
    Route::post('/add-mcq', [AdminController::class, 'addMCQ']);
    Route::get('/show-mcq/{id}/{quizName}', [AdminController::class, 'showMCQ']);
    Route::get('/show-quiz-list/{id}/{category}', [AdminController::class, 'showQuizList']);
    Route::get('/quiz-list/delete/{id}', [AdminController::class, 'deleteQuizList']);
});


Route::get('/', [UserController::class, 'welcome']);
Route::get('/user-show-quiz', [UserController::class, 'userShowQuizPage']);
Route::get('/user-categories', [UserController::class, 'userCategories']);

// Route::view('/user-signup', 'user-signup');
Route::get('user-signup', function () {
    if (!session()->has('user')) {
        return view('user-signup');
    } else {
        return redirect('/');
    }
});
Route::post('/user-signup', [UserController::class, 'userSignup']);


// Route::view('/user-login', 'user-login');
Route::get('user-login', function () {
    if (!session()->has('user')) {
        return view('user-login');
    } else {
        return redirect('/');
    }
});

Route::post('/user-login', [UserController::class, 'userLogin']);
Route::get('/user-login-quiz', [UserController::class, 'userLoginQuiz']);

Route::get('/user-show-quiz-list/{id}/{category}', [UserController::class, 'userShowQuizList']);
Route::get('/start-quiz/{id}/{name}', [UserController::class, 'startQuiz']);

Route::get('/user-logout', [UserController::class, 'userLogout']);
Route::get('/user-signup-quiz', [UserController::class, 'userSignupQuiz']);
Route::get('/search-quiz', [UserController::class, 'searchQuiz']);

Route::get('/verify-user/{email}', [UserController::class, 'verifyUser']);

Route::view('user-forgot-password', 'user-forgot-password');

Route::post('/user-forgot-password', [UserController::class, 'userForgotPassword']);
Route::get('/user-forgot-password/{email}', [UserController::class, 'userResetForgotPassword']);
Route::post('/user-set-forgot-password', [UserController::class, 'userSetForgotPassword']);


Route::middleware('CheckUserAuth')->group(function () {
    Route::get('/user-mcq/{id}/{name}', [UserController::class, 'userMcq']);
    Route::post('/submit-mcq/{id}', [UserController::class, 'submitMcq']);
    Route::get('/user-details', [UserController::class, 'userDetails']);
});
