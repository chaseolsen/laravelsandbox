<?php

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



// =============== Standard Route Example ============================
/*
Route::get('/hello', function () {
  return '<h1>Hello there!</h1>';
});
*/

// ================ Dynamic Route Example ============================
/*
Route::get('/users/{id}/{name}', function($id, $name){
  return 'This is user ' . $name . ' with an id of ' . $id;
});
*/

// Route::get('/', function(){
//     return view('welcome');
// });

// Gets route from controller, PagesController, public function 'index'
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

// ::resource will create and map a methods to controller, run 'php artisan route:list' after creating a resource route and see how it maps it all, pretty cool
Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

// [[[[[[[[[[[[[[[------ My Developer Notes ------]]]]]]]]]]]]]]]
/*
To create a controller with Artisan (In GIT BASH) example
- php artisan make:controller PagesController

To build style
- npm run dev

To watch for style changes
- npm run watch

Add extra stying to _custom.scss in resources/assets/sass (Don't forget to build the changes), or just app.css in public/css, though you won't be able to use sass

To create a model with migration (will create model in app folder, and a migration in database/migrations)
- php artisan make:model Post -m

To run migration
- php artisan migrate

To run tinker
- php artisan tinker

example commands with tinker
get count from table
- App\Post::count()

creating instance, for example a post through tinker
- $post = new App\Post();
- $post->title = 'Post One'
- $post->body = 'This is the post body'
- $post->save();
should return 'true' if success, then check that table

create a controller with resources, like index, create, store, etc.
- php artisan make:controller PostsController --resource

view all existing routes
- php artisan route:list

to enable all of the built in authentication, like all the Controller/Auth files, run this artisan command
- php artisan make:auth

creating migration to add user id to posts table. (remember after creating a migration, go the migration and add to the up()/down() function).
- php artisan make:migration add_user_id_to_posts
(reminder, to run migration)
- php artisan migrate

to rollback migrations
- php artisan migrate rollback

*/
