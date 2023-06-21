<div class="container">
@if ($current == 1)
       <div class="card cardAppointment">
     <div class="card-header cardAppointmentheader">
        <h1 class="tittle_form">Add New Student or Teacher: </h1>
     </div>
     <div class="card-body">
          <div class="form-row">
               <div class="col-md-4 mb-3">
                 <label for="validationTooltip01">First name</label>
                 <input type="text" class="form-control @error('name') is-invalid @enderror" id="validationTooltip01" wire:model="name" placeholder="Name" value="" autocomplete="off" required>
                 @error('name')
                 <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
               </div>
               <div class="col-md-4 mb-3">
                 <label for="validationTooltipUsername">Email</label>
                 <div class="input-group">
                   <div class="input-group-prepend">
                     <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                   </div>
                   <input type="text" class="form-control @error('email') is-invalid @enderror" wire:model="email" id="validationTooltipUsername" placeholder="Email" aria-describedby="validationTooltipUsernamePrepend" autocomplete="off" required>
                   @error('email')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                 </div>
               </div>
             </div>
             <div class="form-row">

                 <div class="col-md-4 mb-3">
                     <label for="password" >{{ __('Password') }}</label>
                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" wire:model="password" required autocomplete="new-password">

                     @error('password')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>
             </div>
             <div class="form-row">
                 <div class="col-md-4 mb-3">
                   <label for="validationTooltip01">Phone</label>
                   <input type="text" class="form-control @error('phone') is-invalid @enderror" id="validationTooltip01" wire:model="phone" placeholder="Phone" value="" autocomplete="off" >
                   @error('phone')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                  @enderror
                 </div>

               </div>
               <div class="col-md-4 mb-3 ">
               <fieldset class="form-group">
                 <div class="row">
                   <div class="col-sm-10">
                     <div class="form-group ">
                         <div class="form-check">
                             <input  class="form-check-input" type="radio" wire:model="status" id="option1" required value="teacher" >
                             <label class="form-check-label" for="option1">
                             Teacher
                             </label>
                             <div class="invalid-feedback ">
                                 You must agree before submitting.
                             </div>
                         </div>
                         <div class="form-check">
                             <input   class="form-check-input" type="radio" wire:model="status" id="option2" required value="student" >
                           <label class="form-check-label" for="option2">
                            Student
                           </label>
                           <div class="invalid-feedback">
                             You must agree before submitting.
                           </div>
                         </div>
                         @error('status')

                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       </div>

                   </div>
                 </div>
               </fieldset>
               </div>
              <div class="button-btn">
                <button class="btn btn-primary" wire:click="firstStepSubmit"  type="submit">Submit form</button>
             </div>



     </div>
    </div>
@elseif($current == 2)
    <button class="btn btn-primary my-2 button-btn" wire:click="back">Back</button>
    {{-- for add student --}}
    <div class="card cardAppointment">
        <div class="card-header cardAppointmentheader">
           <h1 class="tittle_form">Complete information for student <span style="color: purple; font-weight:bold"></span> : </h1>
        </div>
        <div class="card-body">
                <div class="row mb-3">
                    <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('Class :') }}</label>
                    <div class="col-md-4">
                        <select id="class_for_student" wire:model="class_for_student" class="form-control @error('class_for_student') is-invalid @enderror" >
                            @foreach (\App\Models\Classs::all() as $class)
                                  <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach

                        </select>
                        @error('class_for_student')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('Date:') }}</label>
                    <div class="col-md-4">
                       <input type="date" id="inputState" wire:model="date" class="form-control @error('date') is-invalid @enderror" required>
                    </div>
                    @error('date')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
                <div class="row mb-3 col-md-6 text-md-end ">
                    <fieldset class="form-group">
                      <div class="row">
                        <div class="col-sm-10">
                          <div class="form-group">
                              <div class="form-check mx-3 ">
                                  <input class="form-check-input" type="radio" wire:model="gender" id="male" required value="0" >
                                <label class="form-check-label" for="male">
                                Male
                                </label>
                              </div>
                              <div class="form-check mx-3 ">
                                  <input class="form-check-input" type="radio" wire:model="gender" id="famale" required value="1" >
                                <label class="form-check-label" for="famale">
                                 Famale
                                </label>
                              </div>

                            </div>


                        </div>
                      </div>
                     </fieldset>
                </div>
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4 button-btn">
                        <button wire:click="secondStepforStudentSubmit"  type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>

        </div>
       </div>
    </div>
    {{-- for add teacher --}}
