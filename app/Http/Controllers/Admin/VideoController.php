<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;

class VideoController extends Controller
{
      public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $videos = Video::select('videos.*','categories.nom as _nom')
                ->join('categories','categories.id','=','videos.categorie_id')
                ->latest()
                ->paginate($perPage);
        } else {
            $videos = Video::select('videos.*','categories.nom as _nom')
                        ->join('categories','categories.id','=','videos.categorie_id')
                        ->latest()
                        ->paginate($perPage);
        }

        return view('admin.video.index', compact('videos'));
    }

       public function create()
    {
        $categories = Category::all();
        return view('admin.video.create',compact('categories'));
    }

    public function store(Request $request)
    {
          $requestData = $request->all();
                if ($request->hasFile('video')) {
            $requestData['video'] = $request->file('video')
                ->store('uploads', 'public');
        }

        Video::create($requestData);

        return redirect('admin/video')->with('flash_message', 'video added!');
    }

        public function show($id)
    {
        $video = Video::select('videos.*','categories.nom as _nom')
                        ->join('categories','categories.id','=','videos.categorie_id')
                        ->where('videos.id','=',$id)
                        ->first();

        return view('admin.video.show', compact('video'));
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        $categories = Category::all();


        return view('admin.video.edit', compact('video','categories'));
    }

      public function update(Request $request, $id)
    {

        $requestData = $request->all();
                if ($request->hasFile('video')) {
            $requestData['video'] = $request->file('video')
                ->store('uploads', 'public');
        }

        $video = Video::findOrFail($id);
        $video->update($requestData);

        return redirect('admin/video')->with('flash_message', 'video updated!');
    }

       public function destroy($id)
    {
        Video::destroy($id);

        return redirect('admin/video')->with('flash_message', 'video deleted!');
    }
}