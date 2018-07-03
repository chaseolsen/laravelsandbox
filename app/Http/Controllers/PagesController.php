<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
      $title = 'Welcome To Laravel!';

      // Example way to pass in values
      // return view('pages.index', compact('title'));
      return view('pages.index')->with('title', $title);
    }

    public function about(){
      // You dont alway have to use dynamic content passing through to a view. Just examples
      $title = 'About Us';
      return view('pages.about')->with('title', $title);
    }

    public function services(){
      // Array example of passing data to view
      $data = array(
        'title' => 'Services',
        'services' => ['Web Design', 'Programming', 'SEO']
      );
      return view('pages.services')->with($data);
    }
}
