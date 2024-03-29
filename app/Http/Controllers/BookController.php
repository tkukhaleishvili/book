<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Status;
use Spatie\QueryBuilder\QueryBuilder;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $books = QueryBuilder::for(Book::class)
            ->allowedFilters(['name', 'description'])
            ->orderBy('id', 'desc')
            ->paginate(10);
    
         //dd($books);
    return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        $authors = Author::all();
       return view('books.create', compact('statuses', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated= $request->validate([
            'name' => 'required',
            'authors' => 'required',
            'released_year' => 'required',
            'status_id' => 'required',
        ]);
        $book = Book::create($validated);
        $book->authors()->attach($validated['authors']);

        return redirect()->route('books.index')->with('success','books has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Book $book)
    {
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $statuses = Status::all();
        $authors = Author::all();
        return view('books.edit',compact('book','statuses', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validated= $request->validate([
            'name' => 'required',
            'authors' => 'required',
            'released_year' => 'required',
            'status_id' => 'required',
        ]);
        
        $book->authors()->sync($validated['authors']);
        $book->fill($request->post())->save();
        

        return redirect()->route('books.index')->with('success','books Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
       

        // Delete the book
        $book->delete();
        return redirect()->route('books.index')->with('success','book has been deleted successfully');
    }


}
