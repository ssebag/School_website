<!doctype html>
@php
    $user=Auth::id();
  if(Auth::check()){
    if(Auth::user()->role=='admin'){
        $class=\App\Models\Classs::all();
    }
    elseif(Auth::user()->role=='manager'){
        $class=\App\Models\Class_Teacher::where('user_id',$user)->get();
    }
  }
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sana Alsham Private School</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet" />



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
   @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-title web_title  p-2 " href="{{ url('/') }}">
                    Sana Al-Sham Private School
               </a>
                    @if (Auth::check())
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        @if(Auth::user()->role =='admin')
                          <li class="nav-item">
                            <a class="nav-link"  href="{{route('show.all.teacher')}}">Teacher</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{url('/addNewUser')}}">Add new User</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"  href="{{route('table.for.show.quiz')}}">Quizzes</a>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Students
                            </a>
                            <div class="dropdown-menu dro-menu" aria-labelledby="navbarDropdown">
                                @foreach ($class as $cl)
                                 <a class="dropdown-item " href="{{route('show.all.student',$cl->id)}}" >{{$cl->name}}</a>
                                @endforeach
                            </div>
                          </li>
                        @elseif (Auth::user()->role =='manager')
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('blade.for.new.quiz')}}">Add new Quiz</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('table.for.show.quiz')}}">Your Quizzes</a>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Students
                            </a>
                            <div class="dropdown-menu dro-menu" aria-labelledby="navbarDropdown">
                                @foreach ($class as $cl)
                                <a class="dropdown-item " href="{{route('show.all.student',$cl->id)}}">{{$cl->class->name}}</a>
                                @endforeach
                            </div>
                          </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('show.mark.for.student',Auth::id())}}">Show Your marks</a>
                          </li>
                        </ul>
                        @endif
                    </div>
                    @endif


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto ">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                          @if (Auth::user()->role == 'admin')
                          <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item " href="{{route('table.for.order.quiz')}}">
                                <span class="" style="background: yellow; padding:2px"> {{Auth::user()->unreadNotifications->count()}}</span>
                                  New Request
                                </a>
                                <a class="dropdown-item " href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                          @elseif(Auth::user()->role == 'manager')

                          <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                @foreach (Auth::user()->unreadNotifications as $notification )
                                     <div class="dropdown-item " style="background-color:rgb(247, 241, 241);">
                                        <span style="font-weight:bold;">Quiz <span style="color: purple">{{$notification->data['t1Subject']}}</span>
                                         for <span style="color: purple">({{$notification->data['t1Class']}})</span> class</span>
                                        <p style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">{{$notification->data['message']}} in date:
                                        <small style="color: purple">{{$notification->data['date']}}</small><br>
                                        <a class="" href="{{route('blade.add.question.for.quiz',$notification->data['quiz_id'])}}">Please press to add quistions</a>
                                    </p>
                                      </div> <hr>

                                @endforeach

                                <a class="dropdown-item " href="{{route('show.profile',Auth::id())}}">
                                    Your Profile
                                </a>
                                <a class="dropdown-item " href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                          @elseif(Auth::user()->role == 'user')
                          <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                @foreach (Auth::user()->unreadNotifications as $notification )
                                     <div class="dropdown-item  noti" style="background-color:rgb(247, 241, 241);">
                                        <span style="font-weight:bold;">Hello from <span style="color: purple;">Mr.{{$notification->data['teacher']}} :</span>
                                        <p style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">{{$notification->data['message']}}
                                        <span style="font-weight:bold;"> <span style="color: purple">{{$notification->data['subject']}}</span> subject
                                        <span style="color: purple;">{{$notification->data['date']}}</span>
                                        <span style="text-align:center;display:block">
                                            @if ($notification->data['wishes'] == 'Press to solve it')
                                            <span style="font-family:'Courier New', Courier, monospace"><a style="color:purple;font-weight:bold" href="{{route('show.quiz',$notification->data['quiz_id'])}}">{{$notification->data['wishes']}}</a></span>
                                            @else
                                            <span style="font-family:'Courier New', Courier, monospace">{{$notification->data['wishes']}}</span>
                                             @endif

                                       </span>


                                    </p>
                                      </div> <hr>

                                @endforeach
                                <a class="dropdown-item " href="{{route('show.profile',Auth::id())}}">
                                    Your Profile
                                </a>
                                <a class="dropdown-item " href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                          @endif

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class=" footer1 text-center text-lg-start text-muted" style="background-color:rgb(204, 204, 204);">
        <!-- Section: Social media -->

        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
          <div class="container text-end">
            <!-- Grid row -->
            <div class="row mt-3">
              <!-- Grid column -->
              <!-- Grid column -->
              <div class="col-md-4 col-lg-4 col-xl-4 col-4 mx-auto mb-md-0 ">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold  font7">للتواصل</h6>
                <p class="font7">ريف دمشق - الكسوة <i class="fa fa-address-card"></i> </p>
                <p class="font7">
                  sana_alsham@gmail.com <i class="fa fa-envelope"></i>
                </p>
                <p class="font7"> 0933557788 / 695692 <i class="fa fa-phone"></i></p>
              </div>
              <div class="col-md-4 col-lg-4 col-xl-4 col-4 mx-auto mb-md-0 ">
                <h6 class="text-uppercase fw-bold  font7">أوقات الدوام الإداري</h6>
                <p class="font7"> يومي الاثنين والثلاثاء</p>
                <hr>
                <p class="font7"> من الساعة الثامنة صباحاً حتى الساعة 2 ظهراً</p>

              </div>
              <div class="col-md-4 col-lg-4 col-xl-4 col-4 mx-auto ">
                <!-- Content -->
                <img class="footer-img" src="img/logo/1684090454303.png">
                <h6 class="text-uppercase fw-bold  font7 my-4 mx-3">
                  <i class="fas fa-gem me-3"></i>مهمتنا
                </h6>
                <p class="font7" style="direction:rtl">
                  إنشاء جيل مثقف .. ملم بجميع مجالات الحياة، من خلال وسائبل تعليمية وترفيهية.أبنائكم أمانتنا.
                </p>
              </div>
              <!-- Grid column -->
            </div>
            <!-- Grid row -->
          </div>
        </section>
      </footer>

      <footer class="text-center text-white" style="background-color:  #061030;">
        <!-- Grid container -->

        <div class="container contact p-4 pb-0">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a
              class="btn text-white btn-floating m-1"
              style="background-color: #3b5998;"
              href="https://www.facebook.com/sseba.gh"
              role="button"
              target="_blank"
              ><i class="fa fa-facebook-f"></i
            ></a>
            <!-- Instagram -->
            <a
              class="btn text-white btn-floating m-1"
              style="background-color: #ac2bac;"
              href="https://www.instagram.com/sseba_g"
              role="button"
              target="_blank"
              ><i class="fa fa-instagram"></i
            ></a>
          </section>
          <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 font7" style="background-color: rgba(0, 0, 0, 0.2);">
         Sana Al-Sham Private School
        </div>
        <!-- Copyright -->
      </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.iconify.design/3/3.0.1/iconify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>
