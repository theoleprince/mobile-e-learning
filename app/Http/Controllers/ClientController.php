<?php

namespace App\Http\Controllers;

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
        $formation = Formation::whereActivated(0)
                                ->latest()
                                ->paginate($perPage);
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
    public function store(Request $request)
    {
        //
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
        $tous = Cour::select('cours.*','formations.nom as _formation')
                        ->join('formations','formations.id','=','cours.formation_id')
                        ->where('formation_id','=', $id)
                        ->latest()
                        ->paginate($perPage);

        $nonlus = Cour::select('cours.*','formations.nom as _formation')
                        ->join('formations','formations.id','=','cours.formation_id')
                        ->where('formation_id','=', $id)
                        ->where('cours.activated','=', 0)
                        ->where('finish','=', 0)
                        ->latest()
                        ->paginate($perPage);

        $encours = Cour::select('cours.*','formations.nom as _formation')
                        ->join('formations','formations.id','=','cours.formation_id')
                        ->where('formation_id','=', $id)
                        ->where('cours.activated','=', 1)
                        ->where('finish','=', 0)
                        ->latest()
                        ->paginate($perPage);

        $lus = Cour::select('cours.*','formations.nom as _formation')
                        ->join('formations','formations.id','=','cours.formation_id')
                        ->where('formation_id','=', $id)
                        ->where('cours.activated','=', 1)
                        ->where('finish','=', 1)
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
        $phase = Phase::select('phases.*','formations.nom as _formation','cours.nom as _cours   ')
                        ->join('cours','cours.id','=','phases.cours_id')
                        ->join('formations','formations.id','=','cours.formation_id')
                        ->where('cours_id','=', $id)
                        ->first()
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
    public function update(Request $request, $id)
    {
        //
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
