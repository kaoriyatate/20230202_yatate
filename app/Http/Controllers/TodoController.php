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
    public function store(Request $request)

    {
        $todo = new Todo;
        $todo->user_id = auth()->user()->id;
        $form = $request->all();
        dd($form);
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
        $tags = Tag::all();
        $user = Auth::user();
        $keyword = Todo::where('content', 'LIKE BINARY', "%{$request->input}%")->first();
        $tag_id = Tag::where('id', $request->input)->first();
        $param = [
            'input' => $request->input,
            'keyword' => $keyword,
            'id' => $tag_id
        ];
        return view('find', $param, $tags, $user);
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
    public function update(TodoRequest $request)
    {
        $todo = [
            'content' => $request->input(),
            'tag_id' => $request->input()
        ];

        Todo::where('id', $request->id)->update($todo);
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
