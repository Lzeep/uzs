<?php

namespace App\Http\Controllers;

use App\Tobject;
use App\Employee;
use App\Obekt;
use App\StatLand;
use App\StatObject;

use App\Violation;
use Yajra\DataTables\DataTables;
use DB;

use Illuminate\Http\Request;



class TobjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tobjects = Tobject::all();

        return view('tObject.index', [
            'tobjects'=>$tobjects,
        ]);

    }
    public function getObjects(Request $request)
    {
        $objects = Tobject::with('object', 'land', 'stat_object', 'violation', 'employee')->select('*');

        return Datatables::of($objects)
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $objects = Obekt::all();
        $statlands = StatLand::all();
        $statobjects = StatObject::all();
        $violations = Violation::all();
        $tObjects = Tobject::all();


        return view('tObject.create', [
            'tobjects'=>$tObjects,
            'violations'=>$violations,
            'statobjects'=>$statobjects,
            'statlands'=>$statlands,
            'obekts'=>$objects,
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
        $tObjects = new Tobject($request->all());
        $tObjects->save();
        return redirect(route('tObject.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tobject  $tobject
     * @return \Illuminate\Http\Response
     */
    public function show(Tobject $tobject)
    {
        return view('tObject.show', [
            'tobject'=>$tobject,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tobject  $tobject
     * @return \Illuminate\Http\Response
     */
    public function edit(Tobject $tobject)
    {
        return view('tObject.edit',[
            'tobjects'=>$tobject,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tobject  $tobject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tobject $tobject)
    {
        $tobject->update($request->all());
        return redirect(route('tObject.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tobject  $tobject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tobject $tobject)
    {

    }
}
