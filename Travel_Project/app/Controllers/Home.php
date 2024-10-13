<?php

namespace App\Controllers;

class Home extends BaseController
{
    // public function index(): string
    // {
    //     return view('welcome_message');
    // }


        public function index()
    {
         echo view('User/headerUser');
         echo view('User/index');
         echo view('User/footerUser');
    }


    public function about()
    {
         echo view('User/headerUser');
         echo view('User/about');
         echo view('User/footerUser');
    }



    public function services()
    {
         echo view('User/headerUser');
         echo view('User/services');
         echo view('User/footerUser');
    }

    public function blog()
    {
         echo view('User/headerUser');
         echo view('User/blog');
         echo view('User/footerUser');
    }


    public function booking()
    {
         echo view('User/headerUser');
         echo view('User/booking');
         echo view('User/footerUser');
    }


    public function contact()
    {
         echo view('User/headerUser');
         echo view('User/contact');
         echo view('User/footerUser');
    }


    public function destination()
    {
         echo view('User/headerUser');
         echo view('User/destination');
         echo view('User/footerUser');
    }


    public function gallery()
    {
         echo view('User/headerUser');
         echo view('User/gallery');
         echo view('User/footerUser');
    }


    public function guides()
    {
         echo view('User/headerUser');
         echo view('User/guides');
         echo view('User/footerUser');
    }


    public function packages()
    {
         echo view('User/headerUser');
         echo view('User/packages');
         echo view('User/footerUser');
    }


    public function testimonial()
    {
         echo view('User/headerUser');
         echo view('User/testimonial');
         echo view('User/footerUser');
    }


    public function tour()
    {
         echo view('User/headerUser');
         echo view('User/tour');
         echo view('User/footerUser');
    }



}
