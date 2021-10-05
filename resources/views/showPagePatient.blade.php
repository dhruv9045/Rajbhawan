@extends('layouts.app')

@section('content')
<style>
    .gridtable {
      width: 100%; 
    }
    @media screen and (max-width:768px) {
      .gridtable, .gridtable thead, .gridtable tbody {
        display: block; 
        width: 100%; 
      }
      .gridtable tr {
        display: grid;
        width: 100%;
        grid-template-columns: auto auto auto;
      }
    }
    </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div style="align-items: center; font-size: 110%; font-weight: 800;">{{ $showDetail['patient_name'] }} <br>
                        
                    </div>
                <div>{{__('Detail View according to the date patient visit.')}}</div>
                    {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">   
                        <a href="{{ route('patient') }}"><button class="btn btn-primary" type="button">Add Patient</button></a>
                    </div> --}}
                </div>
                <table class="table-responsive-sm table">
                    <thead>
                      <tr>
                        {{-- <th scope="col">Sr.no</th> --}}
                        <th scope="col">Patient Name</th>
                        <th scope="col">Yearly no</th>
                        <th scope="col">Gender</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Mobile no.</th>
                        <th scope="col">Disease</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        {{-- <th scope="row">{{$showDetail['id']}}</th> --}}
                        <td>{{$showDetail['patient_name']}}</td>
                        <td>{{$showDetail['yearly_no']}}</td>
                        <td>{{$showDetail['gender']}}</td>
                        <td>{{$showDetail['date_of_birth']}}</td>
                        <td>{{$showDetail['phone_no']}}</td>
                        <td>{{$showDetail['disease']}}</td>
                      <td><a href="/home/personForm/edit/{{$showDetail['id']}}">  
                        <button class="btn btn-primary" type="submit" title="Edit ">
                        <span class="fas fa-edit"></span>
                    </button></a></td> 
                      </tr>
                    </tbody>
                  </table>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif   
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center ">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div style="align-items: center; font-size: 110%; font-weight: 800;">{{ __('Date Wise') }} <br> 
                    </div>
                    {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">   
                        <a href="{{ route('patient') }}"><button class="btn btn-primary" type="button">Add Patient</button></a>
                    </div> --}}
                </div>
                <table class="table gridtable">
                    <thead>
                      <tr>
                        <th scope="col">Date of Visit</th>
                        <th scope="col">Yearly no</th>
                        <th scope="col">Treatement</th>
                        <th scope="col">Symptoms</th>
                        <th scope="col">Disease</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>@foreach ($showSymptom as $showSymptom)
                      <tr>
                          
                        <th scope="row">{{$showSymptom['date_of_visit']}}</th>
                        <td>{{$showSymptom['yearly_no']}}</td>
                        <td>{{$showSymptom['treatement']}}</td>
                        <td>{{$showSymptom['symptoms']}}</td>
                        <td>{{$showSymptom['disease']}}</td>
                        <td>{{$showSymptom['remark']}}</td>
                        
                      <td><a href="/home/symptomForm/edit/{{$showSymptom['id']}}" >
                        <button class="btn btn-primary" type="submit" title="Edit Diagnosis">
                        <span class="fas fa-edit"></span>
                    </button></a></td>
                      <td><a href="/home/symptomForm/print/{{$showDetail['yearly_no']}}/id/{{$showSymptom['id']}}" target="__blank">
                        <button class="btn btn-danger" type="submit" title="Print">
                        <span class="fas fa-print"></span>
                    </button></a></td>
           
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
