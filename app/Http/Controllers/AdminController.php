<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Dashboard | Administrator';

        return view("admin.index", [
            'title' => $title,
        ]);
    }
}