@elseif($current == 3)
<button class="btn btn-primary my-2 button-btn" wire:click="back">Back</button>
<div class="card cardAppointment my-3">
    <div class="card-header cardAppointmentheader">
       <h1 class="tittle_form">Complete information for Teacher <span style="color: purple; font-weight:bold"></span>: </h1>
    </div>
    <div class="card-body">

            <div class="row mb-3">
                <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('Subject :') }}</label>
                <div class="col-md-4">
                    <select id="subject" wire:model="subject" class="form-control @error('subject') is-invalid @enderror" required>
                        @foreach (\App\Models\Subject::all() as $subject )
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                       @endforeach
                    </select>
                    @error('subject')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('Class :') }}</label>
                <div class="col-md-4">
                    <select id="class_for_teacher" wire:model="class_for_teacher" class="form-control @error('class_for_teacher') is-invalid @enderror" required>
                        @foreach (\App\Models\Classs::all() as $class)
                              <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach

                    </select>
                    @error('class_for_teacher')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
            </div>
            <div class="row mb-0" style="flex-direction: row-reverse;">
                <div class="col-md-4 button-btn" style="text-align: center;">
                    <button wire:click="finalStepSubmit"  type="submit" class="btn btn-success">
                        {{ __('Submit') }}
                    </button>
                </div>
                <div class="col-md-4 button-btn my-2" style="text-align: center;">
                    <button wire:click="secondStepforTeacherSubmit"  type="submit" class="btn btn-primary">
                        {{ __('Add another') }}
                    </button>
                </div>
            </div>
    </div>
   </div>
@elseif($current == 4)
<div class="container text-md-center alert alert-primary" >
   <h6>The addition was successful. Do you want to add another one?!</h6>
 </div>
 <button class="btn btn-primary my-2 button-btn" wire:click="back">Back</button>
<div class="card cardAppointment my-3">
    <div class="card-header cardAppointmentheader">
       <h1 class="tittle_form">Complete information for Teacher <span style="color: purple; font-weight:bold"></span>: </h1>
    </div>
    <div class="card-body">

            <div class="row mb-3">
                <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('Subject :') }}</label>
                <div class="col-md-4">
                    <select id="subject" wire:model="subject" class="form-control @error('subject') is-invalid @enderror" required>
                        @foreach (\App\Models\Subject::all() as $subject )
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                       @endforeach
                    </select>
                    @error('subject')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('Class :') }}</label>
                <div class="col-md-4">
                    <select id="class_for_teacher" wire:model="class_for_teacher" class="form-control @error('class_for_teacher') is-invalid @enderror" required>
                        @foreach (\App\Models\Classs::all() as $class)
                              <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach

                    </select>
                    @error('class_for_teacher')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
            </div>
            <div class="row mb-0" style="flex-direction: row-reverse;">
                <div class="col-md-4" style="text-align: center;">
                    <button wire:click="finalStepSubmit"  type="submit" class="btn btn-success">
                        {{ __('Final Submit') }}
                    </button>
                </div>
                <div class="col-md-4" style="text-align: center;">
                    <button wire:click="secondStepforTeacherSubmit"  type="submit" class="btn btn-primary">
                        {{ __('Add another') }}
                    </button>
                </div>
            </div>
    </div>
   </div>

@endif
 </div>
