<?php

namespace App\Http\Controllers;

use App\Mtu;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mtu.create', [
            'mtu' => Mtu::all(),
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
        return view('mtu.edit', ['mtu' => $mtu,]);
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
//        $mtu->delete()
    }
}
