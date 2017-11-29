<?php
namespace App\Http\Services ;
use App\Http\Services\FileService ;
use Auth ;
use App\GoogleDriveFile ; 
use DB ;
class GoogleDriveFileService {
	 /**
     * Store File informations
     *
     * 
     */
	public function store($idFile,$filename ,$idRootFolder,$idFolderDate,$idFolderApplication,$idApplication,$idContractor) {
		$googleDriveFile = new GoogleDriveFile ;
		$googleDriveFile->idAdmin = Auth::guard('admin')->user()->id ;
		$googleDriveFile->idFile =$idFile ;
		$googleDriveFile->idRootFolder = $idRootFolder ;
		$googleDriveFile->idFolderApplication = $idFolderApplication ;
		$googleDriveFile->idFolderDate = $idFolderDate ;
		$googleDriveFile->nameFile = $filename ;
		$googleDriveFile->applications_idapplication = $idApplication;
		$googleDriveFile->applications_contractors_idcontractors  = $idContractor;
		$googleDriveFile->save() ;
	}
/*
	public function getFileId() {

	}
*/	
	 /**
     * Get root folder Id provided by google drive from database
     *
     * @return string
     */
	public function getRootFolderId($idAdmin) {
		$idFolderApplication = GoogleDriveFile::select('idRootFolder')
			->where('idAdmin','=',Auth::guard('admin')->user()->id)
			->first() ;
		return $idFolderApplication['idRootFolder'] ;
	}
	/*public function getFolderContractorId($idContractor) {
		
		$idFolderContractor =  GoogleDriveFile::select('idFolderContractor')->where('applications_contractors_idcontractors',$idContractor)->first() ;
		return $idFolderContractor['idFolderContractor']  ;
	}
*/ 
	 /**
     * Get application folder  Id provided by google drive from database
     *
     * @return string
     */
	public function getFolderApplicationId($idApplication) {
		$idFolderApplication = GoogleDriveFile::select('idFolderApplication')->where('applications_idapplication','=',$idApplication)
			->where('idAdmin','=',Auth::guard('admin')->user()->id)
			->first() ;
		return $idFolderApplication['idFolderApplication'] ;
	}
	/**
     * Get date folder  Id provided by google drive from database
     *
     * @return string
     */
	public function getFolderDateId($date) {
		$idFolderDate = GoogleDriveFile::select('idFolderDate')->where(DB::raw('DATE(created_at)'), '=', date('Y-m-d',strtotime($date)))
		->where('idAdmin','=',Auth::guard('admin')->user()->id)
		->first() ;
	    return $idFolderDate['idFolderDate'] ;
		
 	}


 	public function getFileByIdsAndDate($filename,$idApplication,$date) {
 	   	$files = GoogleDriveFile::where(DB::raw('DATE(created_at)'), '=', date('Y-m-d',strtotime($date)))
 	   	->where('applications_idapplication','=',$idApplication)->get() ;	
 	   	//var_dump($files) ;
 	   	$array = explode(".",$filename) ;
 	   	$filenameWithoutExtension = $array[0] ;
 	   	foreach ($files as $file) {	
 	   		$array1 = explode(".",$file['nameFile']) ;
 	   		$nameFileWithoutExtension = $array1[0] ;
			if ($nameFileWithoutExtension == $filenameWithoutExtension) {
				return $file['idFile'];
			}
 	   	}
 	       
 		
 	}
}