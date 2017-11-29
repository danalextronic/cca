<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;
use Carbon\Carbon ;
use App\AppOHSWHS ; 

class AppOHSWHSService {

	public function show($id) {
	    return AppOHSWHS::where('applications_idapplication',$id)->get() ; 
	}
	
	public function update($request,$id) {
		$appOHSWHS =  AppOHSWHS::where('applications_idapplication',$id)->first() ;
		$appOHSWHS->OHSWHSPlanExist = $request->input('OHSWHSPlanExist') ;
		if ($request->input('dateManagementPlan')) {
			$appOHSWHS->dateManagementPlan = Carbon::createFromFormat('d/m/Y',$request->input('dateManagementPlan'))->toDateString() ;
		}
		$numInitial = $appOHSWHS->numberFiles;
		for($i=0;$i<$numInitial;$i++){
			if ($request->hasFile('OHSWHScopy_'.$i)) {

		        if ($request->file('OHSWHScopy_'.$i)->isValid()) {
		           
		            $FileService = new FileService ;
			        $FileService->uploadFile($request->file('OHSWHScopy_'.$i),Auth::guard('user')->user()->id,'OHSWHScopy_'.$i,$id) ;
		           
		        }
	    	}
		}


		$numFilesOhs = $request->input('numFilesOhs');
		$j=$numInitial-1 ;
		for($i=$numInitial-1;$i<$numFilesOhs;$i++) {
			if ($request->hasFile('OHSWHScopy_'.$i)) {

		        if ($request->file('OHSWHScopy_'.$i)->isValid()) {
		           
		            $FileService = new FileService ;
			        $FileService->uploadFile($request->file('OHSWHScopy_'.$i),Auth::guard('user')->user()->id,'OHSWHScopy_'.$j,$id) ;
		            $j++;
		        }
	    	}
		}
		$appOHSWHS->numberFiles = $j;
		$appOHSWHS->anotherContractorsSystem = $request->input('anotherContractorsSystem') ;
		$appOHSWHS->nameContractor = $request->input('nameContractor') ;
		$appOHSWHS->save() ; 
	}

	public function store($request,$idApplication,$idContractor) {
	    $appOHSWHS = new AppOHSWHS ;
	    $appOHSWHS->OHSWHSPlanExist = $request->input('OHSWHSPlanExist') ;
	    if ($request->input('dateManagementPlan')) {
	    	
	    	$appOHSWHS->dateManagementPlan = Carbon::createFromFormat('d/m/Y',$request->input('dateManagementPlan'))->toDateString() ;
	    }
	    $numFilesOhs = $request->input('numFilesOhs');
	    $j=0;
	    for($i=0;$i<$numFilesOhs;$i++){
	    	
	    	if ($request->hasFile('OHSWHScopy_'.$i)) {

		        if ($request->file('OHSWHScopy_'.$i)->isValid()) {
		           
		            $FileService = new FileService ;
			        $FileService->uploadFile($request->file('OHSWHScopy_'.$i),$idContractor,'OHSWHScopy_'.$j,$idApplication) ;
		            $j++;
		        }
	    	}

	    }
	    $appOHSWHS->numberFiles = $j;
	    
	    $appOHSWHS->anotherContractorsSystem = $request->input('anotherContractorsSystem') ;
	    $appOHSWHS->nameContractor = $request->input('nameContractor') ;
	    $appOHSWHS->applications_idapplication = $idApplication ;
	    $appOHSWHS->applications_contractors_idcontractors  = $idContractor ;
	    
	    $appOHSWHS->save() ; 




	}
}