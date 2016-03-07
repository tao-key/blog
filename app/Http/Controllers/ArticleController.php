<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Mail;
use App\User;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      if(Auth::check()) {
        $articles = DB::table('articles')->get();
        $user_id = Auth::user()->id;
        $username = Auth::user()->name;
        $input = (object) $request->all();
        $article = new Article();

        if($input != null) {
          $article->title = $input->title;
          $article->text = $input->text;
          $article->user_id = $user_id;
          $article->username = $username;
          $article->save();

          Mail::send('email.news', [], function($message) {
            $users = DB::table('users')->where('role', 3)->orWhere('role', 2)->get();
            foreach ($users as $user) {
              $message->to($user->email)->subject('AffiliaBlog');
            }
          });
        }

        return redirect('home');
      }

      return view('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showArticle($id)
    {
      $article = DB::table('articles')->where('id', $id)->get();
      $commentaire = DB::table('comments')->where('article_id', $id)->get();
      /*dd($article);*/
      return view('comment')->with('articles', $article)->with('comments', $commentaire);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
