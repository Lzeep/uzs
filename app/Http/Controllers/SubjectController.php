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
//        $role = Role::create(['name' => 'Tilek']);
//        Permission::create()
//        auth()->user()->givePermissionTo('add_subject');
//        auth()->user()->assignRole('inspector');
//        $permission = Permission::findById(1);
//        $role = Role::findById(1);
//        $role->givePermissionTo($permission);

//        return  auth()->user()->permissions;
//        return User::permission('add_subject')->get();
//        $role = Role::findById(3);
//        $permission = Permission::findById(3);
//        $role->givePermissionTo($permission);


//        auth()->user()->givePermissionTo('add_subject', 'add result', 'add type', 'add mtu');
//        auth()->user()->assignRole('guide');
//        $permission = Permission::create(['name' => 'delete mtu']);

//        $role = Role::findById(4);
//        $permission = Permission::findById(11);
//        $role->givePermissionTo($permission);

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
            'employee' => Employee::all(),
            'districts' => District::all(),
            'mtus' => Mtu::all(),
            'types' => Type::all(),
        ]);
    }
    public function mark(Subject $subject){
        return view('subject.mark', [
            'subject' => $subject,
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
        return redirect(route('subject.index'));
    }
    public function map()
    {
            $subjects = Subject::all();
            return view ('yandex',[
                'subjects' => $subjects,
            ]);
    }
}
