<?php
namespace domain\Service;

use App\Models\Student;

class StudentService{

    protected $student;

    public function __construct(){
        $this->student=new Student();
    }

    public function store($request){

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

    public function get(){
        return $this->student->all();
    }

    public function delete($id){
        return $this->student->deleteStudent($id);
        // return $this->student->where('id', $id)->delete();
    }

    public function get_single($id){
        return $this->student->get_single($id);
    }

    public function update($request, $id){

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

                    $student=$this->student->where('id',$id)->first();

                    $student->update([
                        'name' => $request->name,
                        'url' => 'http://127.0.0.1:8000/' .$url, //not comma 
                        'age' => $request->age,
                    ]);

                    return 1;

                }else{
                    return 2;
                }
            }
            else{
                return 3;
            }

        }else{
            return 4;
        }


        
    }

}