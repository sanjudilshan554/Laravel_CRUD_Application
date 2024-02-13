<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // student values
    protected $fillable = [
        'name',
        'url',
        'age',
        'status',
    ];

    // delete student recode 
    public function deleteStudent($id){
        return $this->where('id', $id)->delete();
    }

    // get single student recode
    public function get_single($id){
        return $this->where('id', $id)->first();
    }
}
