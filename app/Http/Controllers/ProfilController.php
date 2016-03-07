<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use DB;
use Session;
use Redirect;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
      $users = DB::table('users')->get();
      /*dd($users);*/
      return view('profil/profil')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = DB::table('users')->where('id', $id)->get();
      return view('profil/edit')->with('users', $user[0]);
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
      if(Auth::check()) {
        $input = $request->all();
        $find = User::find($id);

        /*dd($id);
*/
        if($input['name'] != null) {
          $find->name = $input['name'];
          $find->save();
        }

        if($input['email'] != null) {
          $find->email = $input['email'];
          $find->save();
        }

        if($input['password'] != null) {
          $find->password = Hash::make($input['password']);
          $find->save();
        }

        return redirect('/profil/{id}');
      }

      return redirect('/login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();

      Session::flash('success', 'Le compte a été supprimé.');
      return Redirect::back();
    }
  }
