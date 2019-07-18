<?php

namespace App\Http\Controllers\API;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['employee' => Employee::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'Full_name' => 'required|string:200',
            'Address' => 'required|string:200',
            'Phone' => 'string|string:100',
            'district_id' => 'integer'
        ]);
        if($validation->fails())
        {
            return response()->json(['status' => 'error', 'message' => $validation->getMessageBag()], 400);
        }
        else
        {
            return response()->json(['status' => 'success', 'subject' => Employee::create($validation->validated())], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['employee' => Employee::find($id)]);
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
        $employee = Employee::where('id', $id)->get();

        if($employee->toArray())
        {
            $validation = Validator::make($request->all(), [
                'Full_name' => 'required|string:200',
                'Address' => 'required|string:200',
                'Phone' => 'string|string:100',
                'district_id' => 'integer'
            ]);

            if($validation->fails())
            {
                return response()->json(['status' => 'error', 'message' => $validation->getMessageBag()], 400);
            }
            else
            {
                Employee::where('id', $id)->update($validation->validated());
                return response()->json(['status' => 'success', 'employee' => Employee::where('id', $id)->get()], 200);
            }
        }
        else{
            return response()->json(['status' => 'error', 'message' => 'Сотрудник не найден'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
