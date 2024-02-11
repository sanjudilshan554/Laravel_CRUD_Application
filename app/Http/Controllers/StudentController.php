<?php

namespace App\Http\Controllers;

use App\Models\Student;
use domain\Facade\StudentFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{

    protected $student;

    public function __construct(){
        $this->student=new Student();
    }
    public function index(){
        return Inertia::render("Student/Dashboard");
    }

    public function store(Request $request){

        if($request->File('image')){
        
            $profile_image = $request->File('image');

            if($profile_image->isValid()){
                $name_generation= hexdec(uniqid());
                $image_extention=strtolower($profile_image->getClientOriginalExtension());

                if ($image_extention == 'png' || $image_extention == 'jpeg' || $image_extention == 'jpg'){
                    $image_name= $name_generation . '.' . $image_extention;
                    $upload_location =  'image/profile_images/';
                    $url= $upload_location .$image_name;


                    $profile_image->move(public_path($upload_location),$image_name);

                    $this->student->create([
                        'name' => $request->name,
                        'url' => 'http://127.0.0.1:8000/' .$url, //not comma 
                        
                        'age' => $request->age,
                    ]);

                    return response()->json(['status'=>'200', 'message'=>'Data uploaded successfully']);

                }else{
                    return response()->json(['status'=> '500','message'=> 'Please upload your image or recheck whether the file type (PNG/JPEG)']);
                }
            }
            else{
                return response()->json(['status'=> '500','message'=> 'Please enter valid data']);
            }

        }else{
            return response()->json(['status'=> '500','message'=> 'Please upload your image' ]);
        }
    }

    public function get_student(){
        $students=StudentFacade::get();
        return response()->json(['message'=>'200', 'data'=> $students]);
    }

    public function delete($id){
        $deleted= StudentFacade::delete($id);
        
        if ($deleted) {
            return response()->json(['status'=> '200','message'=> 'Data has been deleted successfully']);
        } else {
            return response()->json(['status'=> '500','message'=> 'Failed to delete data']);
        }
    }

    public function get_single($id){
        $student=StudentFacade::get_single($id);
        return response()->json(['message'=> 'data retrive successfully','status'=> '200','data'=> $student]);
    }

}
