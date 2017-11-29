<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;
use App\AppAbnWorker ; 

class AppAbnWorkerService {

	public function show($id) {
	    return AppAbnWorker::where('applications_idapplication',$id)->get() ; 
	}

	public function update($request , $id) {
		$appAbnWorker = AppAbnWorker::where('applications_idapplication',$id)->first(); ;
		$appAbnWorker->independentContractorsEngagement = $request->input('independentContractorsEngagement') ;
		if ($request->hasFile('superAnnuationCopy')) {

	        if ($request->file('superAnnuationCopy')->isValid()) {
	            $FileService = new FileService ;
		        $FileService->uploadFile($request->file('superAnnuationCopy'),Auth::guard('user')->user()->id,'superAnnuationCopy',$id) ;
	            $appAbnWorker->superAnnuationCopy = 'superAnnuationCopy'.$id ;
	        }
	    }
		
		$appAbnWorker->superAnnuationPayement = $request->input('superAnnuationPayement') ;
		$appAbnWorker->save() ;
	}

	public function store($request,$idApplication,$idContractor) {
	    $appAbnWorker =new AppAbnWorker ;
	    $appAbnWorker->independentContractorsEngagement = $request->input('independentContractorsEngagement') ;
	    if ($request->hasFile('superAnnuationCopy')) {

	        if ($request->file('superAnnuationCopy')->isValid()) {
	            $FileService = new FileService ;
		        $FileService->uploadFile($request->file('superAnnuationCopy'),$idContractor,'superAnnuationCopy',$idApplication) ;
	            $appAbnWorker->superAnnuationCopy = 'superAnnuationCopy'.$idApplication ;
	        }
	    }
	    $appAbnWorker->applications_idapplication = $idApplication ;
	    $appAbnWorker->applications_contractors_idcontractors  = $idContractor ;
	    $appAbnWorker->superAnnuationPayement = $request->input('superAnnuationPayement') ;
	    $appAbnWorker->save() ;
	}
}