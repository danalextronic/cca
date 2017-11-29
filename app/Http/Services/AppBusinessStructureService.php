<?php

namespace App\Http\Services ;
use App\AppBusinessStructure ;


class AppBusinessStructureService {
	public function update($request,$id) {
		$appBusinessStructure =  AppBusinessStructure::where('applications_idapplication',$id)->first() ;  ; // Question 2 

		if ($request->get('structureName') == 'other') // if == other then try to get the input
		{
		    $appBusinessStructure->more = $request->input('more') ;
		    $appBusinessStructure->structureName = 'other' ;
		}
		else { // else get the value of the radio button
		    $appBusinessStructure->structureName = $request->get('structureName') ;
		}
	

		$appBusinessStructure->save() ;
	}
	public function show($id) {
		return AppBusinessStructure::where('applications_idapplication',$id)->get() ;
	}
	public function store($request,$idApplication,$idContractor) {
	    $appBusinessStructure = new AppBusinessStructure ; // Question 2 



	    if ($request->get('structureName') == 'other') // if == other then try to get the input
	    {
	        $appBusinessStructure->more = $request->input('more') ;
	         $appBusinessStructure->structureName = 'other' ;
	    }
	    else { // else get the value of the radio button
	        $appBusinessStructure->structureName = $request->get('structureName') ;
	    }
	    $appBusinessStructure->applications_idapplication = $idApplication ;

	    $appBusinessStructure->applications_contractors_idcontractors = $idContractor ;  // assign id of authenticated user who fill up the new application to id_contractor (foreign key in appBusinessStructure table ).

	    $appBusinessStructure->save() ;
	}
	   
}