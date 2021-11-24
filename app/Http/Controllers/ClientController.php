<?php

namespace App\Http\Controllers;

use App\Role;
use App\Models\Cour;
use App\Models\User;
use App\Models\Phase;
use App\Models\Video;
use App\Models\Createur;
use App\Models\Formation;
use App\Models\UserFormat;
use App\Models\Commentaire;
use App\Models\TypeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 4;

        $formation = Formation::whereActivated(1)
                                ->latest()
                                ->paginate($perPage);

        $types = TypeCategory::paginate(3);
        
        return view('index', compact('formation','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formation = Formation::all();
        $ariane = ['user','Ajouter'];
        $roles = Role::all();
        return view('admin.client.inscriptionUser',compact('formation','ariane','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $formation = Formation::all();

        $this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:users',
        ]);
          $random = str_shuffle('1234567890');
        $ref = substr($random, 0, 4);
        $request->ref = $ref;
        //dd($request->all());
        $requestData = $request->all();
        $formation_id = $request->formation_id;

        if ($request->hasFile('avatar')) {
            $requestData['avatar'] = $request->file('avatar')
            ->store('uploads', 'public');
        }

        $requestData['ref'] = $ref;
        $requestData['slug'] = $formation_id;
        $requestData['password'] = Hash::make($request->password);
        //dd($requestData);
        $user = User::create($requestData);
        $user->attachRole('user');

        $data = [
            'formation_id' => $formation_id,
            'user_id' => $user->id
        ]; 
 
        $userFormation=UserFormat::create($data);

        return view('admin.client.inscriptionUser',compact('formation'));
    }

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
    public function commentaire(Request $request)
    {
        $commentaire = Commentaire::where('phase_id',$request->phase_id)
                                    ->get();
        return response()->json(['commentaire' => $commentaire]);
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

    public function getAllPhaseIdp($id){
        /* $videos = Phase::select(
            'phases.*'
            
        )
        ->join('cours','phases.cour_id','=','cours.id')

        ->join('formations','cours.formation_id','=','formations.id')

       // ->where('formations.id','=',$id)
        ->get(); */

        $cours = Cour::where('cours.formation_id','=',$id)->get();
        //dd($cours);
        $videos = [];
        $nb=0;

        foreach($cours as $item)
        {
            $videos[$nb] = Phase::where('phases.cours_id','=',$item->id)->get();
            $nb++;
           // dd($videos);
        }

        //return response()->json($videos);

        //dd($videos);

        

        return view('client.video-phase', compact('videos'));
    }

    public function getVideos($id)
    {
        $videos = Video::where('categorie_id','=', $id)->get();
        return view('client.video', compact('videos'));
    }

    public function getTestCreator(){
        $videos = Createur::get();
        //dd($videos);
        //shuffle($videos);
        return view('client.creator',compact('videos'));
    }

    public function edit($id){
        $video = Createur::findOrFail($id);
        return view('client.video-reponse', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        
     if ($request->hasFile('video')) {
            $requestData['video'] = $request->file('video')
                ->store('uploads', 'public');
        }
        $createur = Createur::findOrFail($id);
        $createur->update($requestData);              

        return view('client.creator',compact('videos','createur'));
    }
}