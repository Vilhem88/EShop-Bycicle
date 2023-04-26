<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $bicycles = Bicycle::get();
        return view('layouts.main', compact('bicycles'));
    }

}
