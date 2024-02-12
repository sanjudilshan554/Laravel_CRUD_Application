<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class AgeValidationRule implements Rule
{
 
    public function passes($attribute, $value){

        return $value < 30;
    }

    public function message(){
        return "Student age must be contain numbers and less than 30";
    }

}
