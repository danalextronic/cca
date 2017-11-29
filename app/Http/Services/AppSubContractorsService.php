<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppSubContractors ; 

class AppSubContractorsService {

	public function show($id) {
	    return AppSubContractors::where('applications_idapplication',$id)->get() ; 
	}

	public function update($request,$id) {
		
		$numberRowsSub = $request->input('numberRowsSub') ;
		AppSubContractors::where('applications_idapplication',$id)->delete() ;
		for($i=0;$i<$numberRowsSub;$i++) {
			if ( $request->input('subcontractor_details_'.$i) != null )   {
				$appSubContractors = new AppSubContractors ;
				$appSubContractors->subContractorsExist = $request->input('subContractorsExist') ;
				$appSubContractors->subcontractorDetail = $request->input('subcontractor_details_'.$i) ;
				$appSubContractors->contactName = $request->input('contact_name_'.$i) ;
				$appSubContractors->type = $request->input('type_'.$i) ;
				$appSubContractors->ABN = $request->input('abn_'.$i) ;
				$appSubContractors->emailAdress = $request->input('email_adress_'.$i) ;
				$appSubContractors->phoneNumber = $request->input('phone_number_'.$i) ;
					
			} 
			else {
			    $appSubContractors = new AppSubContractors ;
				$appSubContractors->subContractorsExist = $request->input('subContractorsExist') ;
			}
			$appSubContractors->applications_idapplication = $id ;
				$appSubContractors->applications_contractors_idcontractors  = Auth::user()->id;
			$appSubContractors->save() ;
		}
	}

	public function store($request,$idApplication,$idContractor) {
	    $numberRowsSub = $request->numberRowsSub ;
	    for($i=0;$i<$numberRowsSub;$i++) {
	        $appSubContractors = new AppSubContractors ;
	        $appSubContractors->subContractorsExist = $request->input('subContractorsExist') ;
	        $appSubContractors->type = $request->get('type_'.$i) ;
	        $appSubContractors->subcontractorDetail = $request->input('subcontractor_details_'.$i) ;
	        $appSubContractors->contactName = $request->input('contact_name_'.$i) ;
	        $appSubContractors->ABN = $request->input('abn_'.$i) ;
	        $appSubContractors->emailAdress = $request->input('email_adress_'.$i) ;
	        $appSubContractors->phoneNumber = $request->input('phone_number_'.$i) ;
	        $appSubContractors->applications_idapplication = $idApplication ;
	        $appSubContractors->applications_contractors_idcontractors  = $idContractor ;
	        $appSubContractors->save() ;
	    }
	}
}