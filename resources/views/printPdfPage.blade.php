<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
 @media (max-width: 575.98px) {  
  
   h2{
     font-size: 2rem;
     align-items: center;
   }
   .heading-row{
  font-size: 1.5rem;
  font-weight: 600;
}
.body-row {
  font-size: 1rem;
  font-weight: 400;
}
.logo-image img{
  height: 70px;
  width: 50px;
}
.float-right, .float-left{
  font-size: .7rem;
}
   
 }

/* // Small devices (landscape phones, 576px and up) */
@media (min-width: 576px) and (max-width: 767.98px) { 
  .heading-row{
    font-size: 1.5rem;
    font-weight: 600;
}
.body-row {
  font-size: 1.5rem;
  font-weight: 400;
}
.logo-image img{
  height: 80px;
  width: 60px;
}
h2{
     font-size: 1.6rem;
     align-items: center;
   }
 }


/* // Medium devices (tablets, 768px and up) */
@media (min-width: 768px) and (max-width: 991.98px) {  
  .logo-image img{
  height: 80px;
  width: 60px;
}
h2{
     font-size: 1.7rem;
     align-items: center;
   }
}

/* // Large devices (desktops, 992px and up) */
@media (min-width: 992px) and (max-width: 1199.98px) { 
  .logo-image img{
  height: 90px;
  width: 70px;
}
h2{
     font-size: 1.8rem;
     align-items: center;
   }
 }

/* // Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) { 
  .heading-row{
    font-size: 2rem;
    font-weight: 600;
}
.body-row {
  font-size: 1.5rem;
  font-weight: 400;
}
.logo-image img{
  height: 90px;
  width: 70px;
}

 }

/* // Large devices (desktops, less than 1200px) */
.logo-image img{
  height: 90px;
  width: 70px;
}

</style>
</head>
<body class="m-5" >
<div class="container ">
  <div class="border border-dark">
  @foreach ($showDetail as $showDetail )
  

  <div class="col p-5">
    <div class="row justify-content-between">
      <div class=".col-6 .col-md-4 float-left">
        D.H.S. 1
      </div>
      <div class=" .col-6 .col-md-4">
        <div class="logo-image"><img src="/image/logo.png"></div>
      </div>
      <div class=".col-6 .col-md-4 float-right">
        POP, MOHALI/@php
        $year = date("Y"); echo $year;
        @endphp
      </div>
    </div>
    <div class="row justify-content-center"><h2 ><center>PUNJAB RAJ BHAWAN DISPENSARY, CHANDIGARH</center></h2></div>

     
        <div class="my-5">
        <div class="row justify-content-around">
          <div class="heading-row col-4">
            Yearly No. 
          </div>
          <div class="body-row col-6">
            {{$showDetail['yearly_no']}}
          </div>
        </div>
        <div class="row justify-content-around">
          <div class="heading-row col-4">
            Name
          </div>
          <div class="body-row col-6">
            {{$showDetail['patient_name']}}
          </div>
        </div>
        <div class="row justify-content-around">
          <div class="heading-row col-4">
            D.O.B
          </div>
          <div class="body-row col-6">
            {{$showDetail['date_of_birth']}}
          </div>
        </div>
       
        <div class="row justify-content-around">
          <div class="heading-row col-4">
            Date 
          </div>
          <div class="body-row col-6">
            {{$showSymptom['date_of_visit']}}
          </div>
        </div>
        <div class="row justify-content-around">
          <div class="heading-row col-4">
            Disease 
          </div>
          <div class="body-row col-6">
            {{$showSymptom['disease']}}
          </div>
        </div>
        <div class="row justify-content-around">
          <div class="heading-row col-4">
            Treatement 
          </div>
          <div class="body-row col-6">
            {{$showSymptom['treatement']}}
          </div>
        </div>
        <div class="row justify-content-around">
          <div class="heading-row col-4">
            Remark 
          </div>
          <div class="body-row col-6">
            {{$showSymptom['remark']}}
          </div>
        </div>
        </div>

  
  </div>
  @endforeach
 
</div>
<div class="my-5 ">
<center>
  <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
</center></div></div>
<script>
function myFunction() {
  window.print();
}</script>
</body>
</html>