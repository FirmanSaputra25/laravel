<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $authors = Author::all();
      foreach($authors as $author){
        $author->date = convert_date($author->created_at);
      }
       return view('admin.author',compact('authors'));
    }
    public function api()
    {
      $authors = Author::all();
      $datatables = datatables()->of($authors)->addIndexColumn();

      return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      //  return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param
     * @return
     * 
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'name' => ['required'],
        'phone_number' =>['required'],
        'email' => ['required' , 'email'],
        'address' =>['required'],
      ]);
      Author::create($request->all());

      return redirect('authors');
    //  Author::create(['name'=>$request->name, 'email'=>$request->email, 'phone_number'=>$request->phone_number , 'address'=>$request->address]);

    //   return redirect('authors');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    
        { 
        return view('admin.author.edit' , compact('author'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
         $this->validate($request,[
        'name' => ['required'],
        'phone_number' =>['required'],
        'email' => ['required', 'email'],
        'address' =>['required'],
      ]);
      $author->update($request->all());

      return redirect('authors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
       $author->delete(); 
        return redirect('authors');
    }
}