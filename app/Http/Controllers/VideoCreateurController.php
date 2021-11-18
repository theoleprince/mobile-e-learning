<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Createur;
use Illuminate\Http\Request;
use App\Models\VideoCreateur;

class VideoCreateurController extends Controller
{
      public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $createurs = Createur::select('createurs.*')
                ->latest()
                ->paginate($perPage);
            foreach($createurs as $createur){
                $createur->videos = VideoCreateur::where('video_createur_id', '=', $createur->id);

            }            
        } else {
            $createurs = Createur::select('createurs.*')
                        ->latest()
                        ->paginate($perPage);
              foreach($createurs as $createur){
                $createur->videos = VideoCreateur::where('video_createur_id', '=', $createur->id);
              }

            
        }

        //return response()->json($createurs);
        return view('admin.createur.index', compact('createurs'));
    }

       public function create()
    {
        return view('admin.createur.create');
    }

    public function store(Request $request)
    {
    
        $requestData = $request->all();
             if ($request->hasFile('video')) {
            $requestData['video'] = $request->file('video')
                ->store('uploads', 'public');
        }
        $createur = Createur::create($requestData);

        return redirect('admin/createur')->with('flash_message', 'createur added!');
    }

        public function show($id)
    {
        $createur = Createur::select('createurs.*')
                        ->where('createurs.id','=',$id)
                        ->first();             

        return view('admin.createur.show', compact('createur'));
    }

    public function edit($id)
    {
        $createur = Createur::findOrFail($id);


        return view('admin.createur.edit', compact('createur'));
    }

      public function update(Request $request, $id)
    {

        $requestData = $request->all();
        
     if ($request->hasFile('video')) {
            $requestData['video'] = $request->file('video')
                ->store('uploads', 'public');
        }
        $createur = Createur::findOrFail($id);
        $createur->update($requestData);              

        return redirect('admin/createur')->with('flash_message', 'Createur updated!');
    }

       public function destroy($id)
    {
        Createur::destroy($id);

        return redirect('admin/createur')->with('flash_message', 'Createur deleted!');
    }
}