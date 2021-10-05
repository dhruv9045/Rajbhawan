@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header row justify-content-between">
                    {{-- <div class="col-md-4 ">{{ __('List') }} 
                    </div> --}}
                    <div class="col-4">   
                        <a href="{{ route('patient') }}">
                          <button class="btn btn-success" type="submit" title="Add Patient">
                          <span class="fas fa-plus"></span>
                      </button></a>
                    </div>
                    <div class="col-4">
                      <div class="mx-auto pull-right">
                              <form action="" method="GET" role="search">
                                  <div class="input-group">
                                      <span class="input-group-btn mr-5 mt-1">
                                          <button class="btn btn-info" type="submit" title="Search Patient">
                                              <span class="fas fa-search"></span>
                                          </button>
                                      </span>
                                      <input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term">
                                      <a href="" class=" mt-1">
                                          <span class="input-group-btn">
                                              <button class="btn btn-danger" type="button" title="Refresh page">
                                                  <span class="fas fa-sync-alt"></span>
                                              </button>
                                          </span>
                                      </a>
                                  </div>
                              </form>
                      </div>
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
                      
                     <td><a href="/home/personForm/edit/{{$patientDetail['id']}}" >
                      <button class="btn btn-primary" type="submit" title="Edit">
                      <span class="fas fa-edit"></span>
                  </button></a></td>
                     <td><a href="/home/patient/view/{{$patientDetail['yearly_no']}}/id/{{$patientDetail['id']}}" >
                      <button class="btn btn-success" type="submit" title="View">
                      <span class="fas fa-eye"></span>
                  </button></a></td>
                     <td><a href="/home/symptomForm/{{$patientDetail['yearly_no']}}">
                      <button class="btn btn-warning" type="submit" title="Add Diagnosis">
                      <span class="fas fa-diagnoses"></span>
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
