@extends('layouts.app')
@section('content')
<div class="carousell">
 <div class="ca1">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner  ">
            <div class="carousel-item active ">
                <img class="d-block w-100 " src={{asset('img/slider/ss1.webp')}} style="">
                <div class="caption d-md-block">
                    <p>Welcome to</p>
                    <h5>Sana Al-Sham Private School</h5>

                </div>

              </div>
            @for ($i=3; $i< 14 ; $i++)
            <div class="carousel-item">
                <img class="d-block w-100 " src={{asset('img/slider/ss'.$i.'.jpg')}} style="">
                <div class="caption  d-md-block">
                  <p>Welcome to</p>
                  <h5>Sana Al-Sham Private School</h5>

                </div>

              </div>
            @endfor
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
 </div>
</div>
<div class="forMore">
    <p>For More Information</p>
</div>
<div class="welcomeCard">
      <div class="card " style="">
        <div class="cardHeader">
        </div>
        <img class="card-img-top" src="{{asset('img/s2.webp')}}" alt="Card image cap">
        <div class="card-bodyy">
          <p class="card-text">مجهزة بمخبر يملك أحدث الوسائل والإمكانيات اللازمة للتارب العملية</p>
        </div>
      </div>
      <div class="card " style="">
        <div class="cardHeader">
        </div>
        <img class="card-img-top" src="{{asset('img/s25.jpg')}}" alt="Card image cap">
        <div class="card-bodyy">
          <p class="card-text">هناك نشاطات عديدة ضمن مدرستنا لتنمية إمكانات الطالب</p>
        </div>
      </div>
      <div class="card " style="">
        <div class="cardHeader">
        </div>
        <img class="card-img-top" src="{{asset('img/s28.jpg')}}" alt="Card image cap">
        <div class="card-bodyy">
          <p class="card-text">مشاركة الطلاب ضمن مجموعات لتنمية روح المشاركة</p>
        </div>
      </div>
      <div class="card " style="">
        <div class="cardHeader">
        </div>
        <img class="card-img-top" src="{{asset('img/slider/ss21.jpg')}}" alt="Card image cap">
        <div class="card-bodyy">
          <p class="card-text">قاعة رسم وفنون كبيرة</p>
        </div>
      </div>
      <div class="card " style="">
        <div class="cardHeader">
        </div>
        <img class="card-img-top" src="{{asset('img/slider/ss17.jpg')}}" alt="Card image cap">
        <div class="card-bodyy">
          <p class="card-text">قاعات حاسوب تحوي حواسيب مجهزة ببرامج تعليمية وثقافية وترفيهية</p>
        </div>
      </div>

      <div class="card " style="">
        <div class="cardHeader">
        </div>
        <img class="card-img-top" src="{{asset('img/slider/ss18.jpg')}}" alt="Card image cap">
        <div class="card-bodyy">
          <p class="card-text">مكتبة كبيرة تضمن كتب من كافة المجالات</p>
        </div>
      </div>

      <div class="card " style="">
        <div class="cardHeader">
        </div>
        <img class="card-img-top" src="{{asset('img/slider/ss18.jpeg')}}" alt="Card image cap">
        <div class="card-bodyy">
          <p class="card-text">قاعة ترفيهية لأطفال الخلقة الأولى</p>
        </div>
      </div>
      <div class="card " style="">
        <div class="cardHeader">
        </div>
        <img class="card-img-top" src="{{asset('img/slider/ss8.jpg')}}" alt="Card image cap">
        <div class="card-bodyy">
          <p class="card-text">صفوف نموذجية ومقاعد مريحة</p>
        </div>
      </div>

      <div class="card " style="">
        <div class="cardHeader">
        </div>
        <img class="card-img-top" src="{{asset('img/slider/ss12.jpg')}}" alt="Card image cap">
        <div class="card-bodyy">
          <p class="card-text">فسحة خارجية مزودة بمقاعد مريحة</p>
        </div>
      </div>
      <div class="card " style="">
        <div class="cardHeader">
        </div>
        <img class="card-img-top" src="{{asset('img/slider/ss24.jpg')}}" alt="Card image cap">
        <div class="card-bodyy">
          <p class="card-text">مطبخ مجهز بمعدات آمنة</p>
        </div>
      </div>
      <div class="card " style="">
        <div class="cardHeader">
        </div>
        <img class="card-img-top" src="{{asset('img/slider/ss13.jpg')}}" alt="Card image cap">
        <div class="card-bodyy">
          <p class="card-text">فعاليات بين الطلاب من كافة الأعمار لتنمية روح التعاون</p>
        </div>
      </div>
      <div class="card " style="">
        <div class="cardHeader">
        </div>
        <img class="card-img-top" src="{{asset('img/slider/ss25.jpg')}}" alt="Card image cap">
        <div class="card-bodyy">
          <p class="card-text">قاعة منتوسوري ضخمة مجهزة بكافة الأدوات</p>
        </div>
      </div>





</div>
<div class=" container video1" >
  <video autoplay muted loop>
    <source src="video/istockphoto-1275089443-640_adpp_is.mp4" type="video/mp4">
  </video>
</div>
<div class="content" style="direction:rtl">
    <p>
        تأسست مدرسة  سنا الشام الخاصة منذ عدة سنوات تكللت بالنجاح والإنتاج المثمر،وتهدف المدرسة إلى الحفاظ على اللغة العربية والهوية الإسلامية وتعليم اللغات للأجيال معتمدة في ذلك على الأسلوب التفاعلي بين المعلم والطلاب ضمن صفوف نموذجية.
    </p>
</div>

@endsection
