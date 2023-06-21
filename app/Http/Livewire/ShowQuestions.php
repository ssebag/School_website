<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Question;
use App\Models\Mark;
use App\Models\markQuiz;
use App\Models\Student;
use DB;
use Illuminate\Support\Facades\Notification;
class ShowQuestions extends Component
{
    public $counter=0;
    public $quiz_id,$student_id,$data,$question_count=0,$the_end=0,$score=0;

    public function render()
    {
        $notification=DB::table('notifications')->where('data->quiz_id',$this->quiz_id)->where('notifiable_id',$this->student_id)->delete();
        $this->data=Question::where('quiz_id',$this->quiz_id)->get();
        $this->question_count=$this->data->count();
        return view('livewire.show-questions',['data']);
    }

    public function nextQuestion($question_id,$mark,$answer,$right_answer){
        $degree=markQuiz::where('student_id',$this->student_id)->where('quiz_id',$this->quiz_id)->first();
        if($degree == null){
            $degree=new markQuiz();
            $degree->quiz_id=$this->quiz_id;
            $degree->student_id=$this->student_id;
            $degree->question_id=$question_id;
            if($answer == $right_answer){
                $degree->score +=$mark;
            }
            else{
                $degree->score +=0;
            }
            $degree->date=date('Y-m-d');
            $degree->save();
        }
        else{
            $degree->question_id=$question_id;
            if($answer == $right_answer){
                $degree->score +=$mark;
            }
            else{
                $degree->score +=0;

            }
            $degree->save();

        }

        if($this->counter < $this->question_count - 1){
            $this->counter++;
        }
        else{
            $student=Student::where('user_id',$this->student_id)->first();
            $markk=Mark::where('student_id',$student->id)->where('quiz_id',$this->quiz_id)->first();
            if($markk == null){
                $this->the_end= 1;
                $ful_mark=Question::where('quiz_id',$this->quiz_id)->sum('mark');
                $save_mark=new Mark();
                $save_mark->quiz_id=$this->quiz_id;
                $save_mark->student_id=$student->id;
                $save_mark->full_mark=$ful_mark;
                $save_mark->deserved_mark= $degree->score;
                $save_mark->save();
                $this->score=$save_mark->deserved_mark;
            }
            else{
                $this->the_end= 2;
            }
        }
       }
}
