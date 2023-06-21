<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Student;
use App\Models\Class_Teacher;
use Illuminate\Support\Facades\Hash;
class AddUser extends Component
{
    public $current=1;
    public $name,$email,$password,$status,$phone,$date,$subject,$class_for_teacher,$class_for_student,$gender;
    /**for real time validation */
    public function updated($property)
    {
        $this->validateOnly($property,[
            'email' =>'required|email',
            'name' =>'required',
            'status' =>'required',
            'password' =>'required|min:6',
            'phone' =>'required',
            'date' =>'required',
            'class_for_teacher' =>'required',
            'gender'=>'required',
            'class_for_student' =>'required',
            'subject' =>'required',
        ]);
    }
    /** don't move if any field empty */
      public function firstStepSubmit(){
        $this->validate([
            'email' =>'required|email|unique:users',
            'name' =>'required',
            'status' =>'required' ,
            'password' =>'required|min:6',
            'phone' =>'required',
        ]);
        if($this->status == 'teacher'){
           $this->current=3;
      }
      elseif($this->status == 'student'){
        $this->current=2;
    }

    }
    public function secondStepforStudentSubmit(){
        $this->validate([
            'class_for_student' =>'required',
            'date' =>'required',
            'gender'=>'required',

        ]);
        $user= new User();
        $user->email =$this->email;
        $user->name =$this->name;
        $user->password =Hash::make($this->password);
        $user->phone =$this->phone;
        $user->role ='user';
        $user->save();
        $user_id=$user->id;
        $student= new Student();
        $student->user_id=$user_id;
        $student->class_id=$this->class_for_student;
        $student->gender=$this->gender;
        $student->birth=$this->date;
        $student->save();
        return redirect()->route('addUser');

    }
    public function secondStepforTeacherSubmit(){
            $this->validate([
                'class_for_teacher' =>'required',
                'subject' =>'required',
            ]);
            $userFound=User::where('email',$this->email)->first();
            if($userFound == null){
                $user= new User();
                $user_id=$user->id;
                $user->email =$this->email;
                $user->name =$this->name;
                $user->password =Hash::make($this->password);
                $user->phone =$this->phone;
                $user->role ='manager';
                $c_t=new Class_teacher();
                $user->save();
                $user_id=$user->id;
                $c_t->user_id=$user_id;
                $c_t->class_id=$this->class_for_teacher;
                $c_t->subject_id=$this->subject;
                $c_t->save();
                $this->current=4;
            }
            else{
                $c_t=new Class_teacher();
                $c_t->user_id=$userFound->id;
                $c_t->class_id=$this->class_for_teacher;
                $c_t->subject_id=$this->subject;
                $c_t->save();
                $this->current=4;

            }

       }

    public function finalStepSubmit(){
        return redirect()->route('addUser');
    }


    public function render()
    {
        return view('livewire.add-user');
    }

    public function back(){
        $this->current=1;
    }
}
