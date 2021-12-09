<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\CoursUsers;
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
                            ->where('cours.formation_id',Auth::user()->slug)
                            ->first();

            $tous = Cour::select('cours.*','formations.nom as _formation')
                            ->join('formations','formations.id','=','cours.formation_id')
                            ->where('cours.formation_id','=', Auth::user()->slug)
                            ->where('cours.activated','=', 1)
                            ->latest()
                            ->paginate($perPage);

            $nonlus = Cour::select('cours_users.*','formations.nom as _formation')
                            ->join('cours_users','cours.id','=','cours_users.cours_id')
                            ->join('formations','formations.id','=','cours.formation_id')
                            ->where('cours.formation_id','=', Auth::user()->slug)
                            ->where('cours_users.user_id','=', Auth::user()->id)
                            ->where('cours.activated','=', 1)
                            ->where('begin','=', 0)
                            // ->where('cours_users.finish','!=', 0)
                            // ->where('cours_users.finish','!=', 1)
                            // ->where('cours_users.activated','!=', 1)
                            ->latest()
                            ->paginate($perPage);

            $encours = CoursUsers::select('cours_users.*','formations.nom as _formation','cours.nom as _cours')
                            ->join('cours','cours.id','=','cours_users.formation_id')
                            ->join('formations','formations.id','=','cours.formation_id')
                            ->where('cours.formation_id','=', Auth::user()->slug)
                            ->where('cours_users.user_id','=', Auth::user()->id)
                            ->where('cours.activated','=', 1)
                            ->where('cours_users.finish','=', 0)
                            ->where('cours_users.activated','=', 1)
                            ->latest()
                            ->paginate($perPage);

            $lus = CoursUsers::select('cours_users.*','formations.nom as _formation','cours.nom as _cours')
                            ->join('cours','cours.id','=','cours_users.formation_id')
                            ->join('formations','formations.id','=','cours.formation_id')
                            ->where('cours.formation_id','=', Auth::user()->slug)
                            ->where('cours_users.user_id','=', Auth::user()->id)
                            ->where('cours.activated','=', 1)
                            ->where('cours_users.finish','=', 1)
                            ->latest()
                            ->paginate($perPage);

                        //  dd($lus);
            return view('admin.client.cours', compact('tous','nonlus','encours','lus'));
        }
    }
}
