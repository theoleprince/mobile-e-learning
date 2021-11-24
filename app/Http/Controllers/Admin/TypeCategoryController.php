<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeCategory;
use Illuminate\Http\Request;

class TypeCategoryController extends Controller
{
    public function index(Request $request)
    {
         $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $type_categories = TypeCategory::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $type_categories = TypeCategory::latest()->paginate($perPage);
        }

        return view('admin.type-category.index', compact('type_categories'));
    }

    public function create()
    {
                return view('admin.type-category.create');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'nom' => 'required',
			'description' => 'required'
		]);
        $requestData = $request->all();

        TypeCategory::create($requestData);

        return redirect('admin/type-category')->with('flash_message', 'type_categorie added!');
    }

    public function show($id)
    {
        $type_categorie = TypeCategory::findOrFail($id);

        return view('admin.type-category.show', compact('type_categorie'));
    }

    public function edit($id)
    {
        $type_categorie = TypeCategory::findOrFail($id);

        return view('admin.type-category.edit', compact('type_categorie'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();

        $type_categorie = TypeCategory::findOrFail($id);
        $type_categorie->update($requestData);

        return redirect('admin/type-category')->with('flash_message', 'type_categorie updated!');
    }

    public function destroy($id)
    {
        TypeCategory::destroy($id);

        return redirect('admin/type-category')->with('flash_message', 'type_categorie deleted!');
    }
}
