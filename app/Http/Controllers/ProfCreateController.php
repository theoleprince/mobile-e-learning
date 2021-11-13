<?php

namespace App\Http\Controllers;

use App\Models\ProfCreate;
use Illuminate\Http\Request;

class ProfCreateController extends Controller
{
    public function create()
    {
        $data = ProfCreate::latest()->get();

       // dd($data);

        return view('client.prof-create.create',compact('data'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'objet' => 'required',
            'message' => 'required',
        ]);

        ProfCreate::create($data);

        $prof_creates = ProfCreate::latest()->get();


        //return view('client.prof-create.create',compact('prof_creates'));

        return redirect('prof-create')->with('flash_message', 'prof create added!');


    }
}