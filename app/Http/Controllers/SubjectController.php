<?php

namespace App\Http\Controllers;

use App\District;
use App\Mtu;
use App\Subject;
use App\Result;
use App\Land;
use App\Image;
use App\Type;
use App\Violation;
use App\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use PDF;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ImageSaver;

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
        $subjects = Subject::with('images', 'status', 'violation', 'result', 'employee', 'mtu', 'district','type')->select('*');
//
//        return Datatables::of($subjects)
//            ->make(true);



        return Datatables::of($subjects)
            ->addColumn('action', function ($subject) {
                return '<a href="'.route('subject.edit', $subject).'"  class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Редактиорвать</a>';

            })
//            ->addColumn('image', function($subject) {
//                if ($subject->images->count() > 0) {
//                    $start = '<a href="'.asset('uploads/'.$subject->images->first()->image).'"'.
//                        ' class="elem text-dark"'.
//                        ' data-lcl-thumb="'.asset('uploads/'.$subject->images->first()->image).'">'.
//                        'Все фото врача'.
//                        '</a>';
//
//                    $content = '<div class="content">';
//
//                    foreach ($subject->images as $index => $image) {
//                        if ($index != 0) {
//                            $content .= '<a class="elem" href="'. asset('uploads/'.$image->image).'"' .
//                                ' data-lcl-thumb="'.asset('uploads/'.$image->image).'">' .
//                                '<span style="background-image: url('.asset('uploads/'.$image->image).');"></span>' .
//                                '</a>';
//                        }
//                    }
//                    $content .= '</div>';
//
//                    $start .= $content;
//
//                    return $start;
//                }
//                return 'Nothing here';
//            })
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
            'districts' => District::all(),
            'mtus' => Mtu::all(),
            'types' => Type::all(),
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
        $subject = new Subject($request->all());
        $subject->save();

        if($images = $request->images)
        {
            foreach($images as $image)
            {
                $fileName = ImageSaver::save($image, "uploads", "subject");
                $image = new Image(["image" => $fileName]);
                $image->save();
                $subject->images()->attach($image);
            }


        }
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

//    public function pdfexport()
//    {
//        $subject = Subject::all();
//        $pdf = loadView('subject.pdf', ['subject'=>$subject])->setPaper('a4', 'portrait');
//        return $pdf->stream();
//
//    }


    public function map()
    {
            $subjects = Subject::all();
            return view ('yandex',[
                'subjects' => $subjects,
            ]);

//
    }
}
