<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Client;
use App\Admin;
use Auth;
use Yajra\Datatables\Datatables;
use Validator;
use PDF;
class ClientController extends Controller
{

    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::join('admins','admins.id','=','clients.admins_id')->select(['clients.id','clients.username','clients.companyName','clients.created_at','admins.name']);
        return Datatables::of($clients)->addColumn('action',function($client){
            return '<a href="/admin/clients/update/'.$client->id.'" data-toggle="modal"  data-target="#edit-client-'.$client->id.'" class="btn btn-xs btn-success"> <i class="fa fa-pencil"></i> Edit</a><div class="modal fade" id="edit-client-'.$client->id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                </div> 
            </div> 
        </div>  ' ;
    })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.modal-new');
    }

    public function storeValidator(array $data) {
        return Validator::make($data,[
            'username' => 'required|username|max:255|unique:clients,username',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required'
            ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client;
        if($request->input('password')) {
            $validator = Validator::make($request->all(), [

               'password' => 'min:6'
               ]);
            if ($validator->fails()) {
               return response()->json(['numCharacter' => "numCharacter"]);
           }
           else if($request->input('password') != $request->input('passwordConfirmation') ) {
               return response()->json(['confirmPassword' => "confirmPassword"]);
           }
           $client->password = bcrypt($request->input('password'));
        }
        $countClientSameUsername = Client::where('username',$request->input('username'))->count();
        if($countClientSameUsername == 1) {
            return response()->json(['sameUsername' => "sameUsername"]);
        }
        $client->companyName = $request->input('companyName');
        $client->username = $request->input('username');
        $client->admins_id = Auth::guard('admin')->user()->id;
        $client->save();
        return response()->json(['success' => "success"]);

   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        return view('admin/clients/modal-edit')->with('client',$client);    
    }

    public function search(Request $request) {
        $clients = Client::where('companyName','like','%'.$request->get('query').'%')->get();
        
        $output = '<ul class="list-unstyled list">';
        foreach ($clients as $client)
        {

            $output .= '<li id="clientCompany">'.$client->companyName.'</li>';
        }
        $output.'</ul>' ;
        return $output;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        
        if($request->input('password')) {
            $validator = Validator::make($request->all(), [

                'password' => 'min:6'
                ]);
            if ($validator->fails()) {
                return response()->json(['numCharacter' => "numCharacter"]);
            }
            else if($request->input('password') != $request->input('passwordConfirmation') ) {
                return response()->json(['confirmPassword' => "confirmPassword"]);
            }
            $client->password = bcrypt($request->input('password'));
        }
        $countClientSameUsername = Client::where('username',$request->input('username'))->count();
         $clientSameUsername = Client::where('username',$request->input('username'))->first();
        if($countClientSameUsername == 1) {
            if($clientSameUsername->username != $client->username) {
                 return response()->json(['sameUsername' => "sameUsername"]);
            }
           
        }
        $client->companyName = $request->input('companyName');
        $client->username = $request->input('username');
        
        $client->save();
        return response()->json(['success' => "success"]);
        
        //return redirect()->back();
    }

    public function generatePdf($id) {
     
        return PDF::loadFile(url('client/report/pdf/url/'.$id))->setOption('page-height','139.7')->stream() ;
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
