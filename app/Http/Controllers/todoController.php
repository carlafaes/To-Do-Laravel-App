<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class todoController extends Controller
{
    /**
     * index para mostrar todos los todos
     * store para guardar un todo
     * update para actualizar un todo
     * destroy para eliminar un todo
     * edit para mostrar el formulario de edicion
     */
    public function store(Request $request){

        $request-> validate([
            'title' => 'required|min:3'
        ]);
        $todo= new Todo;
        $todo-> title= $request->title;/**le asignamos los valores */
        $todo->save();

        return redirect()-> route('todos')->with('success','Tarea creada correctamente');
    }

    public function index(){
        $todos= Todo::all();
        return view('todos.index',['todos'=> $todos]);
    }

    public function show($id){
        $todo = Todo::find($id);
        return view('todos.show', ['todo' => $todo]);
    }

    public function update(Request $request, $id){
        $todo = Todo::find($id);
        $todo-> title = $request->title;
        $todo->  save();
        // return view('todos.index', ['success' => 'Tarea actualizada']);
        return redirect()->route('todos')->with('success', 'Tarea actualizada');
    }

    public function destroy(){
        $todos = Todo::all();
        return view('todos.index',['todos' => $todos]);
    }
}
