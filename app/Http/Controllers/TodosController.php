<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class todosController extends Controller
{
    public function index() {

        // fetch all todos from database
        // display them in the todos.index page
        // Todo::all(); => fetch all Todos in DB
        return view('todos.index')->with('todos', Todo::all());
    }

    public function show(Todo $todo) {

        // Todo::find(); => fetch id of Todo in DB
        return view('todos.show')->with('todo', $todo);

    }

    public function create() {
        return view('todos.create');
    }

    public function store() {
        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);

        //gives data of user todo input of the create todo form
        $data = request()->all();
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();

        session()->flash('success', 'Todo created succesfully');
        
        return redirect('/todos');
    }

    public function edit(Todo $todo) {
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Todo $todo) {

        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo edited succesfully');

        return redirect('/todos');
    }

    public function destroy(Todo $todo) {
        $todo->delete();
        session()->flash('success', 'Todo deleted succesfully');
        return redirect('/todos');
    }

    public function complete(Todo $todo) {
        $todo->completed = true;
        $todo->save();
        session()->flash('success', 'Todo completed succesfully');
        return redirect('/todos');
    }
}
