<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppSafeWorkMethodStatement ; 

class AppSafeWorkMethodStatementService {

	public function show($id) {
	    return AppSafeWorkMethodStatement::where('applications_idapplication',$id)->get() ; 
	}

	public function update($request,$id) {
		$appSafeWorkMethodStatement =  AppSafeWorkMethodStatement::where('applications_idapplication',$id)->first() ;
		$appSafeWorkMethodStatement->safeWorkMethodStatementExist = $request->input('safeWorkMethodStatementExist') ;
		$appSafeWorkMethodStatement->anotherContractorsSystem = $request->input('safeAnotherContractorsSystem') ;
		$appSafeWorkMethodStatement->nameContractor = $request->input('safeNameContractor') ;
		$numInitial = $appSafeWorkMethodStatement->numberFiles;
		for($i=0;$i<$numInitial;$i++){
			if ($request->hasFile('SWMSCopy_'.$i)) {

		        if ($request->file('SWMSCopy_'.$i)->isValid()) {
		           
		            $FileService = new FileService ;
			        $FileService->uploadFile($request->file('SWMSCopy_'.$i),Auth::guard('user')->user()->id,'SWMSCopy_'.$i,$id) ;
		           
		        }
	    	}
		}


		$numFilesSWMS = $request->input('numFilesSWMS');
		$j=$numInitial-1 ;
		for($i=$numInitial-1;$i<$numFilesSWMS;$i++) {
			if ($request->hasFile('SWMSCopy_'.$i)) {

		        if ($request->file('SWMSCopy_'.$i)->isValid()) {
		           
		            $FileService = new FileService ;
			        $FileService->uploadFile($request->file('SWMSCopy_'.$i),Auth::guard('user')->user()->id,'SWMSCopy_'.$j,$id) ;
		            $j++;
		        }
	    	}
		}
		$appSafeWorkMethodStatement->numberFiles = $j;  
		

		$appSafeWorkMethodStatement->save() ;
	}

	public function store($request,$idApplication,$idContractor){
	    $appSafeWorkMethodStatement = new AppSafeWorkMethodStatement ;
	    $appSafeWorkMethodStatement->safeWorkMethodStatementExist = $request->input('safeWorkMethodStatementExist') ;
	    $appSafeWorkMethodStatement->anotherContractorsSystem = $request->input('safeAnotherContractorsSystem') ;
	    $appSafeWorkMethodStatement->nameContractor = $request->input('safeNameContractor') ;
	    $numFiles = $request->input('numFilesSWMS');
	    $j=0;
	    for($i=0;$i<$numFiles;$i++){
	    	
	    	if ($request->hasFile('SWMSCopy_'.$i)) {

		        if ($request->file('SWMSCopy_'.$i)->isValid()) {
		           
		            $FileService = new FileService ;
			        $FileService->uploadFile($request->file('SWMSCopy_'.$i),$idContractor,'SWMSCopy_'.$j,$idApplication) ;
		            $j++;
		        }
	    	}

	    }
	    $appSafeWorkMethodStatement->numberFiles = $j;
	       
	    
	    $appSafeWorkMethodStatement->applications_idapplication = $idApplication ;
	    $appSafeWorkMethodStatement->applications_contractors_idcontractors  = $idContractor ;
	    $appSafeWorkMethodStatement->save() ;

	}

}