<?php

namespace Nobre\Http\Controllers;

use Nobre\Models\Category;
use Nobre\Models\Work;
use Nobre\Models\Noticia;
use Nobre\Models\Servicio;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
}
