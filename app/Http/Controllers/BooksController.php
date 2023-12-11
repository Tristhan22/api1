<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    //all the books will be show
    public function index(){
        $book = Books::all();
        return response($book);
    }
    //only specific books will be show 
    public function show($id){
        $book = Books::find($id);
        return response($book);
    }
    //will store the books

    public function store(Request $request)
    {
        $book=new Books();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->published_at = $request->published_at;

        $book->save();
        return response([
            "message"=>"Books added in database!!"
        ]);
    }
    //will update the specific books 
    public function update(Request $request)
    {
        $book = Books::find($request->id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->published_at = $request->published_at;

        $book->update();
        return response([
            "message"=>"Updated Succesfully"
        ]);
    }
    //then the specific books will delete
    public function delete($id){
        $user = Books::find($id);
        if ($user == null){
            return response([
                "message"=>"Record not found"
            ],404);
        }
        else{
            $user->delete();
            return response([
                "message"=>"Deleted succesfully!"
            ],200);
        }
    }
}