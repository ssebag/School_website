<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\OrderQuizController;
use App\Http\Controllers\HomeController;

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
    return view('home');
});


Auth::routes();Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function(){
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  Route::get('/showQuiz/{id}',[managerController::class,'showQuiz'])->name('show.quiz');
  Route::get('showMark/{id}',[HomeController::class,'showMark'])->name('show.mark.for.student');
  Route::get('/quiz',[OrderQuizController::class,'showQuiz'])->name('table.for.show.quiz');
});

Route::middleware(['authAdmin'])->group(function(){
    Route::get('/teacher',[adminController::class,'indexForTeacher'])->name('show.all.teacher');
    //Route::get('/addNewUser',[adminController::class,'create'])->name('blade.for.add.new.user');
    //Route::post('/addNewUser',[adminController::class,'storeUser'])->name('add.new.user');
    Route::get('/addNewStudent/{userId}',[adminController::class,'createStudent'])->name('blade.for.add.new.student');
    Route::post('/addNewStudent/{id}',[adminController::class,'storeStudent'])->name('add.new.student');
    Route::get('/addNewTeacher/{userId}',[adminController::class,'createTeacher'])->name('blade.for.add.new.teacher');
    Route::post('/addNewTeacher/{id}',[adminController::class,'storeTeacher'])->name('add.new.teacher');
    Route::get('/order/quiz',[OrderQuizController::class,'index'])->name('table.for.order.quiz');
    Route::get('/order/quiz/{id}',[OrderQuizController::class,'add'])->name('add.quiz');
    Route::delete('/deleteOrder/{id}',[OrderQuizController::class,'deleteOrder'])->name('delete.order');
    Route::delete('/delete/{id}',[OrderQuizController::class,'deleteQuiz'])->name('delete.quiz');
    //Route::get('/student',[adminController::class,'indexForStudent'])->name('show.all.student');
    Route::view('addNewUser','admin.addNewUser')->name('addUser');
});
Route::middleware(['authManager'])->group(function(){
Route::get('/newQuiz',[managerController::class,'newQuiz'])->name('blade.for.new.quiz');
Route::post('/newQuiz',[managerController::class,'requestQuiz'])->name('new.quiz');
Route::get('/addQuestion/{id}',[managerController::class,'addQuestion'])->name('blade.add.question.for.quiz');
Route::post('/addQuestion/{id}',[managerController::class,'storeQuestion'])->name('add.question.for.quiz');
Route::get('/publish/{id}',[managerController::class,'publishQuiz'])->name('publish.quiz');
Route::delete('/quiz/{id}',[managerController::class,'destroy'])->name('delete.quiz');
Route::delete('/question/{id}',[managerController::class,'destroyQuestion'])->name('delete.question');
Route::get('/edit/question/{id}',[managerController::class,'editQuestion'])->name('blade.for.edit.question');
Route::post('/edit/question/{id}',[managerController::class,'updateQuestion'])->name('update.question');
Route::get('/edit/quiz/{id}',[managerController::class,'editQuiz'])->name('blade.for.edit.quiz');
Route::post('/edit/quiz/{id}',[managerController::class,'updateQuiz'])->name('update.quiz');
//Route::get('/student/{id}',[managerController::class,'indexForStudent'])->name('show.all.student.for.teacher');
});

Route::post('/resultQuiz',[managerController::class,'resultQuiz'])->name('result.quiz.from.student');
Route::get('/profile/{id}',[adminController::class,'showProfile'])->name('show.profile');
Route::get('/student/{id}',[adminController::class,'indexForStudent'])->name('show.all.student');
Route::get('/quiz/{id}',[adminController::class,'showMarks'])->name('show.marks');
Route::get('/edit/mark/{id}',[adminController::class,'editMarks'])->name('blade.for.edit.mark');
Route::post('/edit/mark/{id}',[adminController::class,'updateMarks'])->name('update.mark');
Route::get('/add/mark/{id}',[adminController::class,'addMarks'])->name('blade.for.add.mark');
Route::post('/add/mark/{id}',[adminController::class,'addNewMarks'])->name('add.mark');
