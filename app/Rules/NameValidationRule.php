<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NameValidationRule implements Rule
{
    
    // check whether the passed values are less than 30 character and are they only string 
    public function passes($attribute, $value){
        return !preg_match('/[0-9]/', $value) && strlen($value) <15 ;
    }

    // retrun error message 
    public function message(){
        return "The value must be contain only letters";
    }
}
