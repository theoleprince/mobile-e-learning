<?php

namespace App\Http\Controllers;

use App\Models\Cour;
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
            $cours = Cour::select('cours.*','formations.nom as _formation')
                            ->join('formations','formations.id','=','cours.formation_id')
                            ->where('formation_id',Auth::user()->slug)
                            ->first();

            $tous = Cour::select('cours.*','formations.nom as _formation')
                            ->join('formations','formations.id','=','cours.formation_id')
                            ->where('formation_id','=', Auth::user()->slug)
                            ->latest()
                            ->paginate($perPage);

            $nonlus = Cour::select('cours.*','formations.nom as _formation')
                            ->join('formations','formations.id','=','cours.formation_id')
                            ->where('formation_id','=', Auth::user()->slug)
                            ->where('cours.activated','=', 0)
                            ->where('cours.finish','=', 0)
                            ->latest()
                            ->paginate($perPage);

            $encours = Cour::select('cours.*','formations.nom as _formation')
                            ->join('formations','formations.id','=','cours.formation_id')
                            ->where('formation_id','=', Auth::user()->slug)
                            ->where('cours.activated','=', 1)
                            ->where('cours.finish','=', 0)
                            ->latest()
                            ->paginate($perPage);

            $lus = Cour::select('cours.*','formations.nom as _formation')
                            ->join('formations','formations.id','=','cours.formation_id')
                            ->where('formation_id','=', Auth::user()->slug)
                            ->where('cours.activated','=', 1)
                            ->where('cours.finish','=', 1)
                            ->latest()
                            ->paginate($perPage);
            return view('admin.client.cours', compact('tous','nonlus','encours','lus'));
        }
    }
}
