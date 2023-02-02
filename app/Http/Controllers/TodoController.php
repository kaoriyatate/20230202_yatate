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
        $tags = Tag::all();
        $user = Auth::user();
        $todos = Todo::paginate(4);
        $param = ['todos'=> $todos, 'user'=> $user, 'tags'=> $tags];
        $todos = Todo::all();

        if (Auth::check()) {
            return view('index', $param);
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
        $todo ->user_id = $request->user()->id;
        $todo ->tag_id = $request->tag()->id;
        $form = $request->all();
        unset($form['_token']);
        $todo->fill($form)->save();
    

        return redirect('/home');

    



    }

    
    public function find()
    {
        $tags = Tag::all();
        $user = Auth::user();
        $todos = Todo::paginate(4);
        $param = ['todos' => $todos, 'user' => $user, 'tags' =>$tags];
        $todos = Todo::all();

        return view('find', $param);
    }


    public function search(Request $request)
    {
        $todo = Todo::find($request->input);
        $param = [
                'author' => $todo,
                'input' => $request->input
            ];
        return view('find', $param);
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
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
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
        Tag::find($request->id)->delete();

        return redirect('/home');
    }
}
