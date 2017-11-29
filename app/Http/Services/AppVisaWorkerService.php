<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppVisaWorker ;

class AppVisaWorkerService {

	public function show($id) {
        return  AppVisaWorker::where('applications_idapplication',$id)->get() ;
    }

    public function update($request,$id) {
        $appVisaWorker =  AppVisaWorker::where('applications_idapplication',$id)->first() ;
        if ($request->hasFile('visaWorkersCopy')) {
            if ($request->file('visaWorkersCopy')->isValid()) {
                $FileService = new FileService ;
                $FileService->uploadFile($request->file('visaWorkersCopy'),Auth::guard('user')->user()->id,'visaWorkersCopy',$id) ;
                $appVisaWorker->copy = 'visaWorkersCopy'.$id ;
            }
        }
        
       
        $appVisaWorker->save() ;
    }

	public function store($request,$idApplication,$idContractor) {
        $appVisaWorker = new AppVisaWorker ;
        if ($request->hasFile('visaWorkersCopy')) {
            if ($request->file('visaWorkersCopy')->isValid()) {
                $FileService = new FileService ;
                $FileService->uploadFile($request->file('visaWorkersCopy'),$idContractor,'visaWorkersCopy',$idApplication) ;
                $FileService->uploadFile($request->file('visaWorkersCopy'),$idContractor,'visaWorkersCopy',$idApplication) ;
                $appVisaWorker->copy = 'visaWorkersCopy'.$idApplication ;
            }
        }
        $appVisaWorker->applications_idapplication = $idApplication ;
        $appVisaWorker->applications_contractors_idcontractors  = $idContractor ;
        $appVisaWorker->save() ;
    }
}