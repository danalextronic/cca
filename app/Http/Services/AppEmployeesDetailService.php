<?php
namespace App\Http\Services ;

use App\AppEmployeesDetail ;
use Auth ;
class AppEmployeesDetailService {
	public function update($request,$id) {
	    $numberRows = $request->input('numberRows') ;
	    AppEmployeesDetail::where('applications_idapplication',$id)->delete() ;
	    for($i=0;$i<$numberRows;$i++) {
		   
		    if ($request->input('employee_name_'.$i) != null) {
		    		$appEmployeesDetails = new AppEmployeesDetail ;
		    		$appEmployeesDetails->employeeName = $request->input('employee_name_'.$i) ;
		    		$appEmployeesDetails->employeeNumber = $request->input('employee_number_'.$i);
		    		$appEmployeesDetails->employeeDateOfBirth = $request->input('date_birth_'.$i) ;
		    		$appEmployeesDetails->employeeCountryOfBirth = $request->input('country_birth_'.$i) ;
		    		$appEmployeesDetails->employeePassportImmiCardNumber = $request->input('passport_cardnumber_'.$i) ;
		    		$appEmployeesDetails->employeeOHSCard = $request->input('ohs_card_'.$i) ;
		    		$appEmployeesDetails->employeeAsbestos = $request->input('asbestos_awareness_cert_'.$i) ;
		    		$appEmployeesDetails->employeesDetailscol = $request->input('trade_labourer_classification_'.$i) ;
		    		if ($request->hasFile('certificate_'.$i)) {
		    			if ($request->file('certificate_'.$i)->isValid()) {
		    			    $FileService = new FileService ;
		    		        $FileService->uploadFile($request->file('certificate_'.$i),Auth::guard('user')->user()->id,'certificate_'.$i,$id) ;
		    			    $appEmployeesDetails->certificate = 'certificate-'.$id ;
		    			}
		    		}
		    		$appEmployeesDetails->applications_idapplication = $id ;
		    		$appEmployeesDetails->applications_contractors_idcontractors  = Auth::user()->id ;
		    		$appEmployeesDetails->save() ;
		    }   
	       
	    }
	}

	public function store($request,$idApplication,$idContractor) {

	    $numberRows = $request->numberRows ;
	    for($i=0;$i<$numberRows;$i++) {
		    if ($request->input('employee_name_'.$i) != null) {    
		        $appEmployeesDetails = new AppEmployeesDetail ;
		        $appEmployeesDetails->employeeName = $request->input('employee_name_'.$i) ;
		        $appEmployeesDetails->employeeNumber = $request->input('employee_number_'.$i);
		        $appEmployeesDetails->employeeDateOfBirth = $request->input('date_birth_'.$i) ;
		        $appEmployeesDetails->employeeCountryOfBirth = $request->input('country_birth_'.$i) ;
		        $appEmployeesDetails->employeePassportImmiCardNumber = $request->input('passport_cardnumber_'.$i) ;
		        $appEmployeesDetails->employeeOHSCard = $request->input('ohs_card_'.$i) ;
		        $appEmployeesDetails->employeeAsbestos = $request->input('asbestos_awareness_cert_'.$i) ;
		        $appEmployeesDetails->employeesDetailscol = $request->input('trade_labourer_classification_'.$i) ;
		        if ($request->hasFile('certificate_'.$i)) {
		        	if ($request->file('certificate_'.$i)->isValid()) {
		        	    $FileService = new FileService ;
		                $FileService->uploadFile($request->file('certificate_'.$i),$idContractor,'certificate_'.$i,$idApplication) ;
		        	    $appEmployeesDetails->certificate = 'certificate-'.$idApplication ;
		        	}
		        }
		        $appEmployeesDetails->applications_idapplication = $idApplication ;
		        $appEmployeesDetails->applications_contractors_idcontractors  = $idContractor ;
		        $appEmployeesDetails->save() ;
		    }
	    }
	}

	public function show($id) {
	    return AppEmployeesDetail::where('applications_idapplication',$id)->get() ; 
	}

	
}