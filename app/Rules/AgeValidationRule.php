<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class AgeValidationRule implements Rule
{
 
    public function passes($attribute, $value){

        return $value < 150;
    }

    public function message(){
        return "the value must be contain numbers and less than 150";
    }

}
