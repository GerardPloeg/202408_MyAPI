<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Owner;

class BookOwnerController extends Controller
{
    /**
     * Display a listing of my books.
     */
    public function mybooks($id)
    {
        $owner = Owner::find($id);

        $books = Book::where('owner_id', $owner->id)->get();
        
        if (Book::where('owner_id', $owner->id)->exists())
        {
            return response()->json($books, 200);
        }
        else
        {
            return response()->json(["message" => "no books found"], 404); 
        }
    }

    /**
     * Buy a book.
     */
    public function buybook(Request $request, $owner)
    {
        if (Owner::where('id', $owner)->exists())
        {
            //$owner = Owner::find($owner);

            if (Book::where('id', $request->bookid)->exists())
            {
                $book = Book::find($request->bookid);
                $book->owner_id = is_null($owner) ? $book->owner_id : $owner;
                $book->save();
                return response()->json(["message" => "book bought"], 201);
            }
            else
            {
                return response()->json(["message" => "book not found"], 404); 
            }            
        }
        else
        {
            return response()->json(["message" => "owner not found"], 404); 
        }
    }

    /**
     * Buy a book.
     */
    public function buybookto(Request $request)
    {
        if (Owner::where('id', $request->ownerid)->exists())
        {
            $owner = Owner::find($request->ownerid);

            if (Book::where('id', $request->bookid)->exists())
            {
                $book = Book::find($request->bookid);
                $book->owner_id = is_null($request->ownerid) ? $book->owner_id : $request->ownerid;
                $book->save();
                return response()->json(["message" => "book bought"], 201);
            }
            else
            {
                return response()->json(["message" => "book not found"], 404); 
            }            
        }
        else
        {
            return response()->json(["message" => "owner not found"], 404); 
        }
    }

}
