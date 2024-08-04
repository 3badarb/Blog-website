<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

Route::get('/', [PostController::class,'index']);

Route::get("post/{post:slug}",[PostController::class,'show']);
Route::post('post/{post:slug}/comment',[PostController::class,'addComment']);

Route::get('/register',[RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');
Route::get('/login',[SessionController::class,'LoginPage'])->middleware('guest');
Route::post('/login',[SessionController::class,'DoLogin'])->middleware('guest');
Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');


Route::middleware('can:admin')->group(function (){
    Route::get('/admin/create',[PostController::class,'createAPost']);
    Route::post('/admin/create',[PostController::class,'storeAPost']);
    Route::get('/admin/posts',[PostController::class,'AllPosts']);
    Route::get('/admin/{post}/edit',[PostController::class,'ShowPostBeforeEdit']);
    Route::patch('/admin/{post}/edit',[PostController::class,'update']);
    Route::delete('/admin/delete/{post}',[PostController::class,'delete']);
});





Route::post('/newsletter',function (){

    request()->validate([
        'email'=>'required|email'
    ]);


    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => env('MAILCHIMP_KEY'),
        'server' => 'us14'
    ]);
    try {
        $response = $mailchimp->lists->addListMember("333f5c1e56", [
            "email_address" => request('email'),
            "status" => "subscribed",
        ]);

    }
   catch (Exception $e) {
       throw \Illuminate\Validation\ValidationException::withMessages(['email'=>'this email not real']);
   }
    return redirect('/')->with('success','you are now subscriber');


});
