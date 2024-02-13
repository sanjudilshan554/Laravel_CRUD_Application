<?php

namespace App\Http\Controllers;

use App\Models\Student;
use domain\Facade\StudentFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{

    //  variable
    // protected $student;

    // public function __construct(){
    //     $this->student=new Student();
    // }

    
    // public function index(){
    //     return Inertia::render("Student/Dashboard");
    // }

    // calling facades to store details of new student
    public function store(Request $request){
        return StudentFacade::store($request);
    }

    // get all student details
    public function get_student(){
        $students=StudentFacade::get();
        return response()->json(['message'=>'200', 'data'=> $students]);
    }

    // delete particular student details
    public function delete($id){
        $deleted= StudentFacade::delete($id);
        
        if ($deleted) {
            return response()->json(['status'=> '200','message'=> 'Data has been deleted successfully']);
        } else {
            return response()->json(['status'=> '500','message'=> 'Failed to delete data']);
        }
    }

    // get individual details for update & delete students
    public function get_single($id){
        $student=StudentFacade::get_single($id);
        return response()->json(['message'=> 'data retrive successfully','status'=> '200','data'=> $student]);
    }

    // update existing student details
    public function update(Request $request, $id){

        $updation=StudentFacade::update($request,$id);
 
        // return the responses
        if($updation == 1){
            // success :)
            return response()->json(['status'=> '200','message'=> 'Data Updated Successfully']);
        }elseif($updation == 2){
            // client problem 
            return response()->json(['status'=> '400','message'=> 'Please upload your image or recheck whether the file type (PNG/JPEG)']);
        }elseif($updation == 3){
            // client problem
            return response()->json(['status'=> '400','message'=> 'Please upload valid images']);
        }elseif($updation == 4){
            // server problem
            return response()->json(['status'=> '500','message'=> 'Data Updated Successfully']);
        }
        
    }
}
