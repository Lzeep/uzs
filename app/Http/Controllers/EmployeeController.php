<?php

namespace App\Http\Controllers;

use App\Employee;

use DB;
use function foo\func;
use Illuminate\Http\Request;

use Symfony\Component\VarDumper\Cloner\Data;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index');
    }
    public function getEmployees(Request $request)
    {
        $employees = Employee::with('position')->select();

        return Datatables::of($employees)
            ->addColumn('position', function ($item) {
                return $item->position->name;
            })
            ->make(true);
    }
    public function getAddEditRemoveColumn()
    {
        return view('employee.edit');
    }
    public function editData(){
        $employee = Employee::select(['id', 'Full_name', 'Address', 'Phone', 'position_id', 'district_id']);

        return DataTables::of($$employee)
            ->addColumn('action', function ($employee){
                return '<a href="#edit-'.$employee->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->editColumn('id', 'ID:{{$id}}')
            ->make(true);
    }
public function filter(Request $request){
        $employee = Employee::select('*');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
