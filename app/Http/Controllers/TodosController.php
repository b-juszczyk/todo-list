<?php

namespace App\Http\Controllers;

use App\Models\Todo;

class TodosController extends Controller
{
    public function index()
    {
        //fetch all todos from database
        //display togos in index page
        $todos = Todo::all();
        return view('todos.index')->with('todos', $todos);
    }
    public function show(Todo $todo)
    {
        return view('todos.todo')->with('todo', $todo);
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store(Todo $todo)
    {
        $this->validate(
            request(),
            [
                'name' => 'required',
                'description' => 'required'
            ]
        );

        $data = request()->all();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();

        session()->flash('success','Todo created succesfully.');

        return redirect('/todos');
    }
    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo',$todo);
    }
    public function update(Todo $todo)
    {
        $this->validate(
            request(),
            [
                'name' => 'required',
                'description' => 'required'
            ]
        );

        $data = request()->all();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success','Todo updated succesfully.');

        return redirect('/todos');


    }
    public function delete(Todo $todo)
    {
        $todo->delete();
        session()->flash('success','Todo deleted succesfully.');
        return redirect('/todos');
    }
    public function complete(Todo $todo)
    {
        $todo->completed=true;
        $todo->save();
        session()->flash('success','Todo completed.');
        return redirect('/todos');
    }
}
