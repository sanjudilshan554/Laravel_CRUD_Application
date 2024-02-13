<?php
namespace domain\Service;

use App\Models\Student;
use App\Rules\AgeValidationRule;
use App\Rules\NameValidationRule;

class StudentService
{
    // variable creation
    protected $student;

    // creation constructor to initialize object of model
    public function __construct()
    {
        $this->student = new Student();
    }

    // store new student details
    public function store($request)
    {
        // check the validation with validation rules
        $validated = $request->validate([
            'name' => ['required', new NameValidationRule],
            'age' => ['required', new AgeValidationRule],
        ]);

        // if validation are succeed
        if ($validated) {

            // check whether request has image file or not
            if ($request->File('image')) {

                $profile_image = $request->File('image'); //get the image

                // check it validation
                if ($profile_image->isValid()) {

                    $name_generation = hexdec(uniqid()); //name generation
                    $image_extention = strtolower($profile_image->getClientOriginalExtension()); //extesion taken

                    // check the extesion , assigning path and full fill image image.jpeg
                    if ($image_extention == 'png' || $image_extention == 'jpeg' || $image_extention == 'jpg') {
                        $image_name = $name_generation . '.' . $image_extention;
                        $upload_location = 'image/profile_images/';
                        $url = $upload_location . $image_name;

                        $profile_image->move(public_path($upload_location), $image_name);

                        // store validated data
                        $this->student->create([
                            'name' => $validated['name'],
                            'url' => 'http://127.0.0.1:8000/' . $url, //not comma 
                            'age' => $validated['age'],
                        ]);

                        return response()->json(['status' => '200', 'message' => 'Data uploaded successfully']);

                    } else {
                        return response()->json(['status' => '500', 'message' => 'Please upload your image or recheck whether the file type (PNG/JPEG/JPG)']);
                    }
                } else {
                    return response()->json(['status' => '500', 'message' => 'Image validation fail']);
                }
                // if user not insert profile image
            } else {

                // store validated data
                $this->student->create([
                    'name' => $validated['name'],
                    'url' => '',
                    'age' => $validated['age'],
                ]);

                return response()->json(['status' => '200', 'message' => 'Created new account successfully : Keep on mind to update profile image later']);
            }
        } else {
            return response()->json(['status' => '400', 'message' => 'Bad Data']);
        }
    }

    // get all student details
    public function get()
    {
        return $this->student->all();
    }

    // delete unique student
    public function delete($id)
    {
        return $this->student->deleteStudent($id); //calling to model
        // return $this->student->where('id', $id)->delete();
    }

    // get unique student
    public function get_single($id)
    {
        return $this->student->get_single($id);
    }

    // update unique student
    public function update($request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', new NameValidationRule],
            'age' => ['required', new AgeValidationRule],
        ]);

        if ($validated) {
            if ($request->File('image')) {

                $profile_image = $request->File('image');

                if ($profile_image->isValid()) {
                    $name_generation = hexdec(uniqid());
                    $image_extention = strtolower($profile_image->getClientOriginalExtension());

                    if ($image_extention == 'png' || $image_extention == 'jpeg' || $image_extention == 'jpg') {
                        $image_name = $name_generation . '.' . $image_extention;
                        $upload_location = 'image/profile_images/';
                        $url = $upload_location . $image_name;


                        $profile_image->move(public_path($upload_location), $image_name);

                        $student = $this->student->where('id', $id)->first();

                        $status = filter_var($request->status, FILTER_VALIDATE_BOOLEAN);

                        $student->update([
                            'name' => $request->name,
                            'url' => 'http://127.0.0.1:8000/' . $url, //not comma 
                            'age' => $request->age,
                            'status' => $status,
                        ]);

                        //this  numbers will send response according to the return number
                        return 1;
                    } else {
                        return 2;
                    }
                } else {
                    return 3;
                }
            } else {

                // for non image profiles or previous profile updation
                $student = $this->student->where('id', $id)->first();

                // filter boolean as actual boolean 0/1
                $status = filter_var($request->status, FILTER_VALIDATE_BOOLEAN);

                //update validated student
                $student->update([
                    'name' => $validated['name'],
                    'url' => $request->url,
                    'age' => $validated['age'],
                    'status' => $status,
                ]);
                return 4;
            }
        }
    }
}