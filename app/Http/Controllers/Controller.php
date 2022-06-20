<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Input;
class Controller extends BaseController
{
    public function ogrenci (){
        //$student=student ::where('sid', 1)->first();
        //$student=DB::table('student')->pagination(2);
        $student=student::sortable()->paginate(5);
       // return view('index', ['student'=>$student]);
        return view('index',compact('student'));
    }  
   
    public function ogrenciekle(Request $request){
            $validateData=$request->validate(
            ['fname' => 'required|string',
             'lname' => 'required|string',
             'birthplace'=> 'required|string',
             'birthdate' => 'required|date',
            ]
            );
       
           
            
        //kayıt işlem
        $student = new student();
        $student -> fname = $request -> fname;
        $student -> lname = $request -> lname;
        $student -> birthplace = $request -> birthplace;
        $student -> birthdate = $request -> birthdate;
        $student -> save();
        $totalstudent=student::select()->count();
        $totalpage= ceil($totalstudent / 5);
         return redirect("?page=$totalpage");    
    } 

    public function ogrencisil(int $sid){
        student::where('sid',$sid)->delete();
        return redirect()->route('index');
    }
    
    public function ogrenciguncelle(int $sid){
        $student=student::sortable()->paginate(5);
        $studentguncelle=student::where('sid', $sid)->first();
        return view('index', array('student'=>$student, 'ogrenci'=>$studentguncelle));
    }
    
    public function ogrencikaydet(Request $request, int $sid){
        $pagenumber=$_COOKIE["deneme"];
        $validateData=$request->validate(
            [   
                //'sid' => 'required|integer',
                'fname' => 'required|string',
                'lname' => 'required|string',
                'birthplace'=> 'required|string',
                'birthdate' => 'required|date',
            ]
        );
        //guncelle işlemi
       $student = student::find ($sid);
       $student -> fname = $request -> fname;
       $student -> lname = $request -> lname;
       $student -> birthplace = $request -> birthplace;
       $student -> birthdate = $request -> birthdate;
       $student -> save ();
      // return redirect()->route('index?page');
      // return back();
      
      return redirect("?page=$pagenumber");    
      
    }

    /*public function ogrenciekle2  (){
    //  $studentguncelle=student::where('sid', $sid)->first();
      return view('addform');
     }

    public function ogrenciguncelle2 (int $sid){
        $studentguncelle=student::where('sid', $sid)->first();
        return view('addform', array ('ogrenci'=>$studentguncelle));
    }*/
    public function ogrenciara(Request $request){
       

         $sid=$request->input('sid');
         $fname=$request->input('fname');
         $lname=$request->input('lname');
         $birthplace=$request->input('birthplace');
         $birthdate=$request->input('birthdate');
        
        if($fname==NULL){
             $fname="xxxx";
        }
        if($lname==NULL){
            $lname="xxxx";
        }
        if($birthplace==NULL){
            $birthplace="xxxx";
        }
        if($birthdate==NULL){
            $birthdate="1000-01-01";
        }
        if($sid==NULL){
            $sid=0;
        }


        $student=student::where('fname','like','%'.$fname.'%')
        ->orWhere('lname','like','%'.$lname.'%')
        ->orWhere('birthplace', 'like','%'.$birthplace.'%')
        ->orWhere('birthdate', $birthdate)  
        ->orWhere('sid', 'like','%'.$sid.'%');

        $x=$student->sortable()->paginate(5)->withQueryString(); 
        return view('search', array('student'=>$x));

    }

    
    
}



