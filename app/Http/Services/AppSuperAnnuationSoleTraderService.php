<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;

use App\AppSuperAnnuationSoleTrader ; 

class AppSuperAnnuationSoleTraderService {

	public function show($id) {
	    return AppSuperAnnuationSoleTrader::where('applications_idapplication',$id)->get() ; 
	}

    public function update($request,$id) {
        $appSuperAnnuationSoleTrader = AppSuperAnnuationSoleTrader::where('applications_idapplication',$id)->first() ;
        $appSuperAnnuationSoleTrader->superAnnuationSoleTraderExist = $request->input('superAnnuationSoleTraderExist') ;
        if ($request->hasFile('superAnnuationSoleTraderCBUS')) {

            if ($request->file('superAnnuationSoleTraderCBUS')->isValid()) {
                $FileService = new FileService ;
                $FileService->uploadFile($request->file('superAnnuationSoleTraderCBUS'),Auth::guard('user')->user()->id,'superAnnuationSoleTraderCBUS',$id) ;
                $appSuperAnnuationSoleTrader->CBUS = 'superAnnuationSoleTraderCBUS'.$id ;
            }

        }
      
        $appSuperAnnuationSoleTrader->save() ;
    }

	public function store($request,$idApplication,$idContractor) {
        $appSuperAnnuationSoleTrader =new AppSuperAnnuationSoleTrader ;
        $appSuperAnnuationSoleTrader->superAnnuationSoleTraderExist = $request->input('superAnnuationSoleTraderExist') ;
        if ($request->hasFile('superAnnuationSoleTraderCBUS')) {

            if ($request->file('superAnnuationSoleTraderCBUS')->isValid()) {
                $FileService = new FileService ;
                $FileService->uploadFile($request->file('superAnnuationSoleTraderCBUS'),$idContractor,'superAnnuationSoleTraderCBUS',$idApplication) ;
                $appSuperAnnuationSoleTrader->CBUS = 'superAnnuationSoleTraderCBUS'.$idApplication ;
            }

        }
        $appSuperAnnuationSoleTrader->applications_idapplication = $idApplication ;
        $appSuperAnnuationSoleTrader->applications_contractors_idcontractors  = $idContractor ;
        $appSuperAnnuationSoleTrader->save() ;
    }

}