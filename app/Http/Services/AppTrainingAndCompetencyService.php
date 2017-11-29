<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppTrainingAndCompetency ; 

class AppTrainingAndCompetencyService {

	public function show($id) {
	    return AppTrainingAndCompetency::where('applications_idapplication',$id)->get() ; 
	}

	public function update($request,$id) {
		$appTrainingAndCompetency =  AppTrainingAndCompetency::where('applications_idapplication',$id)->first() ;

		if ($request->hasFile('trainingAndCompetencyCopy')) {
		    if ($request->file('trainingAndCompetencyCopy')->isValid()) {
		        $FileService = new FileService ;
                $FileService->uploadFile($request->file('trainingAndCompetencyCopy'),Auth::guard('user')->user()->id,'trainingAndCompetencyCopy',$id) ;
		        $appTrainingAndCompetency->trainingAndCompetencyCopy = 'appTrainingAndCompetency-'.$id ;
		    }
		}
		
		$appTrainingAndCompetency->save() ; 
	}
	public function store($request,$idApplication,$idContractor){
	    $appTrainingAndCompetency = new AppTrainingAndCompetency ;

	    if ($request->hasFile('trainingAndCompetencyCopy')) {
	        if ($request->file('trainingAndCompetencyCopy')->isValid()) {
	            $FileService = new FileService ;
                $FileService->uploadFile($request->file('trainingAndCompetencyCopy'),$idContractor,'trainingAndCompetencyCopy',$idApplication) ;
	            $appTrainingAndCompetency->trainingAndCompetencyCopy = 'appTrainingAndCompetency-'.$idApplication ;
	        }
	    }
	    $appTrainingAndCompetency->applications_idapplication = $idApplication ;
	    $appTrainingAndCompetency->applications_contractors_idcontractors  = $idContractor ;
	    $appTrainingAndCompetency->save() ; 
	}
}