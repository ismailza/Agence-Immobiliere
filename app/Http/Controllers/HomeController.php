<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index () {
        return view('home', [
            'properties' => Property::orderBy('created_at', 'desc')->limit(4)->get()
        ]);
    }
    

}
