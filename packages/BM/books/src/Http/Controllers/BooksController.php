<?php

namespace BM\Books\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use BM\Books\Models\Books;
use BM\Books\Models\Category;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{




    public function books(Request $request)
    {
        $selected_category = null;

        
        if (isset($request->ct)) {
            $selected_category = Category::find($request->ct);
        }


        $books =  Books::with('categories')->when($request->ct !== null, function ($query) use ($request) {
            $query->where('category_id', $request->ct);
        })->when($request->q !== null, function ($query) use ($request) {
            $query->where('book_name', "LIKE", "%" . $request->q . "%");
        })->get();


        $can_update_delete_save = function () {
            $user = Auth::user();
            return $user->user_type == "admin";
        };


        $data = [
            "title" => "Books",
            "books" => $books,
            "selected_category" => $selected_category,
            "q" => $request->q,
            "can_update_delete_save"=> $can_update_delete_save
        ];

        return view('books::pages.books.index', $data);
    }





    public function createPage(Request $request)
    {
        return view('books::pages.books.create', [
            "title" => "Create Book",
            "categories" => Category::all(),
        ]);
    }




    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'price' => 'required',

         
    //     ]);
    //     $book = new Books;
    //     $book->book_name = $request->name;
    //     $book->book_price = $request->price;
    //     $book->category_id = $request->category_id;
    //     $book->save();
    //     return redirect(route('admin.books'));
    // }





    // public function editPage($id)
    // {
    //     return view('books::pages.books.edit', [
    //         "title" => "Edit Book",
    //         "categories" => Category::all(),
    //         "book" => Books::find($id)
    //     ]);
    // }






    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'price' => 'required',
    //     ]);
    //     $book = Books::find($request->id);
    //     $book->book_name = $request->name;
    //     $book->book_price = $request->price;
    //     $book->category_id = $request->category_id;
    //     $book->save();
    //     return redirect(route('admin.books'));
    // }






    // public function delete($id)
    // {

    //     $book = Books::find($id);
    //     $book->delete();
    //     return redirect(route('admin.books'));
    // }
}
