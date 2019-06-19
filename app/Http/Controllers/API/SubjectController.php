<?php

namespace App\Http\Controllers\API;

use App\District;
use App\Employee;
use App\Land;
use App\Mtu;
use App\Result;
use App\Subject;
use App\Type;
use App\User;
use App\Violation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['subjects' => Subject::all()]);
    }


    public function create()
    {
        $districts = District::all('id', 'name');
        $mtus = Mtu::all('id', 'name');
        $types = Type::all('id', 'name');
        $statuses = Land::all('id', 'name');
        $violations = Violation::all('id', 'name');
        $results = Result::all('id', 'name');
        $employees = Employee::all('id', 'Full_name');
        $users = User::all('id', 'name', 'admin', 'email');

        return response()->json([
            'districts' => $districts,
            'mtus' => $mtus,
            'types' => $types,
            'statuses' => $statuses,
            'violations' => $violations,
            'results' => $results,
            'employees' => $employees,
            'users' => $users,
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
        $validation = Validator::make($request->all(), [
            'logo' => 'image',
            'district_id' => 'required|integer',
            'mtu_id' => 'required|integer',
            'type_id' => 'required|integer',
            'fucntionDoc' => 'required|integer',
            'address' => 'required|string:200',
            'name' => 'required|string:100',
            'owner' => 'required|string:100',
            'status_id' => 'required|integer',
            'sDoc' => 'required|integer',
            'sSub' => 'required|integer',
            'sReal' => 'required|integer',
            'violation_id' => 'required|integer',
            'result_id' => 'required|integer',
            'document' =>'required|string:200',
            'dateRent' => 'date_format:Y-m-d',
            'employee_id' => 'required|integer',
            'latitude' => 'required|string:100',
            'longitude' => 'required|string:100',
            'delPoint' => 'string:100',
            'deleter' => 'integer',
        ]);

        if($validation->fails())
        {
            return response()->json(['status' => 'error', 'message' => $validation->getMessageBag()], 400);
        }
        else
        {
            return response()->json(['status' => 'success', 'subject' => Subject::create($validation->validated())], 200);
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
        return response()->json(['subject' => Subject::find($id)]);
    }

    public function edit($id)
    {

        $subject = Subject::where('id', $id)->get();

        if($subject->toArray())
        {
            $districts = District::all('id', 'name');
            $mtus = Mtu::all('id', 'name');
            $types = Type::all('id', 'name');
            $statuses = Land::all('id', 'name');
            $violations = Violation::all('id', 'name');
            $results = Result::all('id', 'name');
            $employees = Employee::all('id', 'Full_name');
            $users = User::all('id', 'name', 'admin', 'email');

            return response()->json([
                'districts' => $districts,
                'mtus' => $mtus,
                'types' => $types,
                'statuses' => $statuses,
                'violations' => $violations,
                'results' => $results,
                'employees' => $employees,
                'users' => $users,
            ], 200);
        }
        else{
            return response()->json(['status' => 'error', 'message' => 'Объект не найден'], 404);
        }

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


        $subject = Subject::where('id', $id)->get();

        if($subject->toArray())
        {


            $validation = Validator::make($request->all(), [
                'logo' => 'image',
                'district_id' => 'required|integer',
                'mtu_id' => 'required|integer',
                'type_id' => 'required|integer',
                'fucntionDoc' => 'required|integer',
//                'address' => 'required|string:200',
                'name' => 'required|string:100',
                'owner' => 'required|string:100',
                'status_id' => 'required|integer',
                'sDoc' => 'required|integer',
                'sSub' => 'required|integer',
                'sReal' => 'required|integer',
                'violation_id' => 'required|integer',
                'result_id' => 'required|integer',
                'document' =>'required|string:200',
                'dateRent' => 'date_format:Y-m-d',
                'employee_id' => 'required|integer',
//                'latitude' => 'required|string:100',
//                'longitude' => 'required|string:100',
                'delPoint' => 'string:100',
                'deleter' => 'integer',
            ]);
            if($validation->fails())
            {
                return response()->json(['status' => 'error', 'message' => $validation->getMessageBag()], 400);
            }
            else
            {
                Subject::where('id', $id)->update($validation->validated());
                return response()->json(['status' => 'success', 'subject' => Subject::where('id', $id)->get()], 200);
            }
        }
        else {
            return response()->json(['status' => 'error', 'message' => 'Объект не найден'], 404);
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
        return response()->json(['subjects' => $this->delete()]);
    }
}
