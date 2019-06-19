<?php

namespace App\Http\Controllers;

use App\Result;
use function foo\func;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::all();

        return view('result.index', [
            'results' => $results,
        ]);
    }

    public function getResult()
    {
        $result = Result::select(['id', 'name']);
        return DataTables::of($result)
            ->addColumn('action', function ($result)
            {
                return '<a href="'.route('result.show', $result).'"  class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Редактировать</a>';
            })

            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('result.create', [
            'results' => Result::all(),
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
        $result = new Result($request->all());
        $result->save();
        return redirect(route('result.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        return view('result.show', [
            'result' => $result,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {

        return view('result.edit', [
            'result' => $result,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        $result->update($request->all());
        return redirect(route('result.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        $result->delete();
        return redirect(route('result.index'));
    }
}
