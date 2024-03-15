<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\register\RegisterRequest;
use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index() {
        return view('index');
    }

    public function home() {
        return view('home');
    }

    public function contact() {
        return view('contact');
    }

    public function coming_soon() {
        return view('coming-soon');
    }

    public function blog() {
        return view('blog');
    }

    public function about() {
        return view('about');
    }

    public function blog_single() {
        return view('blog-single');
    }

    public function error_404() {
        return view('404');
    }

    public function loginUser() {
        return view('auth.login');
    }

    public function registerUser() {
        return view('auth.register');
    }

    public function verification() {
        return view('auth.verify');
    }

}
