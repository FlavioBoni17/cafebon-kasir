<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $meja = Meja::all();
        $user = User::all();
        $menu = Menu::all();
        return view('home', compact('menu','user','meja'));

    }
}
