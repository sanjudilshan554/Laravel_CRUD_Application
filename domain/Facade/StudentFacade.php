<?php
namespace domain\Facade;
use domain\Service\StudentService;
use Illuminate\Support\Facades\Facade;

class StudentFacade extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor()
    {
        return StudentService::class;
    }
}