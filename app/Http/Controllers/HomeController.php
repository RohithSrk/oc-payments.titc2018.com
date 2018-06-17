<?php

namespace App\Http\Controllers;

use App\Member;
use App\Exports\MemberExport;
use Illuminate\Support\Facades\Artisan;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$members = Member::paginate(10);
        return view('home', compact('members'));
    }

    public function details(Member $member)
    {
        return view('details', compact('member'));
    }

    public function downloadExcel()
    {
	    return Excel::download(new MemberExport(Member::all()), 'payment_receipts.xlsx');
    }

    public function appDeploy(){
	    Artisan::call('config:cache');
	    Artisan::call('migrate');
	    Artisan::call('db:seed');
	    $msg = 'Application has been deployed.';
	    return view('layouts.msg', compact( 'msg') );
    }

    public function appRefresh(){
	    Artisan::call('cache:clear');
	    Artisan::call('config:cache');
	    $msg = 'Application has been refreshed.';
	    return view('layouts.msg', compact( 'msg') );
    }

    public function appReset(){
	    Artisan::call('config:cache');
	    Artisan::call('cache:clear');
	    Artisan::call('migrate:refresh');
	    Artisan::call('db:seed');
	    $msg = 'Application has been reset.';
	    return view('layouts.msg', compact( 'msg') );
    }
}
