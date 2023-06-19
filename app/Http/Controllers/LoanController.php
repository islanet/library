<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use App\Book;
use App\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Loan::with('copy.book.author','member')->latest()->paginate(5);
        return view('loan.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         /** Consulta que busca los libros  que tengan  ejemplares disponible
         */
        $books = Book::whereHas('copy', function ($query) {
            $query->where('available','>', 0);
        })->pluck('title','id');

        /** Consulta que busca los socios que tengan no tengan el limite de prestamos
         * Debajo query original para la base de datos, lo convertí a query builder
         */
        /*
            select * from members AS m left join (
            select count(*) as loans, member_id from loans where (active = true) group by member_id ) AS l
            on l.member_id = m.id
            where (m.active=true and (l.loans<m.loans_books_limit or l.loans is null))
        */
        $members =  DB::table('members AS m');
        $members->selectRaw(
               " CONCAT(m.name,' ', m.last_name) AS full_name, m.id " );
        $members->alias = 'm';
        $members->distinct();
        $members->leftJoin(DB::raw( "(select count(*) as loans, member_id from loans where (active = true) group by member_id) AS l "),
            'm.id', '=', 'l.member_id');
        $members->whereRaw("m.active=true and (l.loans < m.loans_books_limit or l.loans is null)");
        $members = $members->pluck('full_name','id');;

        return view('loan.create', compact('books','members'));

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
            'book_id' =>   'required|not_in:0',
            'member_id' =>   'required|not_in:0',
        ]);
        $book = Book::findOrFail($request->book_id);
        if ($book){
            $form_data = array(
                'copy_inventory_id' =>   $book->copy->id,
                'member_id'  =>   $request->member_id,
                'from' => Carbon::now()->format('Y-m-d H:i:s'),
                'to'=> Carbon::now()->format('Y-m-d H:i:s')
            );
            if ($book->copy->available>0){
                $copy = $book->copy;
                $copy->available --;
                $copy->save();
                Loan::create($form_data);
            }

        }
        return redirect('loan')->with('success', 'Datos agregados correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Loan::findOrFail($id);
        return view('loan.view', compact('data'));
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
        $form_data = array(
            'active'    =>  0,
        );

        Loan::whereId($id)->update($form_data);
        $loan =  Loan::findOrFail($id);
        if ($loan->copy->available < $loan->copy->total){
            $copy = $loan->copy;
            $copy->available ++;
            $copy->save();
        }
        return redirect('loan')->with('success', 'El libro fue devuelto correctamente');

    }
}
