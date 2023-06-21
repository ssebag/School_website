<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Student;
use App\Models\Quiz;
use App\Models\User;
use DB;
use App\Models\Class_Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LinkQuizNotification;
use App\Notifications\publishQuizNotification;

class OrderQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::all();
        $d=Auth::user()->unreadNotifications;
        foreach($d as $not){
           $not->markAsRead();
        }
        return view('admin.orderQuiz',compact('orders'));
    }
    public function add($id){
        $order=Order::findorfail($id);
        $quiz['class_teacher_id']=$order['class_teacher_id'];
        $quiz['date']=$order['date'];
        $quiz['done']=0;
        $q=Quiz::create($quiz);
        $t1=Class_Teacher::findorfail($quiz['class_teacher_id']);
        $manager=$t1['user_id'];
        $man=User::findorfail($manager);
        $t1Class=$q->class_teacher->class->name;
        $t1Subject=$q->class_teacher->subject->name;
        $date=$quiz['date'];
        Notification::send($man,new LinkQuizNotification($q->id,$t1Class,$t1Subject,$date));
        $notification=DB::table('notifications')->where('data->order_id',$id)->delete();
        $order->delete();
        $quiz_id=$q->id;
        $teacher=$t1->user->name;
        $subject=$t1->subject->name;
        $date=$q->date;
        $class_id=$t1->class_id;
        $students=Student::where('class_id',$class_id)->get();
        for($i=0 ; $i < count($students) ; $i++){
         $st[$i]=$students[$i]->user_id;
         $user=User::findorfail($st);
        }
        Notification::send($user,new publishQuizNotification($quiz_id,$teacher,$subject,$date));
        return redirect()->back()->with('alert','Add successful');
    }
    public function showQuiz(){
        $user=Auth::user()->role;
        if($user == 'admin'){
            $quizzes=Quiz::all();
            return view('admin.quiz',compact('quizzes'));
        }
        elseif($user == 'manager'){
            $c_t=Class_Teacher::where('user_id',Auth::id())->get();
            for($i=0 ; $i< count($c_t); $i++){
                $c_tt[$i]=$c_t[$i]['id'];
                $quizzes=Quiz::where('class_teacher_id',$c_tt[$i])->get();
                return view('admin.quiz',compact('quizzes'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteOrder($id){
       $order=Order::findorfail($id);
       $order->delete();
       return redirect()->back()->with('alert','order deleted success');
    }
    public function deleteQuiz($id){
        $order=Quiz::findorfail($id);
        $order->delete();
        return redirect()->back()->with('alert','quiz deleted success');
     }


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
