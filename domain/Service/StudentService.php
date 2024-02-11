<?php
namespace domain\Service;

use App\Models\Student;

class StudentService{

    protected $student;

    public function __construct(){
        $this->student=new Student();
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
}