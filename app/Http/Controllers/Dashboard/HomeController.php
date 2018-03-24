<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\User;
use App\Phs;
use App\Ghs;
use App\MergeInsurance;
use App\MergeMain;
use App\NewsFeed;
use App\Testimony;


class HomeController extends Controller
{
    //


    public function index()
    {
    	$testimonies=Testimony::orderBy('id','desc')->limit('6')->get();

    	$insurance_merges=MergeInsurance::where('ph_user_id', Auth::user()->id)->orWhere('gh_user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(20);

    	$main_merges=MergeMain::where('ph_user_id', Auth::user()->id)->orWhere('gh_user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(20);

    	$NewsFeeds=NewsFeed::orderBy('id', 'desc')->paginate(10);

    	

    	$local_trans=MergeMain::where([['ph_user_id', Auth::user()->id],['has_confirmed_payment', 1]])->orWhere([['gh_user_id', Auth::user()->id],['has_confirmed_payment',1]])->orderBy('id', 'desc')->paginate(20);

    	$global_trans=MergeMain::where('has_confirmed_payment', 1)->orderBy('id', 'desc')->paginate(20);

    	return view('dashboard.index', ['testimonies'=>$testimonies, 'NewsFeeds'=>$NewsFeeds, 'insurance_merges'=>$insurance_merges, 'main_merges'=>$main_merges, 'global_trans'=>$global_trans, 'local_trans'=>$local_trans]);
    }
}
