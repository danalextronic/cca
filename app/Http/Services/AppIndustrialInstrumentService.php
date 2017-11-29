<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppIndustrialInstrument ;

class AppIndustrialInstrumentService {

	public function show($id) {
	    return AppIndustrialInstrument::where('applications_idapplication',$id)->get() ;
	}

	public function update($request,$id) {
		$appIndustrialInstrument =  AppIndustrialInstrument::where('applications_idapplication',$id)->first() ;
		$appIndustrialInstrument->industrialInstrumentNameAgreement = $request->input('industrialInstrumentNameAgreement') ;
		if ($request->hasFile('industrialInstrumentCopy')) {
		    if ($request->file('industrialInstrumentCopy')->isValid()) {
		        $FileService = new FileService ;
		        $FileService->uploadFile($request->file('industrialInstrumentCopy'),Auth::guard('user')->user()->id,'industrialInstrumentCopy',$id) ;
		        $appIndustrialInstrument->copy = 'industrialInstrumentCopy'.$id ;
		    }
		}
		
		$appIndustrialInstrument->save() ;
	}
	public function store($request,$idApplication,$idContractor) {
	    $appIndustrialInstrument = new AppIndustrialInstrument ;
	    $appIndustrialInstrument->industrialInstrumentNameAgreement = $request->input('industrialInstrumentNameAgreement') ;
	    if ($request->hasFile('industrialInstrumentCopy')) {
	        if ($request->file('industrialInstrumentCopy')->isValid()) {
	            $FileService = new FileService ;
		        $FileService->uploadFile($request->file('industrialInstrumentCopy'),$idContractor,'industrialInstrumentCopy',$idApplication) ;
	            $appIndustrialInstrument->copy = 'industrialInstrumentCopy'.$idApplication ;
	        }
	    }
	        
	    $appIndustrialInstrument->applications_idapplication = $idApplication ;
	    $appIndustrialInstrument->applications_contractors_idcontractors  = $idContractor ;
	    $appIndustrialInstrument->save() ;
	}
}