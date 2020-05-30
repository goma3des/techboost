<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profile;
use App\Prof_history;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //
    public function add()
    {
      return view('admin.profile.create');
    }



    public function create(Request $request)
    {
      $this->validate($request, Profile::$rules);
      $profile = new Profile;
      $form = $request->all();
      unset($form['_token']);

      $profile->fill($form)->save();

      return redirect('admin/profile');
    }



    public function edit(Request $request)
    {
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
    }



    public function update(Request $request)
    {
      $this->validate($request, Profile::$rules);
      $profile = Profile::find($request->id);
      $profile_form = $request->all();
      unset($profile_form['_token']);
      $profile->fill($profile_form)->save();

      $prof_history = new Prof_history;
      $prof_history->profile_id = $profile->id;
      $prof_history->edited_at = Carbon::now();
      $prof_history->save();

      return redirect('admin/profile');
    }


    public function index()
    {
      $users = Profile::all();

      return view('admin.profile.index', ['users' => $users]);

    }

    public function delete(Request $request)
    {
      $profile = Profile::find($request->id);
      $profile->delete();
      return redirect('admin/profile');

    }


}
