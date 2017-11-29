<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User ;
use Yajra\Datatables\Datatables;
use Validator ;
use Hash ;
use Auth ;
use Laracasts\Flash\Flash ;
use Illuminate\Support\Facades\Lang;

class ContractorController extends Controller
{
    

	public function __construct(){
    	$this->middleware('auth');
    }
   
    public function anyData()
    {
       
        return Datatables::of(User::query())->addColumn('action',function($user){
            return '

                <a href="/admin/home/view/'.$user->id.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a> 
                '
            ;})->make(true);
    }
    /**
     * Process get to list All Contractors
     *
     * @return View (with contractors list)
     */
  
    public function getIndex() {
        
        return view('admin.users.list'); 
    }

    /**
     * Show update password form
     *
     * @return View
     */
    public function showUpdatePasswordForm() {
        return view('auth.passwords.update-password') ;
    }


    /**
     *  Update password validator
     *
     * 
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'oldPassword' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function OldPassword() {
        return property_exists($this, 'oldPassword') ? $this->oldPassword : 'oldPassword';
    }

    public function getFailedPasswordMessage() {
        return Lang::has('oldPassword.failed')
                ? Lang::get('oldPassword.failed')
                : 'Old Password do not match our records';
    }
    public function updatePassword(Request $request ) {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        else {
            $user = Auth::guard('user')->user() ;
            if (Hash::check($request->oldPassword,$user->password)) {
                $user->fill([
                    'password' => Hash::make($request->input('password')) 
                ])->save() ;  
               flash('Password Have Been Updated','success') ;
                return redirect('home') ;

            }

            else {
                return redirect('account')->withErrors([
                    $this->oldPassword() => $this->getFailedPasswordMessage(),
                ]) ;
            }
        }
        
       
            
        
    }

}
