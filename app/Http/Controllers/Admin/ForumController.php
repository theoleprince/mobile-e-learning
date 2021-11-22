<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $participants = 0;
        $trie = $request->get('trie');
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $commentaire = Commentaire::orderBy('id','desc')->get();
            $user = User::all();
            $itérateur = 0;
            foreach ($commentaire as $item){
                $itérateur++;
                $utilisateur = $item->user_id;
                foreach ($user as $items){
                    $id = $items->id;
                    if ($utilisateur == $id) {
                        $item->name = $items->name;
                        $item->email = $items->email;
                        $item->prenom = $items->prenom;
                        $participants++;
                    }
                }
                $inconnu = $itérateur - $participants;
            }

            $commentaire = Commentaire::where('commentaire', 'LIKE', "%$keyword%")
                                        ->orderBy('id','desc')->get();
            $user = User::all();
            $itérateur = 0;
            foreach ($commentaire as $item){
                $utilisateur = $item->user_id;
                foreach ($user as $items){
                    $id = $items->id;
                    if ($utilisateur == $id) {
                        $item->name = $items->name;
                        $item->email = $items->email;
                        $item->prenom = $items->prenom;
                    }
                }
            }
        } else {
            $commentaire = Commentaire::orderBy('id','desc')->get();
            $user = User::all();
            $itérateur = 0;
            foreach ($commentaire as $item){
                $itérateur++;
                $utilisateur = $item->user_id;
                foreach ($user as $items){
                    $id = $items->id;
                    if ($utilisateur == $id) {
                        $item->name = $items->name;
                        $item->email = $items->email;
                        $item->prenom = $items->prenom;
                        $participants++;
                    }
                }
                $inconnu = $itérateur - $participants;
            }

            if (!empty($trie)) {
                if ($trie == "participants") {
                    $commentaire = Commentaire::where('phase_id','!=','0')->orderBy('id','desc')->get();
                    $user = User::all();
                    foreach ($commentaire as $item){
                        $utilisateur = $item->user_id;
                        foreach ($user as $items){
                            $id = $items->id;
                            if ($utilisateur == $id) {
                                $item->name = $items->name;
                                $item->email = $items->email;
                                $item->prenom = $items->prenom;
                            }
                        }
                    }
                } elseif ($trie == "inconnu") {
                    $commentaire = Commentaire::where('phase_id','=','0')->orderBy('id','desc')->get();
                } else{
                    $commentaire = Commentaire::orderBy('id','desc')->get();
                    $user = User::all();
                    $itérateur = 0;
                    foreach ($commentaire as $item){
                        $itérateur++;
                        $utilisateur = $item->user_id;
                        foreach ($user as $items){
                            $id = $items->id;
                            if ($utilisateur == $id) {
                                $item->name = $items->name;
                                $item->email = $items->email;
                                $item->prenom = $items->prenom;
                                $participants++;
                            }
                        }
                        $inconnu = $itérateur - $participants;
                    }
                }

            }
        }
        return view('admin.reponse-c.forum', compact('commentaire','participants','inconnu'));
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
        $request->phase_id = 0;
        $requestData = $request->all();

        Commentaire::create($requestData);

        return redirect('admin/forum')->with('flash_message', 'Formation added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        Commentaire::destroy($id);

        return redirect('admin/forum')->with('flash_message', 'Formation deleted!');
    }
}
