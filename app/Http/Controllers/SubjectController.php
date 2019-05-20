<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Result;
use App\Land;
use App\Image;
use App\Violation;
use App\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use PDF;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('subject.index',[
            'subjects'=>$subjects,
        ]);
    }

    public function getSubjects(Request $request)
    {
        $subjects = Subject::with('image', 'status', 'violation', 'result', 'employee')->select('*');
//
//        return Datatables::of($subjects)
//            ->make(true);

        return Datatables::of($subjects)
            ->addColumn('action', function ($subject) {
                return '<a href="'.route('subject.edit', $subject).'"  class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
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
        $subjects = Subject::all();
        $statuses = Land::all();
        $employees = Employee::all();
        $violations = Violation::all();
        $results = Result::all();

        return view('subject.create', [
            'subjects'=>$subjects,
            'statuses' => $statuses,
            'employees' => $employees,
            'violations' => $violations,
            'results' => $results,
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
        $subjects = new Subject($request->all());
        $subjects->save();
        return redirect(route('subject.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('subject.edit', [
            'subject' => $subject,
            'statuses' => Land::all(),
            'violations' => Violation::all(),
            'results' => Result::all(),
            'employees' => Employee::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $subject->update($request->all());
        return redirect(route('subject.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }

    public function pdfexport()
    {
        $subject = Subject::all();
        $pdf = loadView('subject.pdf', ['subject'=>$subject])->setPaper('a4', 'portrait');
        return $pdf->stream();

    }



    public function getAddEditRemoveColumnData()
    {

            $subjects = Subject::all();
            return view('subject.pdf', [
                'subjects'=>$subjects,
            ]);

    }
}
