<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Cour;
use App\Models\Question;
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

        return view('admin.question.index', compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cour = Cour::all();
        return view('admin.question.create',compact('cour'));
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

        return redirect('admin/question')->with('flash_message', 'Question added!');
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
        $question = Question::select('questions.*','cours.nom as _nom','users.email as _email','users.name as _name','users.prenom as _prenom')
                            ->join('cours','cours.id','=','questions.cours_id')
                            ->join('users','users.id','=','questions.created_id')
                            ->where('questions.id','=',$id)
                            ->first();

        return view('admin.question.show', compact('question'));
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

        $question = Question::findOrFail($id);
        $question->update($requestData);

        return redirect('admin/question')->with('flash_message', 'Question updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Question::destroy($id);

        return redirect('admin/question')->with('flash_message', 'Question deleted!');
    }
}
