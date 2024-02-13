<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NameValidationRule implements Rule
{
    
    // check whether the passed values are minimun 15 character and string 
    public function passes($attribute, $value){
        return !preg_match('/[0-9]\s]/', $value) && strlen($value) <15 ;
    }

    // retrun error message 
    public function message(){
        return "Name must be contain only letters";
    }
}
