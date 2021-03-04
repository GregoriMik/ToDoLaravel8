<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Todo;

class TodosController extends Controller
{
    // render todos page
    public function todo(){
        return view('todos.todo');
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

        return redirect()->back()->withSuccess('todo created successfull ...');
    }
}
