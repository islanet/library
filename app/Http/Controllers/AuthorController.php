<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Author::latest()->paginate(5);
        return view('author.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          =>  'required|max:255',
            'last_name'     =>  'required|max:255',
        ]);

        $form_data = array(
            'name'       =>   $request->name,
            'last_name'  =>   $request->last_name,
        );

        Author::create($form_data);

        return redirect('author')->with('success', 'Datos agregados correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Author::findOrFail($id);
        return view('author.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Author::findOrFail($id);
        return view('author.edit', compact('data'));
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

        $request->validate([
            'name'          =>  'required|max:255',
            'last_name'     =>  'required|max:255'
        ]);


        $form_data = array(
            'name'    =>  $request->name,
            'last_name'     =>  $request->last_name,
        );

        Author::whereId($id)->update($form_data);
        return redirect('author')->with('success', 'Los datos fueron correctamente actualizados');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Author::findOrFail($id);
        $message = 'El autor tiene libros asociados, por favor eliminelos antes de eliminar el autor.';
        $messageType = 'error';
        if (!$data->books){
            $data->delete();
            $message = 'Los datos fueron correctamente eliminados.';
            $messageType = 'success';
        }

        return redirect('author')->with($messageType, $message);
    }
}
