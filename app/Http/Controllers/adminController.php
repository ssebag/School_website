<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Class_Teacher;
use App\Models\Student;
use App\Models\Quiz;
use App\Models\Subject;
use App\Models\Classs;
use App\Models\Mark;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexForTeacher()
    {
        $class_subjectt=Class_Teacher::orderBy('class_id')->get();

        return view('admin.teacher',compact('class_subjectt'));
    }
    public function indexForStudent($id)
    {
        $students=Student::where('class_id',$id)->get();
        return view('admin.student',compact('students'));

    }
    public function addMarks($id){
        $quiz=Quiz::findorfail($id);
        $mark=Mark::where('quiz_id',$quiz->id)->first();
        $full_mark=$mark->full_mark;
        $quiz_class=$quiz->class_teacher->class_id;
        $student=Student::where('class_id',$quiz_class)->get();
        return view('manager.addMark',compact('mark'),compact('student'));
    }
    public function addNewMarks($id,Request $req){
        $mark=Mark::where('quiz_id',$id)->first();
        $marks=Mark::where('quiz_id',$id)->get();
        $quiz=Quiz::findorfail($id);
        $ifff=Mark::where('quiz_id',$id)->where('student_id',$req['student'])->get();
        if($ifff->isEmpty()){
        Mark::create([
         'quiz_id'=>$id,
        'student_id'=>$req['student'],
        'deserved_mark'=>$req['deserved_mark'],
        'full_mark'=>$mark['full_mark'],
        ]);
        return redirect()->route('show.marks',$id);}
        else{
            return redirect()->back()->with('alert','This student is have a mark!!!!!!!!');
        }
    }

    public function showMarks($id){
        $marks=Mark::where('quiz_id',$id)->get();
        $quiz=Quiz::findorfail($id);
        return view('manager.tableForMarks',compact('marks'),compact('quiz'));
    }
    public function editMarks($id){
        $mark=Mark::findorfail($id);
        return view('manager.editMark',compact('mark'));
    }
    public function updateMarks(Request $req,$id){
        $mark=Mark::findorfail($id);
        $quiz_id=$mark->quiz_id;
        $marks=Mark::where('quiz_id',$quiz_id)->get();
        $quiz=Quiz::findorfail($quiz_id);
        $mark['deserved_mark']=$req['deserved_mark'];
        $mark->save();
        return view('manager.tableForMarks',compact('marks'),compact('quiz'));
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addNewUser');
    }
    public function createStudent($user)
    {
        $userName=User::findOrfail($user);
        $classes=Classs::all();
        return view('admin.NewStudent',['user'=>$userName, 'classes'=>$classes]);
    }
    public function createTeacher($user)
    {
        $userName=User::findOrfail($user);
        $subjects=Subject::all();
        $classes=Classs::all();
        return view('admin.NewTeacher',['user'=>$userName, 'subjects'=>$subjects, 'classes'=>$classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request)
    {
        $role=$request['status'];
        if($role == 'student')
        { $user=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),
            'role' => 'user'
        ]);
        $userId=$user->id;
        return redirect()->route('blade.for.add.new.student',compact('userId'));
        }
        elseif($role == 'teacher')
        { $user=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),
            'role' => 'manager'
        ]);
        $userId=$user->id;
        return redirect()->route('blade.for.add.new.teacher',compact('userId'));}
    }
    public function storeStudent(Request $request,$id)
    {
        $user=Student::where('user_id',$id)->get();
        if($user->isEmpty()){
            if($request['gender'] == 'male')
                { Student::create([
                        'user_id' =>$id,
                        'class_id' =>$request['class'],
                        'birth' => $request['date'],
                        'gender' => '0',
                    ]);}
            if($request['gender'] == 'famale')
                { Student::create([
                    'user_id' =>$id,
                    'class_id' =>$request['class'],
                    'birth' => $request['date'],
                    'gender' => '1',
                ]);}
                return redirect()->route('blade.for.add.new.user')->with('alert','The student is added');
        }
        else{

        return redirect()->route('blade.for.add.new.user')->with('alert','The student is already exist');
}


    }
    public function storeTeacher(Request $request,$id)
    {
        Class_Teacher::create([
            'user_id' => $id,
            'subject_id' => $request['subject'],
            'class_id' => $request['class'],
        ]);
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProfile($id)
    {
        $user=Auth::user()->role;
        if($user == 'user'){
            $student=Student::where('user_id',$id)->first();
        return view('profile',compact('student'));

        }
        elseif($user == 'manager'){
            $teacher=User::findorfail($id);
        return view('profile',compact('teacher'));

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
