<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;

use App\Models\TypeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
       public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $categories = Category::select('categories.*','type_categories.nom as _nom')
                ->join('type_categories','type_categories.id','=','categories.type_categorie_id')
                ->latest()
                ->paginate($perPage);
        } else {
            $categories = Category::select('categories.*','type_categories.nom as _nom')
                        ->join('type_categories','type_categories.id','=','categories.type_categorie_id')
                        ->latest()
                        ->paginate($perPage);
        }

        return view('admin.category.index', compact('categories'));
    }

       public function create()
    {
        $type_categories = TypeCategory::all();
        return view('admin.category.create',compact('type_categories'));
    }

    public function store(Request $request)
    {
          $requestData = $request->all();
                if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }

        Category::create($requestData);

        return redirect('admin/category')->with('flash_message', 'Category added!');
    }

        public function show($id)
    {
        $categorie = Category::select('categories.*','type_categories.nom as _nom')
                        ->join('type_categories','type_categories.id','=','categories.type_categorie_id')
                        ->where('categories.id','=',$id)
                        ->first();

        return view('admin.category.show', compact('categorie'));
    }

    public function edit($id)
    {
        $categorie = Category::findOrFail($id);
        $type_categories = TypeCategory::all();


        return view('admin.category.edit', compact('type_categories','categorie'));
    }

      public function update(Request $request, $id)
    {

        $requestData = $request->all();
                if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }

        $categorie = Category::findOrFail($id);
        $categorie->update($requestData);

        return redirect('admin/category')->with('flash_message', 'Category updated!');
    }

       public function destroy($id)
    {
        Category::destroy($id);

        return redirect('admin/category')->with('flash_message', 'Category deleted!');
    }
}