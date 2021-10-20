<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Commentaire;
use App\Models\Phase;
use Illuminate\Http\Request;

class CommentaireController extends Controller
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
            $commentaire = Commentaire::select('commentaires.*','phases.titre as _titre','users.email as _email')
                ->join('phases','phases.id','=','commentaires.phase_id')
                ->join('users','users.id','=','commentaires.user_id')
                ->latest()
                ->paginate($perPage);
        } else {
            $commentaire = Commentaire::select('commentaires.*','phases.titre as _titre','users.email as _email')
                        ->join('phases','phases.id','=','commentaires.phase_id')
                        ->join('users','users.id','=','commentaires.user_id')
                        ->latest()
                        ->paginate($perPage);
        }

        return view('admin.commentaire.index', compact('commentaire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $phase = Phase::all();
        return view('admin.commentaire.create',compact('phase'));
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

        Commentaire::create($requestData);

        return redirect('admin/commentaire')->with('flash_message', 'Commentaire added!');
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
        $commentaire = Commentaire::select('commentaires.*','phases.titre as _titre','users.email as _email','users.name as _name','users.prenom as _prenom')
                    ->join('phases','phases.id','=','commentaires.phase_id')
                    ->join('users','users.id','=','commentaires.user_id')
                    ->where('commentaires.id','=',$id)
                    ->first();

        return view('admin.commentaire.show', compact('commentaire'));
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
        $commentaire = Commentaire::findOrFail($id);

        return view('admin.commentaire.edit', compact('commentaire'));
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

        $commentaire = Commentaire::findOrFail($id);
        $commentaire->update($requestData);

        return redirect('admin/commentaire')->with('flash_message', 'Commentaire updated!');
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
        Commentaire::destroy($id);

        return redirect('admin/commentaire')->with('flash_message', 'Commentaire deleted!');
    }
}
