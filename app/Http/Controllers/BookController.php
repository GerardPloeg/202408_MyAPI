<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(10);
        return response()->json($books, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Book;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->save();
/*
        Book::create(['name' => $request->name,
                      'author' => $request->author,
                      'price' => $request->price]);
*/
        return response()->json(["message" => "book added"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //$book = Book::find($book);
        if (!empty($book))
        {
            return response()->json($book);
        }
        else
        {
            return response()->json(["message" => "book not found"], 201); 
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        if (!empty($book))
        {
            $book->name = is_null($request->name) ? $book->name : $request->name;
            $book->author = is_null($request->author) ? $book->author : $request->author;
            $book->price = is_null($request->price) ? $book->price : $request->price;

            $book->save();
            return response()->json(["message" => "book updated"], 201);
        }
        else
        {
            return response()->json(["message" => "book not found"], 404); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if (!empty($book))
        {
            $book->delete();

            return response()->json(["message" => "book deleted"], 201);
        }
        else
        {
            return response()->json(["message" => "book not found"], 404); 
        }
    }
}
