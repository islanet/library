<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Member::latest()->paginate(5);
        return view('member.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
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
            'member_number'     =>  'required|integer|unique:members',
            'name'              =>  'required|max:255',
            'last_name'         =>  'required|max:255',
            'phone'             =>  'required|numeric|min:10',
            'loans_books_limit' =>  'required|numeric|max:2',
            'active'            =>  'required|boolean',
        ]);

        $form_data = array(
            'member_number'       =>   $request->member_number,
            'name'                =>   $request->name,
            'last_name'           =>   $request->last_name,
            'phone'               =>   $request->phone,
            'loans_books_limit'   =>   $request->loans_books_limit,
            'active'              =>   $request->active,

        );

        Member::create($form_data);

        return redirect('member')->with('success', 'Datos agregados correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Member::findOrFail($id);
        return view('member.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Member::findOrFail($id);
        return view('member.edit', compact('data'));
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
            'name'              =>  'required|max:255',
            'last_name'         =>  'required|max:255',
            'phone'             =>  'required|numeric|min:10',
            'loans_books_limit' =>  'required|numeric|max:2',
            'active'            =>  'required|boolean',
        ]);

        $form_data = array(
            'name'                =>   $request->name,
            'last_name'           =>   $request->last_name,
            'phone'               =>   $request->phone,
            'loans_books_limit'   =>   $request->loans_books_limit,
            'active'              =>   $request->active,

        );

        Member::whereId($id)->update($form_data);

        return redirect('member')->with('success', 'Los datos fueron correctamente actualizados.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Member::findOrFail($id);
        $message = 'El Socio tiene préstamos asociados, por favor eliminelos antes de eliminar el socio.';
        $messageType = 'error';
        if (count($data->loans)==0){
            $data->delete();
            $message = 'Los datos fueron correctamente eliminados.';
            $messageType = 'success';
        }

        return redirect('member')->with($messageType, $message);
    }
}
