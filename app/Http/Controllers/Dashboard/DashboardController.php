<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class DashboardController extends Controller
{

    // this method is to send the moduleName var dynamically from the controller
    // instead of hard coding it in the 
    // blade view 
    // public function __construct() 
    //     { 
    //      $moduleName =  class_basename($this);
    //      $moduleName = Str::singular($moduleName);
    //      $this->moduleName = $moduleName;
     
    //     }
     public function getNameFromController() 
     { 
        $moduleName = Str::singular(class_basename($this));
        return $moduleName;
     } 
    
}
