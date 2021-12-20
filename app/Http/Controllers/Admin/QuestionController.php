<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Cour;
use App\Models\CoursUsers;
use App\Models\Formation;
use App\Models\Question;
use App\Models\ReponseQ;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $question = Question::select('questions.*','cours.nom as _cours','users.email as _email')
            ->join('cours','cours.id','=','questions.cours_id')
            ->join('users','users.id','=','questions.created_id')
            ->where('question', 'LIKE', "%$keyword%")
                ->orWhere('nbre_point', 'LIKE', "%$keyword%")
                ->orWhere('cours_id', 'LIKE', "%$keyword%")
                ->orWhere('created_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $question = Question::select('questions.*','cours.nom as _cours','users.email as _email')
            ->join('cours','cours.id','=','questions.cours_id')
            ->join('users','users.id','=','questions.created_id')
            ->latest()->paginate($perPage);
        }
// admin.question.index
        return view('admin.client.question', compact('question'));
    }


    public function indexadmin(Request $request)
    {
        $keyword = $request->get('search');

        // if (!empty($keyword)) {
        //     $formation = Formation::where('nom', 'LIKE', "%$keyword%")
        //         ->orWhere('description', 'LIKE', "%$keyword%")
        //         ->orWhere('activated', 'LIKE', "%$keyword%")
        //         ->orderBy('activated','desc')
        //         ->latest()->get();
        // } else {
        //     $formation = Formation::latest()
        //                             // ->orderBy('activated','desc')
        //                             ->get();
        // }
        // foreach ($formation as $item) {
        //     $item->cours = Cour::where('formation_id','=', $item->id)
        //                         ->count();
        // }


        // $reponse = Question::select('questions.*','formations.nom as _formation','cours.nom as _cours','cours.id as _idcours')
        //                     // ->join('questions','questions.id','=','reponse_qs.question_id')
        //                     ->join('cours','cours.id','=','cours_id')
        //                     ->join('formations','formations.id','=','formation_id')
        //                     ->get();
        //                     // ->where('reponse_qs.finish',0);
        $reponse = Cour::select('cours.*','formations.nom as _formation','cours.nom as _cours','cours.id as _idcours')
                        ->join('formations','formations.id','=','formation_id')
                        ->get();
        foreach ($reponse as $item) {
            $item->cours = CoursUsers::where('cours_id','=', $item->_idcours)
                                ->count();
            $item->evalue = CoursUsers::where('cours_id','=', $item->_idcours)
                                ->where('evaluated',1)
                                ->count();
            $item->corrected = CoursUsers::where('cours_id','=', $item->_idcours)
                                ->where('corrected',1)
                                ->count();
        }

        // $reponse = ReponseQ::all();
        // dd($reponse);
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
        //     $question = Question::select('questions.*','cours.nom as _cours','users.email as _email')
        //     ->join('cours','cours.id','=','questions.cours_id')
        //     ->join('users','users.id','=','questions.created_id')
        //     ->where('question', 'LIKE', "%$keyword%")
        //         ->orWhere('nbre_point', 'LIKE', "%$keyword%")
        //         ->orWhere('cours_id', 'LIKE', "%$keyword%")
        //         ->orWhere('created_id', 'LIKE', "%$keyword%")
        //         ->latest()->paginate($perPage);
        // } else {
        //     $question = Question::select('questions.*','cours.nom as _cours','users.email as _email')
        //     ->join('cours','cours.id','=','questions.cours_id')
        //     ->join('users','users.id','=','questions.created_id')
        //     ->latest()->paginate($perPage);
        // }
// admin.question.index
        return view('admin.question.index', compact('reponse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $reponse = CoursUsers::select('*','users.id as iduser')
                                ->join('users','users.id','=','user_id')
                                ->where('cours_id','=',$id)
                                ->where('evaluated','=',1)
                                ->get();
        // dd($reponse);
        return view('admin.question.create',compact('reponse','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Question::create($requestData);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $question = Question::where('cours_id','=',$id)
                            ->get();
        $idquestion = $id;
        // $question = Question::select('questions.*','cours.nom as _nom','users.email as _email','users.name as _name','users.prenom as _prenom')
        //                     ->join('cours','cours.id','=','questions.cours_id')
        //                     ->join('users','users.id','=','questions.created_id')
        //                     ->where('questions.id','=',$id)
        //                     ->first();
        // dd($question);
        return view('admin.question.show', compact('question','idquestion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('admin.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        dd($requestData);
        $id_question = 1;
        while($request->valeurId > $id_question){

            $id_question++;
        }
        return redirect('admin/question')->with('flash_message', 'Question updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id, $user)
    {

        $user = User::findOrFail($user);
        $question = ReponseQ::select('*')
                            ->join('questions','questions.id','=','question_id')
                            ->join('users','users.id','=','reponse_qs.created_id')
                            ->where('reponse_qs.cours_id','=',$id)
                            ->where('reponse_qs.created_id','=',$user->id)
                            ->get();
        // dd($question);
        return view('admin.question.form', compact('question','id','user'));
    }

}
