<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Cour;
use App\Models\Phase;
use Illuminate\Http\Request;

class PhaseController extends Controller
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
            $phase = Phase::select('phases.*','cours.nom as _cours')
                ->join('cours','cours.id','=','phases.cours_id')
                ->where('titre', 'LIKE', "%$keyword%")
                ->orWhere('video', 'LIKE', "%$keyword%")
                ->orWhere('numero', 'LIKE', "%$keyword%")
                ->orWhere('temps', 'LIKE', "%$keyword%")
                ->orWhere('activated', 'LIKE', "%$keyword%")
                ->orWhere('finish', 'LIKE', "%$keyword%")
                ->orWhere('cours_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $phase = Phase::select('phases.*','cours.nom as _cours')
            ->join('cours','cours.id','=','phases.cours_id')
            ->latest()->paginate($perPage);
        }

        return view('admin.phase.index', compact('phase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cour = Cour::all();
        return view('admin.phase.create',compact('cour'));
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
                if ($request->hasFile('video')) {
            $requestData['video'] = $request->file('video')
                ->store('uploads', 'public');
        }

        Phase::create($requestData);

        return redirect('admin/phase')->with('flash_message', 'Phase added!');
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
        $phase = Phase::select('phases.*','cours.nom as _cours','users.name as _name')
                        ->join('cours','cours.id','=','phases.cours_id')
                        ->join('users','users.id','=','phases.created_id')
                        ->where('phases.id','=',$id)
                        ->first();

        return view('admin.phase.show', compact('phase'));
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

        $cour = Cour::all();
        $phase = Phase::findOrFail($id);

        return view('admin.phase.edit', compact('phase','cour'));
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
                if ($request->hasFile('video')) {
            $requestData['video'] = $request->file('video')
                ->store('uploads', 'public');
        }

        $phase = Phase::findOrFail($id);
        $phase->update($requestData);

        return redirect('admin/phase')->with('flash_message', 'Phase updated!');
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
        Phase::destroy($id);

        return redirect('admin/phase')->with('flash_message', 'Phase deleted!');
    }
}
