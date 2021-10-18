<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\ReponseQ;
use Illuminate\Http\Request;

class ReponseQController extends Controller
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
            $reponseq = ReponseQ::where('Reponse', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->orWhere('statut', 'LIKE', "%$keyword%")
                ->orWhere('finish', 'LIKE', "%$keyword%")
                ->orWhere('question_id', 'LIKE', "%$keyword%")
                ->orWhere('created_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $reponseq = ReponseQ::latest()->paginate($perPage);
        }

        return view('admin.reponse-q.index', compact('reponseq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.reponse-q.create');
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

        ReponseQ::create($requestData);

        return redirect('admin/reponse-q')->with('flash_message', 'ReponseQ added!');
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
        $reponseq = ReponseQ::findOrFail($id);

        return view('admin.reponse-q.show', compact('reponseq'));
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
        $reponseq = ReponseQ::findOrFail($id);

        return view('admin.reponse-q.edit', compact('reponseq'));
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

        $reponseq = ReponseQ::findOrFail($id);
        $reponseq->update($requestData);

        return redirect('admin/reponse-q')->with('flash_message', 'ReponseQ updated!');
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
        ReponseQ::destroy($id);

        return redirect('admin/reponse-q')->with('flash_message', 'ReponseQ deleted!');
    }
}
