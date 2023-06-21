@if ($the_end == 0)
<div class="container" style="direction:rtl">
    <div class="card cardAppointment">
        <div class="card-header cardAppointmentheader" style="display:grid; grid-template-columns:9fr 1fr">
            <h5 class="tittle_form" style="display:inline-block">{{$data[$counter]->question}}</h5>
            <span class="btn btn-warning" style="width:fit-content">{{$data[$counter]->mark}} درجات</span>

        </div>
        <div class="card cardAppointment">
            <div class="card-body">
                <div class="form-check" >
                    <input   class="form-check-input" type="radio" name="answer" id="option1" required value="answer_1"  >
                    <label wire:click="nextQuestion({{$data[$counter]->id}},{{$data[$counter]->mark}},'answer_1','{{$data[$counter]->right_answer}}')" for="option1" class="mx-4" >{{$data[$counter]->answer_1}}</label>
                </div>
               <div class="form-check" >
                    <input   class="form-check-input" type="radio" name="answer" id="option2" required value="answer_2" >
                    <label wire:click="nextQuestion({{$data[$counter]->id}},{{$data[$counter]->mark}},'answer_2','{{$data[$counter]->right_answer}}')" for="option2" class="mx-4" >{{$data[$counter]->answer_2}}</label>
                </div>
                <div class="form-check" >
                    <input   class="form-check-input" type="radio" name="answer" id="option3" required value="answer_3" >
                    <label wire:click="nextQuestion({{$data[$counter]->id}},{{$data[$counter]->mark}},'answer_3','{{$data[$counter]->right_answer}}')" for="option3" class="mx-4" >{{$data[$counter]->answer_3}}</label>
                </div>
             </div>
        </div>
    </div>
     <br>
</div>
@elseif($the_end == 1)
<div class="container" style="direction:rtl">
    <div class="card cardAppointment">
        <div class="card-header cardAppointmentheader" style="display:grid; grid-template-columns:9fr 1fr">
            <h5 class="tittle_form" style="display:inline-block">تهانينا!!!!!!!!</h5>
        </div>
        <div class="card cardAppointment">
            <div class="card-body">
               <p>لقد انهيت الاختبار بدرجة {{$score}}</p>
               <a class="btn btn-warning" href="{{route('show.quiz',$quiz_id)}}">لعرض الإجابات اضغط هنا</a>
             </div>
        </div>
    </div>
     <br>
</div>
@else
<div class="container" style="direction:rtl">
    <div class="card cardAppointment">
        <div class="card-header cardAppointmentheader" style="display:grid; grid-template-columns:9fr 1fr">
            <h5 class="tittle_form" style="display:inline-block">noooooooooo</h5>
        </div>

    </div>
     <br>
</div>
@endif
