<?php

namespace App\Http\Controllers;

use App\District;
use App\Mtu;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MtuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mtu.index', [
            'mtu' => Mtu::all(),
        ]);
    }

    public function getMtu()
    {
        $mtu = Mtu::with('district')->select('*');
        return DataTables::of($mtu)
            ->addColumn('action', function ($mtu)
            {
                return '<a href="'.route('mtu.show', $mtu).'"  class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Подробнее</a>';
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
        $districts = District::all();
        return view('mtu.create', [
            'mtu' => Mtu::all(),
            'districts' => $districts,
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
        $mtu = new Mtu($request->all());
        $mtu->save();
        return redirect(route('mtu.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mtu  $mtu
     * @return \Illuminate\Http\Response
     */
    public function show(Mtu $mtu)
    {
        return view('mtu.show', ['mtu' => $mtu,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mtu  $mtu
     * @return \Illuminate\Http\Response
     */
    public function edit(Mtu $mtu)
    {
        return view('mtu.edit', ['mtu' => $mtu, 'districts' => District::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mtu  $mtu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mtu $mtu)
    {
        $mtu->update($request->all());
        return redirect(route('mtu.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mtu  $mtu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mtu $mtu)
    {
        $mtu->delete();
        return redirect()->back();
    }
}
