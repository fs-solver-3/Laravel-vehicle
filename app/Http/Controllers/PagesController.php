<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
     public function terms()
    {
        return view('pages.terms');
    }

    public function looking()
    {
        return view('pages.looking');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function about()
    {
        return view('pages.about-us');
    }

     public function policy()
    {
        return view('pages.policy');
    }

    public function service()
    {
        return view('pages.service');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function success()
    {
        return view('success');
    }
    public function fail()
    {
        return view('fail');
    }
}