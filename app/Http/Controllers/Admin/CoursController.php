<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Cour;
use App\Models\Formation;
use Illuminate\Http\Request;

class CoursController extends Controller
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
            $cours = Cour::select('cours.*','formations.nom as _formation','users.email as _email','users.name as _name','users.prenom as _prenom')
                ->join('formations','formations.id','=','cours.formation_id')
                ->join('users','users.id','=','cours.created_id')
                ->where('nom', 'LIKE', "%$keyword%")
                ->orWhere('temps', 'LIKE', "%$keyword%")
                ->orWhere('numero', 'LIKE', "%$keyword%")
                ->orWhere('activated', 'LIKE', "%$keyword%")
                ->orWhere('finish', 'LIKE', "%$keyword%")
                ->orWhere('formation_id', 'LIKE', "%$keyword%")
                ->orWhere('created_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cours = Cour::select('cours.*','formations.nom as _formation','users.email as _email','users.name as _name','users.prenom as _prenom')
            ->join('formations','formations.id','=','cours.formation_id')
            ->join('users','users.id','=','cours.created_id')
            ->latest()->paginate($perPage);
        }
        return view('admin.cours.index', compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $formation = Formation::all();
        return view('admin.cours.create',compact('formation'));
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

        Cour::create($requestData);

        return redirect('admin/cours')->with('flash_message', 'Cour added!');
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
        $cour = Cour::select('cours.*','formations.nom as _nom','users.email as _email','users.name as _name','users.prenom as _prenom')
                    ->join('formations','formations.id','=','cours.formation_id')
                    ->join('users','users.id','=','cours.created_id')
                    ->where('cours.id','=',$id)
                    ->first();

        return view('admin.cours.show', compact('cour'));
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
        $cour = Cour::findOrFail($id);
        $formation = Formation::all();

        return view('admin.cours.edit', compact('cour','formation'));
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

        $cour = Cour::findOrFail($id);
        $cour->update($requestData);

        return redirect('admin/cours')->with('flash_message', 'Cour updated!');
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
        Cour::destroy($id);

        return redirect('admin/cours')->with('flash_message', 'Cour deleted!');
    }
}
