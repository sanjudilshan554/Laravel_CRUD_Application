<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class AgeValidationRule implements Rule
{
 
    // check the age whether less than 30 or not
    public function passes($attribute, $value){
        return $value < 30;
    }

    // if the value is not satisfied above condition then.
    public function message(){
        return "Student age must be contain numbers and less than 30";
    }

}
