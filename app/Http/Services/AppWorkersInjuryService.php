<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppWorkersInjury ; 

class AppWorkersInjuryService {

	public function show($id) {
	    return AppWorkersInjury::where('applications_idapplication',$id)->get() ; 
	}

	public function update($request,$id) {
		$appWorkersInjury =  AppWorkersInjury::where('applications_idapplication',$id)->first() ;
		$appWorkersInjury->workersInjuryRehabilitation = $request->input('workersInjuryRehabilitation') ;
		$appWorkersInjury->anotherContractorsSystem =  $request->input('workersInjuryAnotherContractorSystem') ;
		$appWorkersInjury->contractorName = $request->input('workersInjusryNameContractor') ;
		if ($request->hasFile('workersInjuryCopy')) {
		    if ($request->file('workersInjuryCopy')->isValid()) {
		        $FileService = new FileService ;
                $FileService->uploadFile($request->file('workersInjuryCopy'),Auth::guard('user')->user()->id,'workersInjuryCopy',$id) ;
		        $appWorkersInjury->workersInjuryCopy = 'workersInjuryCopy'.$id ;
		    }
		}

		
		$appWorkersInjury->save() ; 
	}

	public function store($request,$idApplication,$idContractor) {
	    $appWorkersInjury = new AppWorkersInjury ;
	    $appWorkersInjury->workersInjuryRehabilitation = $request->input('workersInjuryRehabilitation') ;
	    $appWorkersInjury->anotherContractorsSystem =  $request->input('workersInjuryAnotherContractorSystem') ;
	    $appWorkersInjury->contractorName = $request->input('workersInjusryNameContractor') ;
	    if ($request->hasFile('workersInjuryCopy')) {
	        if ($request->file('workersInjuryCopy')->isValid()) {
	            $FileService = new FileService ;

                $FileService->uploadFile($request->file('workersInjuryCopy'),$idContractor,'workersInjuryCopy',$idApplication) ;

                $FileService->uploadFile($request->file('workersInjuryCopy'),$idContractor,'workersInjuryCopy',$idApplication) ;

	            $appWorkersInjury->workersInjuryCopy = 'workersInjuryCopy'.$idApplication ;
	        }
	    }

	    $appWorkersInjury->applications_idapplication = $idApplication ;
	    $appWorkersInjury->applications_contractors_idcontractors  = $idContractor ;
	    $appWorkersInjury->save() ; 
	}

}