<?php

namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ; 
use App\AdminNonPushedFile ;
use App\Admin ;
use DB ;	
use Illuminate\Support\Facades\Storage ;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response ;
use URL;


class FileService {

	public function checkFileExistSameInfos($filename,$idApplication) {

		$files = AdminNonPushedFile::where(DB::raw('DATE(created_at)'), '=', date('Y-m-d'))
		->where('applications_idapplication','=',$idApplication)->get() ;	
		$array = explode(".",$filename) ;
		$filenameWithoutExtension = $array[0] ;
		foreach ($files as $file) {
			$array1 = explode(".",$file['filename']) ;
			$nameFileWithoutExtension = $array1[0] ;
			if ($nameFileWithoutExtension == $filenameWithoutExtension) {
				return $file['id'];
			}
		}
	}
	public function uploadFile($file,$idContractor,$filename ,$idApplication) {
		if(File::exists(storage_path().'/app'.'/'.$idContractor.'/'.$idApplication.'/'.date('y-m-d'))) {
		    // path does not exist
			$files = File::allFiles(storage_path().'/app'.'/'.$idContractor.'/'.$idApplication.'/'.date('y-m-d'));
			foreach ($files as $fileLoop) {
				if (strpos($fileLoop->getFilename() , $filename ) !== false) {
				   
				    File::delete(storage_path().'/app'.'/'.$idContractor.'/'.$idApplication.'/'.date('y-m-d').'/'.$fileLoop->getFilename()) ;
				   
				}
			}
			
		}
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($idContractor.'/'.$idApplication.'/'.date('y-m-d').'/'.$filename.'.'.$extension,  File::get($file));
		 
		$idFileExist = $this->checkFileExistSameInfos($filename,$idApplication) ;
		if ($idFileExist) {
			$fileDelete = AdminNonPushedFile::find($idFileExist) ;
			$fileDelete->delete() ;
		}

		$adminNonPushedFiles = new AdminNonPushedFile ;
		$adminNonPushedFiles->filename = $filename.'.'.$extension ;
		$adminNonPushedFiles->companyName = Auth::guard('user')->user()->contractorCompany ;
		$adminNonPushedFiles->applications_idapplication = $idApplication ;
		$adminNonPushedFiles->applications_contractors_idcontractors = $idContractor ;
		$adminNonPushedFiles->save() ;
		
		
		
	}



	public function getFile($idContractor,$idApplication,$date,$filename) {
		$files = File::allFiles(storage_path().'/app'.'/'.$idContractor.'/'.$idApplication.'/'.$date) ;
		foreach ($files as $file) {
			if (strpos($file->getFilename() , $filename ) !== false) {
			    $fileFind = File::get(storage_path().'/app'.'/'.$idContractor.'/'.$idApplication.'/'.$date.'/'.$file->getFilename()) ;
			  
			    return (new Response($fileFind,200))->header('Content-Type', mime_content_type ( storage_path().'/app'.'/'.$idContractor.'/'.$idApplication.'/'.$date.'/'.$file->getFilename())) ;
			}
		
		}
	
		
	}


}