<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BM\Books\Http\Controllers\BooksController; // Use the correct namespace
use BM\Books\Models\Books;
use BM\Books\views\pages\books\edit;
use BM\Books\Models\Category; // Import the Category model


class ExtendedCustomController extends BooksController
{
    public function store(Request $request)
    {
        $request->validate([
            'Author' => 'required',
            'Discription' => 'required',
            'Publication_date' => 'required',
            'Language' => 'required',
            'Publisher' => 'required',
            'Stock_quantity' => 'required',
        ]);

        // Save data in the parent controller (BooksController) for the 'name' and 'price' fields
        // parent::store($request);

        // Save additional data in the extended custom controller
        $book = new Books;
        $book->book_name = $request->name; // Make sure to use the correct field name (book_name)
        $book->book_price = $request->price;
        $book->category_id = $request->category_id;
        $book->author = $request->Author;
        $book->description = $request->Discription;
        $book->publication_date = $request->Publication_date;
        $book->language = $request->Language;
        $book->publisher = $request->Publisher;
        $book->stock_quantity = $request->Stock_quantity;
        $book->save();
        return redirect(route('admin.books'));
        // You can add any additional code specific to the extended custom controller here.

        // If you want to redirect after saving, you can do it here:
        // return redirect(route('admin.books'));
    }

    public function editPage($id)
    {
        return view('books::pages.books.edit', [
            "title" => "Edit Book",
            "categories" => Category::all(),
            "book" => Books::find($id)
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'Author' => 'required',
            'Discription' => 'required',
            'Publication_date' => 'required',
            'Language' => 'required',
            'Publisher' => 'required',
            'Stock_quantity' => 'required',
        ]);
        $book = Books::find($request->id);
        $book->book_name = $request->name;
        $book->book_price = $request->price;
        $book->category_id = $request->category_id;
        $book->author = $request->Author;
        $book->description = $request->Discription;
        $book->publication_date = $request->Publication_date;
        $book->language = $request->Language;
        $book->publisher = $request->Publisher;
        $book->stock_quantity = $request->Stock_quantity;
        $book->save();
        return redirect(route('admin.books'));
    }

    public function delete($id)
    {

        $book = Books::find($id);
        $book->delete();
        return redirect(route('admin.books'));
    }
}
