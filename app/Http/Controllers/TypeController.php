<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
//        dd($types);
        return view('type.index', [
            'types' => $types,
        ]);
    }


    public function getType()
    {
        $type = Type::select(['id', 'name']);
        return DataTables::of($type)
            ->addColumn('action', function ($type)
            {
                return '<a href="'.route('type.show', $type).'"  class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Подробнее</a>';
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
        return view('type.create', [
            'types' => Type::all(),
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
        $type = new Type($request->all());
        $type->save();
        return redirect(route('type.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('type.show', ['type' => $type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('type.edit', ['type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $type->update($request->all());
        return redirect(route('type.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect(route('type.index'));
    }
}
