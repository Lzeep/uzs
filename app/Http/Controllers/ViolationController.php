<?php

namespace App\Http\Controllers;

use App\Violation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $violation = Violation::all();
//        dd($violation);
        return view('violation.index', [
            'violation' => $violation,
        ]);
    }

    public function getViolation()
    {
        $violation = Violation::select(['id', 'name']);
        return DataTables::of($violation)
            ->addColumn('action', function ($violation)
            {
                return '<a href="'.route('violation.show', $violation).'"  class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Подробнее</a>';
            })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('violation.create', [
            'violation' => Violation::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $violation = new Violation($request->all());
        $violation->save();
        return redirect(route('violation.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function show(Violation $violation)
    {
        return view('violation.show', [
            'violation' => $violation,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function edit(Violation $violation)
    {
        return view('violation.edit', ['violation' => $violation,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Violation $violation)
    {
        $violation->update($request->all());
       return redirect(route('violation.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Violation $violation)
    {
        $violation->delete();
        return redirect(route('violation.index'), $violation);
    }
}
