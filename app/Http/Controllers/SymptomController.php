<?php

namespace App\Http\Controllers;
use App\Models\Personals;
use App\Models\Symptoms;
use Illuminate\Http\Request;
use PDF;

class SymptomController extends Controller
{
    

    public function addSymptoms(Request $request)
    {
        // return dd($request->all(),);
        
        $data = request() -> validate([
            'disease'=> 'required',
            // 'date_of_visit'=>'required',
            'symptoms'=>'required',
            'treatement'=>'required',
            'yearly_no'=>'required',
            
        ]);

        // dd($request->all(),$request->date_of_visit);
        
        $disease = new Symptoms;
        $disease->yearly_no = $request->yearly_no;
        $disease->disease = $request->disease;
        // $disease->date_of_visit = $request->date_of_visit;
        $disease->symptoms = $request->symptoms;
        $disease->treatement = $request->treatement;
        $disease->remark = $request->remark;
        if($disease->save()) {
            return redirect('/home')->with("message", $request->disease . " details have been save Successfuly. I will contact you soon!!");
        }
        return back()->with("message", $request->disease . " details can't saved. Please try again");
    
    }
    public function showSymptom($yearly_no){
           
            # code...
            return view('symptom',compact('yearly_no'));
    }

    public function showPatient($id){
        $showSymptom = Symptoms::find($id);

        return view('showPagePatient',compact('showSymptom'));

    }
    public function editSymptom( $id)
    {
        // dd($id);
        $personal = Symptoms::find($id);

        return view('editSymptomForm',compact('personal'));
    }
    public function updateSymptom(Request $request, $id){

        // dd($request->all());

        $disease = Symptoms::find($id);
        $data= request() -> validate([
            'yearly_no'=> 'required',
            'treatement'=> 'required',
            'symptoms'=>'required',
            'disease'=>'required',
        ]);
        
        $disease->yearly_no = $request->yearly_no;
        $disease->treatement = $request->treatement;
        $disease->symptoms = $request->symptoms;
        $disease->disease = $request->disease;
        if($disease->save()) {
            return redirect('/home')->with("message", $request->disease . " details have been save Successfuly. I will contact you soon!!");
        }
        return back()->with("message", $request->disease . " details can't saved. Please try again");
    
    }
    public function printSymptom($yearly_no,$id){
        $showDetail = Personals::where('yearly_no' , '=', $yearly_no)->get();
        $showSymptom = Symptoms::find($id);
        return view('printPdfPage',compact('showDetail','showSymptom'));


    }

}
