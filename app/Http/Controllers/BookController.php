<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\CopyInventory;
use Illuminate\Support\Facades\DB;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::with('author','copy')->latest()->paginate(5);
        return view('book.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::selectRaw("CONCAT(name,' ', last_name) AS full_name, id")->pluck('full_name','id');
        return view('book.create', compact('authors'));
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
            'title'     =>  'required|max:255',
            'author_id' =>   'required|not_in:0',
            'total' =>  'required|numeric|max:20',
            'available' =>  'required|numeric|max:20|lte:total',
        ]);

        $form_data = array(
            'title'       =>   $request->title,
            'author_id'  =>   $request->author_id,
        );

        $book = Book::create($form_data);
        if ($book) {
            $form_data_copy = array(
                'total'      =>   $request->total,
                'available'  =>   $request->available,
                'book_id'    =>   $book->id
            );
            $copy = CopyInventory::create($form_data_copy);
        }
        return redirect('book')->with('success', 'Datos agregados correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Book::with('author','copy')->findOrFail($id);
        return view('book.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::selectRaw("CONCAT(name,' ', last_name) AS full_name, id")->pluck('full_name','id');
        $data = Book::findOrFail($id);
        return view('book.edit', compact('authors','data'));
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
            'title'     =>  'required|max:255',
            'author_id' =>   'required|not_in:0',
            'total' =>  'required|numeric|max:20',
            'available' =>  'required|numeric|max:20|lte:total',
        ]);

        $form_data = array(
            'title'       =>   $request->title,
            'author_id'  =>   $request->author_id,
        );
        Book::whereId($id)->update($form_data);
        $book = Book::findOrFail($id);
        $copyId = $book->copy->id;

        $form_data_copy = array(
            'total'      =>   $request->total,
            'available'  =>   $request->available,
        );
        $copy = CopyInventory::whereId($copyId)->update($form_data_copy);

        return redirect('book')->with('success', 'Los datos fueron correctamente actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Book::findOrFail($id);
        $message = 'El libro tiene ejemplares asociados, por favor eliminelos antes de eliminar el libro.';
        $messageType = 'error';
        if (!$data->copy){
            $data->delete();
            $message = 'Los datos fueron correctamente eliminados.';
            $messageType = 'success';
        }

        return redirect('book')->with($messageType, $message);
    }
}
