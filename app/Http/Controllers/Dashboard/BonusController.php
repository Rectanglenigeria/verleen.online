<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\User;

use App\Ph;

use App\MergeInsurance;

use App\MergeMain;

use App\ReferalBonus;

use App\RegistrationBonus;

class BonusController extends Controller
{
    //
    public function viewRef()
    {
    	$bonuses=ReferalBonus::where('referal_id',Auth::user()->id)->orderBy('id', 'desc')->paginate('20');

    	return view('dashboard.bonus.ref.view',['bonuses'=>$bonuses]);


    }

    public function viewReg()
    {

    	$bonus=RegistrationBonus::where('user_id',Auth::user()->id)->first();

    	return view('dashboard.bonus.reg.view',['bonus'=>$bonus]);

    }
}
