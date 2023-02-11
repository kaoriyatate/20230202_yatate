<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Symfony\Component\Console\Input\Input;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        $user = Auth::user();
        $tags = Tag::all();
        $todos = Todo::paginate(4);


        if (Auth::check()) {
            return view('index', ['todos' => $todos, 'user' => $user,  'tags' => $tags]);
        } else {
            return view('auth/login');
        }
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)

    {
        $todo = new Todo;
        $todo->user_id = auth()->user()->id;
        $form = $request->all();
        unset($form['_token']);
        $todo->fill($form,)->save();


        return redirect('/home');
    }


    public function find()
    {
        $tags = Tag::all();
        $user = Auth::user();
        $todos = [];


        return view('find', ['todos' => $todos, 'tags' => $tags, 'user' => $user]);
    }


    public function search(Request $request)
    {

        $tag_id = $request->input('tag_id');
        $keyword = $request->input('keyword');

        $query = Todo::query();
        
        
            
        if (!empty($keyword)) {
            $query->where('content', 'LIkE', "%{$keyword}%");
        }
        
        if (!empty($tag_id)) {
            $query->where('tag_id', 'LIKE', $tag_id);
        }
        $todos = $query->get();
    

        $tags = Tag::all();
        $user = Auth::user();
        

        return view('find', compact('todos', 'keyword', 'tags', 'tag_id','user'));

        

            
    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {
        $todo =Todo::find($request->id);
        $todo -> update([
            "content" => $request->content,
            "tag_id" => $request->tag_id,
        ]);


        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {


        Todo::find($request->id)->delete();


        return redirect('/home');
    }
}
