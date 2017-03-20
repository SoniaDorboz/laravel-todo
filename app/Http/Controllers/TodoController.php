<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Todo::paginate(10);
        return view('pages.todo.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'img'   => 'required|max:255',
            'at'   => 'required',
            'description' => 'required|min:10',
            'tags' => 'max:255',
        ]);
        $tags = (!empty($request->tags))? $request->tags :'';
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->img = $request->img;
        $todo->at = $request->at;
        $todo->description = $request->description;
        $todo->tags = $tags;
        $todo->save(); 
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        if(!empty($todo->id)){
            return view('pages.todo.show',compact('todo'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        if(!empty($todo->id)){
            return view('pages.todo.edit',compact('todo'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'img'   => 'required|max:255',
            'at'   => 'required',
            'description' => 'required|min:10',
            'tags' => 'max:255',
        ]);
        $tags = (!empty($request->tags))? $request->tags :'';
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->img = $request->img;
        $todo->at = $request->at;
        $todo->description = $request->description;
        $todo->tags = $tags;
        $todo->save(); 
        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        if (!empty($todo->id)) {
            $todo->delete();
        }
        return redirect()->route('todo.index');
    }
}
