<?php
namespace App\Http\Services\Pdf ;
use PDF ;
use Illuminate\Support\Facades\Storage ;
use App\Http\Services\FileService ;
use App\AdminNonPushedFile ;
use App\Application;
use Illuminate\Support\Facades\File ;
use App\ReportApplication;
use App\User;
use Auth ;
class PdfService {

	public function uploadAppPdf($idApplication,$idContractor) {
		if (File::exists(storage_path("app/".$idContractor."/".$idApplication."/".date('y-m-d')."/application-submission.pdf") )) {
			File::delete(storage_path("app/".$idContractor."/".$idApplication."/".date('y-m-d')."/application-submission.pdf")) ;
		}
		$nonPushedFile = new FileService ;
		$idFileExist = $nonPushedFile->checkFileExistSameInfos('application-submission.pdf',$idApplication) ;
		if ($idFileExist) {
			$fileDelete = AdminNonPushedFile::find($idFileExist) ;
			$fileDelete->delete() ;
		}
		PDF::loadFile(url('/uEdXg6lB66E6pTmKsr4DKFBYYROVEWJaEZtaQoRl/pdf/'.$idApplication))->save(storage_path("app/".$idContractor."/".$idApplication."/".date('y-m-d')."/application-submission.pdf")) ;
		$adminNonPushedFiles = new AdminNonPushedFile ;
		$adminNonPushedFiles->filename = "application-submission.pdf" ;
		$adminNonPushedFiles->companyName = Auth::guard('user')->user()->contractorCompany ;
		$adminNonPushedFiles->applications_idapplication = $idApplication ;
		$adminNonPushedFiles->applications_contractors_idcontractors = $idContractor ;
		$adminNonPushedFiles->save() ;
	}

	public function uploadReportPdf($idApplication) {
		$idContractor = Application::find($idApplication)->contractors_idcontractors;
		$contractor = User::find($idContractor);
		if (File::exists(storage_path("app/".$idContractor."/".$idApplication."/".date('y-m-d')."/application-report.pdf") )) {
			File::delete(storage_path("app/".$idContractor."/".$idApplication."/".date('y-m-d')."/application-report.pdf")) ;
		}
		$nonPushedFile = new FileService ;
		$idFileExist = $nonPushedFile->checkFileExistSameInfos('application-report.pdf',$idApplication) ;
		if ($idFileExist) {
			$fileDelete = AdminNonPushedFile::find($idFileExist) ;
			$fileDelete->delete() ;
		}
		$idReport = ReportApplication::where('applications_idapplication',$idApplication)->first()->report_id;
		PDF::loadFile(url('/DKFBYYROVEWJaEZtaQoRluEdXg6lB66E6pTmKsr4/pdf/'.$idReport))->save(storage_path("app/".$idContractor."/".$idApplication."/".date('y-m-d')."/application-report.pdf")) ;
		$adminNonPushedFiles = new AdminNonPushedFile ;
		$adminNonPushedFiles->filename = "application-report.pdf" ;
		$adminNonPushedFiles->companyName = $contractor->contractorCompany;
		$adminNonPushedFiles->applications_idapplication = $idApplication ;
		$adminNonPushedFiles->applications_contractors_idcontractors = $idContractor ;
		$adminNonPushedFiles->save() ;
	}
	/*
	public function streamAppPdf() {
		
	} */
}