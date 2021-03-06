<?php

namespace App\Http\Controllers\API;

use App\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['result' => Result::all()]);
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
            'name' => 'required|string:200',
        ]);
        if($validation->fails())
        {
            return response()->json(['status' => 'error', 'message' => $validation->getMessageBag()], 400);
        }
        else
        {
            return response()->json(['status' => 'success', 'result' => Result::create($validation->validated())], 200);
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
        return response()->json(['result' => Result::find($id)]);
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
        $result = Result::where('id', $id)->get();

        if($result->toArray())
        {
            $validation = Validator::make($request->all(), [
                'name' => 'required|string:200',
            ]);

            if($validation->fails())
            {
                return response()->json(['status' => 'error', 'message' => $validation->getMessageBag()], 400);
            }
            else
            {
                Result::where('id', $id)->update($validation->validated());
                return response()->json(['status' => 'success', 'result' => Result::where('id', $id)->get()], 200);
            }
        }
        else{
            return response()->json(['status' => 'error', 'message' => 'Решение не найдена'], 404);
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
        $result = Result::where('id', $id)->get();
        $result->delete();
        return 204;
    }
}
