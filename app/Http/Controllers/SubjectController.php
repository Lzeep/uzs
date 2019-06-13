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
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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
//        Permission::create()
//        auth()->user()->givePermissionTo('add_subject');
//        auth()->user()->assignRole('inspector');
       return  auth()->user()->permissions;



        $subjects = Subject::all();

        return view('subject.index',[
            'subjects'=>$subjects,
        ]);
    }
    public function getSubjects(Request $request)
    {
        $subjects = Subject::with('images', 'status', 'violation', 'result', 'employee', 'mtu', 'district','type')->select('*');
        return Datatables::of($subjects)
            ->addColumn('action', function ($subject) {
                return '<a href="'.route('subject.show', $subject).'"  class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Подробнее</a>';
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
        if($logo = $request->logo)
        {
            $fileName = ImageSaver::save($logo, 'uploads', 'subject_logo');
            $subject->logo = $fileName;
            $subject->save();
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
        return view('subject.show', [
            'subject' => $subject,
            'district' => District::all(),
        ]);
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
            'districts' => District::all(),
            'mtus' => Mtu::all(),
            'types' => Type::all(),
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
        if($logo = $request->logo)
        {
            $fileName = ImageSaver::save($logo, 'uploads', 'subject_logo');
            $subject->logo = $fileName;
            $subject->save();

        }
        return redirect(route('subject.show', $subject));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->back();
    }
    public function map()
    {
            $subjects = Subject::all();
            return view ('yandex',[
                'subjects' => $subjects,
            ]);
    }
}
