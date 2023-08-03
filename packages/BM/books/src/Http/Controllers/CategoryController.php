<?php

namespace BM\Books\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use BM\Books\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{




    public function categories(Request $request)
    {
        $categories = Category::when($request->q !== null, function ($query) use ($request) {
            $query->where('category_name', "LIKE", "%" . $request->q . "%");
        })->get();

        $can_update_delete_save = function () {
            $user = Auth::user();
            return $user->user_type == "admin";
        };
        $data = [
            "title" => "Categories",
            "categories" => $categories,
            "q" => $request->q,
            "can_update_delete_save"=> $can_update_delete_save
        ];

        return view('books::pages.category.index', $data);
    }







    public function createPage(Request $request)
    {
        return view('books::pages.category.create', ["title" => "Create Category"]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = new Category;
        $category->category_name = $request->name;
        $category->save();
        return redirect(route('admin.categories'));
    }






    public function editPage($id)
    {
        return view('books::pages.category.edit', ["title" => "Edit Category", "category" => Category::find($id)]);
    }





    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = Category::find($request->id);
        $category->category_name = $request->name;
        $category->save();
        return redirect(route('admin.categories'));
    }






    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect(route('admin.categories'));
    }








    public function ajaxCategoryFilter(Request $request)
    {
        $term = trim($request->q);
        if (empty($term)) {
            return response()->json([]);
        }

        $categories = Category::where('category_name', "LIKE", "%$term%")->get();
        $formatted_category   = [];


        foreach ($categories as $category) {

            $formatted_category[] = ['id' => $category->id, 'text' => $category->category_name];
        }

        return response()->json($formatted_category);
    }
}
