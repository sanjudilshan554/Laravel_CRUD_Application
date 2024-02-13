<?php

// actual location
namespace domain\Facade;

// requirements
use domain\Service\StudentService;
use Illuminate\Support\Facades\Facade;

class StudentFacade extends Facade
{
    // Facade can access services methods without creation of instance class
    protected static function getFacadeAccessor()
    {
        // accessing and return result of StudentService::someMethod();
        return StudentService::class;
    }
}