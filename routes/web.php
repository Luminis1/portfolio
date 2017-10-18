<?php

use App\Models\Category;
use App\Models\Project;
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

Route::get('/', 'Frontend\DefaultController@index');

Auth::routes();

Route::get('/dashboard', 'Backend\DashboardController@index');

Route::resource('/dashboard/projects', 'Backend\ProjectsController');
Route::resource('/dashboard/category', 'Backend\CategoryController');

Route::get('/category/{category}', 'Frontend\DefaultController@category');

Route::get('/test', function () {
	$projects = Project::all();
	$categories = Category::all();
	$projectscat = Category::getCountProjectsByCategory();
	return view('test', [
		'projects' => $projects,
		'categories' => $categories,
		'projectscat' => $projectscat
	]);
});