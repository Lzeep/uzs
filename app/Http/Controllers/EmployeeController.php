<?php

namespace App\Http\Controllers;

use App\District;
use App\Employee;
use Illuminate\Http\Request;
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
        $employee = Employee::with('district')->select('*');
        return Datatables::of($employee)
            ->addColumn('action', function ($employee) {
                return '<a href="'.route('employee.show', $employee).'"  class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Подробнее</a>';
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
        return view('employee.create', [
            'employees' => Employee::all(),
            'districts' => District::all(),
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
        $employee = new Employee($request->all());
        $employee->save();
        return redirect(route('employee.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employee.show', [
            'employee' => $employee,
            'districts' => District::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {


        return view('employee.edit', [
            'employee' => $employee,
            'districts' => District::all(),
        ]);
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
        $employee->update($request->all());
        return redirect(route('employee.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect(route('employee.index'));
    }

    public function ajax(Request $request)
    {
        $employee = Employee::where('district_id', '=', $request->district_id)->get();

        return response()->json([
            'employee'=> $employee,
        ]);
    }
}
