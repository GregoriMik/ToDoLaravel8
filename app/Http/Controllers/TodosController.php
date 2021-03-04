<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Todo;

class TodosController extends Controller
{
    // render todos page
    public function todo(){
        
        $todos = Todo::orderBy('created_at','desc')->get();

        return view('todos.todo',compact('todos'));
    }

    //create todos
    public function create(Request $request)
    {
            $request->validate([
            'todo'=>'required'
        ]);

        $todo = new Todo();
        $todo->todo = $request->todo;
        $todo-> save();

        return redirect()->back()->with('success','todo created successfully ...');
    }

    //delete todo
    public function destroy(Request $request, $id)
    {
        $todo=Todo::findOrFail($id);
        $todo->delete();

        return redirect()->back()->with('success','todo delete successfully ...');
    }
}
