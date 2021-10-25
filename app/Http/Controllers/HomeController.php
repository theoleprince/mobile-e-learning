<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ((Auth::user()->hasRole('superadministrator')) || (Auth::user()->hasRole('administrator')) || (Auth::user()->hasRole('formateur'))){
            return view('home');
        }elseif(Auth::user()->hasRole('user')){
            $perPage = 25;

            $id = Formation::whereActivated(0)
                                    ->latest()
                                    ->paginate($perPage);
            $id = 1;
            return redirect('cours/1');
        }
    }
}
