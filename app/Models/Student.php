<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'age',
        'status',
    ];

    public function deleteStudent($id){
        return $this->where('id', $id)->delete();
    }

    public function get_single($id){
        return $this->where('id', $id)->first();
    }
}
