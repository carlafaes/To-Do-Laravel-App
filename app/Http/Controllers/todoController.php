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
            'title' => 'require|min:3'
        ]);
        $todo= new Todo;
        $todo-> title= $request->title;/**le asignamos los valores */
        $todo->save();

        return redirect()-> route('todos')->with('success','Tarea creada correctamente');
    }
}