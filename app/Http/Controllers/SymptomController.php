<?php

namespace App\Http\Controllers;

use App\Models\Symptoms;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function addSymptoms(Request $request)
    {
        return dd($request->all(),
    $request->yearly_no,
    $request->date_of_visit,
);
        
    //     $data = request() -> validate([
    //         'disease'=> 'required',
    //         'date_of_visit'=>'required',
    //         'symptoms'=>'required',
    //         'treatement'=>'required',
    //     ]);

    //     // return dd($request->all());
        
    //     $disease = new Symptoms;
    //     $disease->yearly_no = $request->yearly_no;
    //     $disease->disease = $request->disease;
    //     $disease->date_of_visit = $request->date_of_visit;
    //     $disease->symptoms = $request->symptoms;
    //     $disease->treatement = $request->treatement;
    //     $disease->remark = $request->remark;
    //     if($disease->save()) {
    //         return redirect('/admin/home')->with("message", $request->patient_name . " details have been save Successfuly. I will contact you soon!!");
    //     }
    //     return back()->with("message", $request->patient_name . " details can't saved. Please try again");
    
    }
}
