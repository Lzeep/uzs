<?php

namespace App\Http\Controllers\API;

use App\Mtu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MtuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['mtu' => Mtu::all()]);
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
            'district_id' => 'integer',
        ]);
        if($validation->fails())
        {
            return response()->json(['status' => 'error', 'message' => $validation->getMessageBag()], 400);
        }
        else
        {
            return response()->json(['status' => 'success', 'subject' => Mtu::create($validation->validated())], 200);
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
        return response()->json(['mtu' => Mtu::find($id)]);
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
        $mtu = Mtu::where('id', $id)->get();

        if($mtu->toArray())
        {
            $validation = Validator::make($request->all(), [
                'name' => 'required|string:200',
                'district_id' => 'integer',
            ]);

            if($validation->fails())
            {
                return response()->json(['status' => 'error', 'message' => $validation->getMessageBag()], 400);
            }
            else
            {
                Subject::where('id', $id)->update($validation->validated());
                return response()->json(['status' => 'success', 'mtu' => Mtu::where('id', $id)->get()], 200);
            }
        }
        else{
            return response()->json(['status' => 'error', 'message' => 'МТУ не найден'], 404);
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
