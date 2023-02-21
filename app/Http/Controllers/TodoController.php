<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $todos = Todo::all();
        $tags = Tag::all(); 
        
        

        if (Auth::check()){ 
            return view('index',['todos' => $todos, 'tags' => $tags, 'user' => $user ]);
        }  
        else {
            return view('auth/login');
        }
    }

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


        return redirect('/');
    }


    public function find()
    {
        $tags = Tag::all();
        $user = Auth::user();
        $todos = [];
        

        if (Auth::check()) {
            return view('find', ['todos' => $todos, 'user' =>$user, 'tags' => $tags]);
        } else {
            return view('auth/login');
        }
        
    }


    public function search(Request $request)
    {

        $tags = Tag::all();
        $user = Auth::user();
        
        


        $tag_id = $request->input('tag_id');
        $keyword = $request->input('keyword');

        $query = Todo::query();
        
        
        
            
        if (!empty($keyword)) {
            $query->where('content', 'LIkE', "%{$keyword}%");
            
        }
        
        if (!empty($tag_id)) {
            $query->where('tag_id', 'LIKE', $tag_id);


        }

        $todos = \Auth::user()->todos;
        $todos = $query->get();

        
        

        
        return view('find', compact('todos', 'keyword', 'tags', 'tag_id','user'));

        
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


        return redirect('/');
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


        return redirect('/');
    }
}
