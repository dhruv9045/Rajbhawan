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
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand">
                    {{ __('Punjab Raj Bahawan Dispensary, Chandigarh') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    {{-- Profile --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('profile').submit();">
                                        {{ __('Profile') }}
                                    </a>

                                    <form id="profile" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    {{-- logout --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                                           
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @php
        // Get today's date
        $yearly_no = date("Y");
        @endphp

        <main class="py-4">
            

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Patient Form') }}</div>
                <form class="col px-md-5 " action="/home/personForm" role="form" method="post">
                    @csrf
                    @if(session('message'))
                 <div class="alert alert-success text-center text-black message position-relative" role="alert">
                   <div class="content"> <i class="icon fa fa-check"></i> {{session('message')}}
                   </div>
                 </div>
                 @endif 
                    <div class="row">
                    <div class="col-md">
                      <label class="form-label">Name of Patient</label>
                      <input type="text" class="form-control" name="patient_name" id="patient_name" placeholder="Name of Patient" required>
                      @error('patient_name')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    {{-- <div class="col-md-2">
                        <label class="form-label">Age</label>
                        <input type="number" minlength="2" maxlength="3" class="form-control" name="date_of_birth" id="age">
                      </div> --}}
                    <div class="col-md">
                      <label class="form-label">Date of Birth</label>
                      <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
                    </div>
                    <div class="col-md">
                        <label class="form-label">Gender</label>
                        <div class="form-group row px-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" required>
                                <label class="form-check-label">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" required>
                                <label class="form-check-label">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Other" required>
                                <label class="form-check-label">Others</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="form-group col-md-4">
                      <label class="form-label">Yearly Number</label>
                      <input type="number"  class="form-control" minlength="4" maxlength="8" name="yearly_no" id="yearly_no" placeholder="Yearly number">
                      @error('yearly_no')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                   
                    <div class="form-group col-md-4">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" pattern="[6789][0-9]{9}" class="form-control" length="10" name="phone_no" id="phone_no" placeholder="Patient phone number" required>
                        @error('phone_no')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                {{-- </div>
                <div class="form-group row"> --}}
                    <div class="form-group col">
                      <label class="form-label">Disease</label>
                      <input type="text" class="form-control" name="disease" id="disease" placeholder="Disease" required>
                      @error('disease')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
        </main>
    </div>
   
</body>
</html>

