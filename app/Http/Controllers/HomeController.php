<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Formation;
use App\Models\Userformation;
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

            $cours = Userformation::select('cours.*','cours.nom as _cours')
                                    ->join('userformation','userformation.formation_id','=','formations.id')
                                    ->join('userformation','userformation.user_id','=',Auth::user()->id)
                                    ->join('formations','formations.id','=','cours.formation_id')
                                    // ->orderBy('userformation.updated_at', 'DESC')
                                    ->get()
                                    ->paginate($perPage);
            dd($cours);
            return redirect()->route('user/cours',compact('cours'));
        }
    }
}
