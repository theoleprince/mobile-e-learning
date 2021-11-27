<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Cour;
use App\Models\Formation;
use App\Models\Phase;
use App\Models\Userformation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $formation = Formation::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('activated', 'LIKE', "%$keyword%")
                ->orderBy('activated','desc')
                ->latest()->get();
        } else {
            $formation = Formation::latest()
                                    ->orderBy('activated','desc')
                                    ->get();
        }
        foreach ($formation as $item) {
            $item->cours = Cour::where('formation_id','=', $item->id)
                                ->count();
        }
        return view('admin.formation.index', compact('formation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.formation.create');
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

        Formation::create($requestData);

        return redirect('admin/formation')->with('flash_message', 'Formation added!');
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
        $formation = Formation::findOrFail($id);
        $formation->users = Userformation::where('formation_id','=',$id)
                                        ->count();
        $cours = Cour::where('formation_id','=', $id)->get();
        foreach ($cours as $item) {
            $item->phase = Phase::where('cours_id','=', $item->id)
                                ->count();
            $ph = $item->phase;
        }
        // dd($cours);

        return view('admin.formation.show', compact('formation', 'cours'));
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
        $formation = Formation::findOrFail($id);

        return view('admin.formation.edit', compact('formation'));
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

        $formation = Formation::findOrFail($id);
        $formation->update($requestData);

        return redirect('admin/formation')->with('flash_message', 'Formation updated!');
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
        Formation::destroy($id);

        return back();
    }
}
