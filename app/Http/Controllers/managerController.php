<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Classs;
use App\Models\Order;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\User;
use App\Models\Class_Teacher;
use DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewQuizNotification;
use App\Notifications\publishQuizForsolveNotification;
class managerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function newQuiz(){
        $user=Auth::id();
        $c_t=Class_Teacher::where('user_id',$user)->select('subject_id','class_id')->groupBy('subject_id','class_id')->get();
        return view('manager.addNewQuiz',compact('c_t'));
    }

    public function requestQuiz(Request $req){
        $admin=User::where('role','admin')->get();
        $subject=Subject::where('id',$req['subject'])->first();
        $class=Classs::where('id',$req['class'])->first();
        $subject_id=$subject['id'];
        $class_id=$class['id'];
        $c_t=Class_Teacher::where('class_id',$class_id)->where('subject_id',$subject_id)->first();
        $c_tt=$c_t->id;
        $c_tDa1=Order::where('date',$req['date'])->first();
        if($req['date'] <= now()){
            return redirect()->back()->with('alert','The date was gone, please choose another date');
        }
        if($c_tDa1){
          $c_tDa11=$c_tDa1['class_teacher_id'];
          $cla_tea=Class_Teacher::find($c_tDa11);
         if($cla_tea['class_id'] == $req['class'] )
          return redirect()->back()->with('alert','There is other quiz in same day! Please choice another day.');
        }
        else{
            if(!$c_t){
                return redirect()->back()->with('alert','Please pay attention for your choice');
            }
            else{
                $order=Order::create([
                    'class_teacher_id'=>$c_tt,
                    'date'=>$req['date'],
                ]);
                Notification::send($admin,new NewQuizNotification($order->id));
                return redirect()->back()->with('alert','Your quiz is save in order table');
            }

        }

    }
    public function addQuestion($id){
        $quiz=Quiz::findorfail($id);
     /*    $notification=DB::table('notifications')->where('data->quiz_id',$id)->pluck('id');
        if($notification != null){
            $not=DB::table('notifications')->where('id',$notification)->first();
            $not->update(['read_at'=>now()]);
         } */
            return view('manager.addQuestion',compact('quiz'));

    }

    public function storeQuestion(Request $req,$id)
    {
        $question=Question::create([
            'quiz_id'=>$id,
            'question'=>$req['question'],
            'answer_1'=>$req['answer_1'],
            'answer_2'=>$req['answer_2'],
            'answer_3'=>$req['answer_3'],
            'right_answer'=>$req['right_answer'],
            'mark'=>$req['mark'],
        ]);
        return redirect()->back();
    }

    public function showQuiz($id){
        $questions=Question::where('quiz_id',$id)->get();
        return view('manager.showQuiz',compact('questions'),compact('id'));
    }
    public function publishQuiz($id){
     $quiz=Quiz::findorfail($id);
     $teacher=$quiz->class_teacher->user->name;
     $subject=$quiz->class_teacher->subject->name;
     $date=$quiz->date;
     $class_id=$quiz->class_teacher->class_id;
     $students=Student::where('class_id',$class_id)->get();
     for($i=0 ; $i < count($students) ; $i++){
      $st[$i]=$students[$i]->user_id;
      $user=User::findorfail($st);
     }
     $quiz['done']=1;
     $quiz->save();
     $notification=DB::table('notifications')->where('data->quiz_id',$id)->delete();
     $l=Notification::send($user,new publishQuizForsolveNotification($quiz->id,$teacher,$subject,$date));
     return redirect()->back()->with('alert','Your quiz is publish to all students.');

    }
    public function resultQuiz(Request $req){
        dd($req);
    }

    public function indexForStudent($id)
    {
         $user=Auth::id();
         $class_te=Class_Teacher::where('user_id',$user)->get();
          for($i=0 ; $i < count($class_te) ; $i++){
            $class=$class_te[$i]->class_id;
            $students=Student::where('class_id',$id)->get();
          }
          return view('admin.student',compact('students'),compact('class_te'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editQuestion($id)
    {
        $question=Question::findorfail($id);
        $quiz_id=$question->quiz_id;
        $quiz=Quiz::findorfail($quiz_id);
        return view('manager.editQuestion',compact('question'),compact('quiz'));
    }
    public function updateQuestion(Request $req,$id){
        $question=Question::findorfail($id);
        $question->question=$req->question;
        $question->answer_1=$req->answer_1;
        $question->answer_2=$req->answer_2;
        $question->answer_3=$req->answer_3;
        $question->right_answer=$req->right_answer;
        $question->mark=$req->mark;
        $question->save();
        return redirect()->back()->with('alert','Your update is success');
    }

    public function editQuiz($id)
    {
        $quiz=Quiz::findorfail($id);
        return view('manager.editQuiz',compact('quiz'));
    }
    public function updateQuiz(Request $req,$id){
        $quiz=Quiz::findorfail($id);
        $quiz->date=$req->date;
        $quiz->save();
        return redirect()->route('table.for.show.quiz')->with('alert','Your update is success');
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
        $quiz=Quiz::findorfail($id);
        $quiz_id=$quiz->id;
        $question=Question::where('quiz_id',$quiz_id)->delete();
        $quiz->delete();
        return redirect()->back();
    }
    public function destroyQuestion($id){
        $question=Question::findorfail($id);
        $question->delete();
        return redirect()->back();
    }
}
