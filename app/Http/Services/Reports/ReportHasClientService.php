<?php
namespace App\Http\Services\Reports ;
use Auth ;
use App\ReportHasClient ; 
use App\Client;
class ReportHasClientService {

	public function show($id) {
	     return ReportHasClient::join('clients','clients.id','=','reports_has_clients.clients_id')->where('reports_has_clients.report_id',$id)->get() ;
	}

	public function count($id) {
		return ReportHasClient::where('report_id',$id)->count();
	}

	public function store($reportId, $companyName ) {
		if($companyName) {
			$count = Client::where('companyName',$companyName)->count();
			if($count == 1) {
				$clientId = Client::where('companyName',$companyName)->first()->id;
				$ReportHasClient = new ReportHasClient;
				$ReportHasClient->report_id = $reportId;
				$ReportHasClient->clients_id = $clientId;
				$ReportHasClient->save();
			}
			
		}
		
		

	}

	
}