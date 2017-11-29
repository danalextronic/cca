<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin ;
use App\User ;
use Hash ;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\Application ;
use App\Http\Services\ApplicationService ;
use App\Http\Services\UserService ;
use Illuminate\Support\Facades\Storage ;
use Illuminate\Http\Response ;
use App\AdminNonPushedFile ;
use DB ;
use View ;
use Validator ;
use Illuminate\Support\Facades\Mail ;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex(Request $request = null)
    {
        $AdminNonPushedFile = AdminNonPushedFile::all()->first() ;
        if (SESSION::get('skip') == 'on') {
            return view('datatables.index') ;
        }
        else if(Auth::guard('admin')->user()->id == 1 && $AdminNonPushedFile )
            return redirect('/admin/drive') ;
        
        return view('datatables.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function anyData()
    {
        
        $applications = Application::join('users','applications.contractors_idcontractors','=','users.id')->select(['applications.idapplication','applications.ref','applications.applicationNumber','applications.applicationType','applications.applicationStatus','applications.created_at','applications.updated_at','users.name','users.email']);
        
        return Datatables::of($applications)->addColumn('action',function($application){
            return '

                <a href="/admin/home/view/'.$application->idapplication.'" class="btn btn-xs btn-primary"><i class="fa fa-search-plus"></i> View</a> 
                <a href="/admin/report/new/'.$application->idapplication.'" class="btn btn-xs btn-success"><i class="fa fa-search-plus"></i> Report</a> 
                '

            ;})->make(true);
    }

    /**
     * Process post for request update application status 
     *
     * @return Redirection
     */
    public function updateFlag(Request $request , $id ) {
        
        $app = Application::find($id) ;
        Mail::send('emails.update-flag',["link" => url('/admin/home/view/'.$id)],function($message){
            $message->to('info@contractorcompliance.com.au','CCA Admin')->from('noreply@contractorcompliance.com.au')->subject('APPLICATION STATUS UPDATED') ;
        }); 
        $app->applicationStatus = $request->get('status') ;
        $app->save() ;
        
        return redirect('admin/home') ;
    }
    /**
     * Process get for list All Contractors
     *
     * @return View (with contractors list)
     */
    public function listContractors() {
        $UserService = new UserService ;
        $contractors = $UserService->getAllUsers() ;
        return View::make('admin.users.list')->with('contractors',$contractors) ;
    }

    public function skipGoogleDrive(Request $request) {
        SESSION::put('skip','on') ;
        return redirect('admin/home') ;
    }
     /**
     * Process get specific application by ID 
     *
     * @return Redirection
     */
    public function show($id) {
        $app = Application::find($id) ;
        $state = $app->applicationType ;
        $application = new ApplicationService ;
        $arrays = $application->showAppDetails($state,$id) ;
        $applications = Application::join('users','applications.contractors_idcontractors','=','users.id')->select(['applications.idapplication','applications.ref','applications.applicationType','applications.applicationStatus','applications.created_at','applications.updated_at','users.name','users.email'])->where('idapplication',$id)->get()->toArray();
        
        return View::make('app.'.$state,compact('applications','arrays')) ; 
    
    }

    /**
     * Show update password form
     *
     * @return View
     */
    public function showUpdatePasswordForm() {
        return view('admin.auth.passwords.update-password') ;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'oldPassword' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    

    /**
    * Put request to update password 
    *
    * @return Redirection
    */



    public function updatePassword(Request $request ) {
        
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        else {
            $admin = Auth::guard('admin')->user() ;
            if (Hash::check($request->oldPassword,$admin->password)) {
                $admin->fill([
                    'password' => Hash::make($request->password) 
                ])->save() ;    
            }
              
        }
        
        return redirect('admin/home') ;
    }
    
    /**
    * Put request to update contractor flag 
    *
    * @return Redirection
    */ 
    public function updateStatus(Request $request) {
        $contractor = User::find($request->input('idContractor')) ;
        $contractor->contractorStatus = $request->input('status') ;
        $contractor->save() ;
        return redirect('admin/home/contractors') ;
    }
   /*
    public function getFile($idContractor ,$idApplication , $filename ) {
        Storage::disk('local')->has('file.jpg');
        $file = Storage::disk('local')->get($idContractor.'/'.$filename.$idApplication.'.'.preg_match("`(.+)`s", "\n")) ;
        return new Response($file,200) ;
    }
    */ 

    
  
    public function redirect() {
        return redirect('/admin/home') ;
    }


}