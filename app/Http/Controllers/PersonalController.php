<?php

namespace App\Http\Controllers;

use App\Models\Personals;
use App\Models\Symptoms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    public function index(Request $request)
    {
        request() -> validate([
            'patient_name'=> 'required',
            'yearly_no'=> 'required',
            'gender'=>'required',
            'date_of_birth'=>'required',
            'phone_no'=>'required',
           
        ]);

        // return dd($request->all());
        
        $personal = new Personals;
        $personal->patient_name = $request->patient_name;
        $personal->yearly_no = $request->yearly_no;
        $personal->gender = $request->gender;
        $personal->date_of_birth = $request->date_of_birth;
        $personal->phone_no = $request->phone_no;
        $personal->disease = $request->disease;
        if($personal->save()) {
            return redirect('/home')->with("message", $request->patient_name . " details have been save Successfuly. I will contact you soon!!");
        }
        return back()->with("message", $request->patient_name . " details can't saved. Please try again");
    
    }

    
    public function getPersonDetail() {
        $patientDetail = Personals::all();
        return view('home', compact('patientDetail')); 
    }
    public function deletePatient($id){
        $personal = Personals::where('id', $id)->firstorfail()->delete();
          echo ("User Record deleted successfully.");
          return redirect('/home');
    }
    public function updateFormPatient(Request $request, $id){
        $personal = Personals::find($id);
        $data= request() -> validate([
            'patient_name'=> 'required',
            'yearly_no'=> 'required',
            'gender'=>'required',
            'date_of_birth'=>'required',
            'phone_no'=>'required',
           
        ]);
        $personal->patient_name = $request->patient_name;
        $personal->yearly_no = $request->yearly_no;
        $personal->gender = $request->gender;
        $personal->date_of_birth = $request->date_of_birth;
        $personal->phone_no = $request->phone_no;
        $personal->disease = $request->disease;
        if($personal->save()) {
            return redirect('/home')->with("message", $request->patient_name . " details have been save Successfuly. I will contact you soon!!");
        }
        return back()->with("message", $request->patient_name . " details can't saved. Please try again");
    
    }
    public function editPagePatient( $id)
    {
        // dd($id);
        $personal = Personals::find($id);

        return view('editPersonForm',compact('personal'));
    }
    public function showPatient($yearly_no,$id){
        $showDetail = Personals::find($id);
        $showSymptom= Symptoms::find($yearly_no);
        // dd($yearly_no,$id);

        return view('showPagePatient',compact('showDetail','showSymptom'));

    }
  

}