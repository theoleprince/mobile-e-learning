<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\ReponseC;
use Illuminate\Http\Request;

class ReponseCController extends Controller
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
            $reponsec = ReponseC::where('reponse', 'LIKE', "%$keyword%")
                ->orWhere('commentaire_id', 'LIKE', "%$keyword%")
                ->orWhere('created_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $reponsec = ReponseC::latest()->paginate($perPage);
        }

        return view('admin.reponse-c.index', compact('reponsec'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.reponse-c.create');
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

        ReponseC::create($requestData);

        return redirect('admin/reponse-c')->with('flash_message', 'ReponseC added!');
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
        $reponsec = ReponseC::findOrFail($id);

        return view('admin.reponse-c.show', compact('reponsec'));
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
        $reponsec = ReponseC::findOrFail($id);

        return view('admin.reponse-c.edit', compact('reponsec'));
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

        $reponsec = ReponseC::findOrFail($id);
        $reponsec->update($requestData);

        return redirect('admin/reponse-c')->with('flash_message', 'ReponseC updated!');
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
        ReponseC::destroy($id);

        return redirect('admin/reponse-c')->with('flash_message', 'ReponseC deleted!');
    }
}
