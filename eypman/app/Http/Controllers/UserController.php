<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Auth;
use GitHub;
use Session;
use App\User;
use App\Repo;
use App\Organization;
use Github\ResultPager;
use App\LinkedSocialAccount;
use Carbon\Carbon;
use App\Jobs\RepoReleasesUpdater;
use App\Jobs\AnalyzeGitRepo;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function getUserInfo($user_slug)
  {
    if(User::where('slug', $user_slug)->count() == 1)
    {
      return view('home')
              ->with('user',      User::where('slug', $user_slug)->first())
              ->with('platforms', User::where('slug', $user_slug)->first()->platforms);
    }
    elseif(Organization::where('slug', $user_slug)->count() == 1)
    {
      return view('home')
              ->with('user',      Organization::where('slug', $user_slug)->first())
              ->with('platforms', array());
    }
    else
    {
      abort(404);
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit()
  {
    return view('users.edit')->with('user', Auth::user());
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {

    $user = Auth::user();

    $user->save();

    //flash data
    Session::flash('status', 'Profile updated!');
    Session::flash('status-class', 'alert-success');

    //redirect
    return view('users.edit')->with('user', Auth::user());
  }
}
