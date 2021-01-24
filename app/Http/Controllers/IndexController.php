<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * index
     * 
     * Return index view
     *
     * @return void
     */
    public function index()
    {
        return view('index');
    }
    
    /**
     * contacts
     * 
     * Return contacts view
     *
     * @return void
     */
    public function contacts()
    {
        return view('contacts');
    }
}