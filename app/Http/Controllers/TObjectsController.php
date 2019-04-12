<?php

namespace App\Http\Controllers;

use App\TObject;
use App\Employee;
use App\Objecct;
use App\StatLand;
use App\StatObject;
use App\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TObjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tObjects = TObject::all();
        $statLands = StatLand::all();

        return view('tObject.index', [
            'tObjects'=>$tObjects,
            'statLands'=>$statLands,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $objeccts = Objecct::all();
        $statlands = StatLand::all();
        $statobjects = StatObject::all();
        $violations = Violation::all();
        $tObjects = TObject::all();


        return view('tObject.create', [
            'tObjects'=>$tObjects,
            'violations'=>$violations,
            'statObjects'=>$statobjects,
            'stat:ands'=>$statlands,
            'objeccts'=>$objeccts,
            'employees'=>$employees,
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
        $tObjects = new TObject($request->all());
        $tObjects->save();
        return redirect('/tObjects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TObject  $tObjects
     * @return \Illuminate\Http\Response
     */
    public function show(TObject $tObject)
    {

        return view('tObject.show', [
            'tObject'=>$tObject,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TObject  $tObjects
     * @return \Illuminate\Http\Response
     */
    public function edit(TObject $tObjects)
    {
        return view('tObject.edit',[
            'tObjects'=>$tObjects,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TObject  $tObjects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TObject $tObjects)
    {
        $tObjects->update($request->all());
        return redirect('/tobjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TObject  $tObjects
     * @return \Illuminate\Http\Response
     */
    public function destroy(TObject $tObjects)
    {
        $tObjects->delete();
        return redirect()->back();
    }
}
