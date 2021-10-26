<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Cour;
use App\Models\Formation;
use App\Models\Phase;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 25;

        $formation = Formation::whereActivated(1)
                                ->latest()
                                ->paginate($perPage);
        //return $formation;
        return view('admin.client.formation', compact('formation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function finish($id)
    {
        $cours = Cour::whereId($id)->first();
        $cours->finish = 1;
        $cours->update();

        return redirect('user/cours')->with('message', 'Bravo très belle eprogression');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cours($id)
    {
        $perPage = 25;

        $formation = Formation::whereId($id)->first();
        $formation->activated = 1;
        $formation->update();

        $tous = Cour::select('cours.*','formations.nom as _formation')
                        ->join('formations','formations.id','=','cours.formation_id')
                        ->where('formation_id','=', $id)
                        ->latest()
                        ->paginate($perPage);

        $nonlus = Cour::select('cours.*','formations.nom as _formation')
                        ->join('formations','formations.id','=','cours.formation_id')
                        ->where('formation_id','=', $id)
                        ->where('cours.activated','=', 0)
                        ->where('cours.finish','=', 0)
                        ->latest()
                        ->paginate($perPage);

        $encours = Cour::select('cours.*','formations.nom as _formation')
                        ->join('formations','formations.id','=','cours.formation_id')
                        ->where('formation_id','=', $id)
                        ->where('cours.activated','=', 1)
                        ->where('cours.finish','=', 0)
                        ->latest()
                        ->paginate($perPage);

        $lus = Cour::select('cours.*','formations.nom as _formation')
                        ->join('formations','formations.id','=','cours.formation_id')
                        ->where('formation_id','=', $id)
                        ->where('cours.activated','=', 1)
                        ->where('cours.finish','=', 1)
                        ->latest()
                        ->paginate($perPage);
        return view('admin.client.cours', compact('tous','nonlus','encours','lus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function phase($id)
    {
        $perPage = 25;

        $cours = Cour::whereId($id)->first();
        $cours->activated = 1;
        $cours->update();

        $phase = Phase::select('phases.*','formations.nom as _formation','cours.nom as _cours   ')
                        ->join('cours','cours.id','=','phases.cours_id')
                        ->join('formations','formations.id','=','cours.formation_id')
                        ->where('cours_id','=', $id)
                        ->latest()
                        ->paginate($perPage);

        return view('admin.client.phase', compact('phase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function commentaire($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
