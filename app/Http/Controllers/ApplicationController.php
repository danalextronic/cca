<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App ;
use App\Http\Requests;
use App\Http\Services\ApplicationService ;
use App\Application ;
use Illuminate\Support\Facades\Mail ;
use Illuminate\Support\Facades\Redirect ;
use Auth ; 
use DB ; 
use View ;

class ApplicationController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Application controllers
    |--------------------------------------------------------------------------
    |
    | This controller handles the submission and list/view/update of contractors application
    |
    */
    public function __construct() {
       $this->middleware('auth');
    }
   
    
  
    public function index() {
        $applications = Application::where('contractors_idcontractors',Auth::user()->id)->orderBy('idApplication','desc')->get()  ;
        return View::make('home')->with('applications',$applications) ;
    }
    // Show add application form depend on which state the contractor cames from .
    public function showAddNewAppForm($state) {
        // $state get
        $data['state'] = $state ;
        $arrays=null ;
       
        return View::make('app.'.$state)->with('arrays',$arrays) ;
    }
    
    // add new application
    public function store(Request $request , $state) {
        //  Redirect::back()->with('_token', csrf_token());
        $ApplicationService = new ApplicationService ;
        $ApplicationService->storeAppDetail($request,$state) ;
        return redirect('home')->with('message','Thank for your application, we will review your submission and get in touch with you shortly') ; ;

    }
    // update the application
    
    public function update(Request $request , $state,$id) {
        
        $applicationService = new ApplicationService ;
        $applicationService->update($request,$state,$id);
      
        return redirect('home') ;
    }

    public function show($state,$id) {
        
        $applicationService = new ApplicationService ;
        $arrays = $applicationService->showAppDetails($state,$id);
       
        return View::make('app.'.$state)->with('arrays',$arrays);
    }
    
  
    


    

    

    

    
    

   

    


    

   


    
    

    
    
    

   


    // Only for ACT
   


    


    



}
