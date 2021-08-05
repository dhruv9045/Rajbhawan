@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-4 ">{{ __('List') }} 
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">   
                        <a href="{{ route('patient') }}"><button class="btn btn-primary" type="button">Add Patient</button></a>
                    </div>
                </div>
                <table class="table-responsive-sm table">
                    <thead>
                      <tr>
                        <th scope="col">Sr.no</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Yearly no</th>
                        <th scope="col">Gender</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Mobile no.</th>
                        <th scope="col">Disease</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>@foreach ($patientDetail as $patientDetail)
                      <tr>
                          
                     
                        <th scope="row">{{$patientDetail['id']}}</th>
                        <td>{{$patientDetail['patient_name']}}</td>
                        <td>{{$patientDetail['yearly_no']}}</td>
                        <td>{{$patientDetail['gender']}}</td>
                        <td>{{$patientDetail['date_of_birth']}}</td>
                        <td>{{$patientDetail['phone_no']}}</td>
                        <td>{{$patientDetail['disease']}}</td>
                        {{-- Delete button --}}
                        {{-- <td>
                          <form id="delete-form-{{$patientDetail->id}}" 
                            + action="{{route('deletePatient', $patientDetail->id)}}"
                            method="post">

                          @csrf @method('DELETE')
                          <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                      </form>
                      </td> --}}

                      {{-- Edit Details --}}
                      
                     <td><a href="/home/personForm/edit/{{$patientDetail['id']}}" class="btn" style="background-color: blue; color:white;">Edit</a></td>
                     <td><a href="/home/patient/view/{{$patientDetail['yearly_no']}}/id/{{$patientDetail['id']}}" class="btn" style="background-color: green; color:white;">View</a></td>
                     <td><a href="/home/symptomForm" class="btn" style="background-color: yellow; color:black;">Add Symptoms</a></td>
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
