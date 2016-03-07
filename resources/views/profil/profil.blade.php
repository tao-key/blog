@extends('layouts.app')

@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
  {{ Session::get('success') }}
</div>
@endif
<div class="container">
  <div class="row">
    @if(Auth::user()->role != 1)
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #101010;color: #777"><h1 style="margin:5px 0 5px 0;font-size:20px"><strong>Profil</strong></h1></div>
        <div class="panel-body">
          <ul class="list-unstyled">
            <li>
              <h4><strong>Nom :</strong></h4> 
              {{  Auth::user()->name }}
            </li>
            <li>
              <h4><strong>E-Mail :</strong></h4> 
              {{  Auth::user()->email }}
            </li>
            <li>
              <h4><strong>Inscrit le :</strong></h4> 
              {{  Auth::user()->created_at }}
            </li>
          </ul>
          @if(Auth::user()->role < 2)
          <button onclick="window.location='{{ url('/profil/edit/{id}') }}'" class="btn btn-primary">
            <i class="fa fa-btn fa-pencil"></i>Modifier le profil
          </button>
          @endif
        </div>
      </div>
    </div>
    @endif

    @if(Auth::user()->role <= 2)
    @if(Auth::user()->role != 1)
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #101010;color: #777"><h1 style="margin:5px 0 5px 0;font-size:20px"><strong>Poster un article</strong></h1></div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('article/post') }}">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="form-group">
              <label class="col-md-4 control-label">Titre</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Description</label>
              <div class="col-md-6">
                <textarea class="form-control" rows="5" name="text" value="{{ old('text') }}"></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-btn fa-paper-plane"></i>Poster l'article
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endif
    @endif

    @if(Auth::user()->role == 1)
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #101010;color: #777"><h1 style="margin:5px 0 5px 0;font-size:20px"><strong>Supprimer utilisateurs</strong></h1></div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Supprimer</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <th scope="row" style="line-height:4; vertical-align: middle;">{!! $user->id !!}</th>
                <td style="line-height:4; vertical-align: middle;">{!! $user->name !!}</td>
                <td style="line-height:4; vertical-align: middle;">{!! $user->email !!}</td>
                <td style="line-height:4; vertical-align: middle;">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('profil/delete/'.$user->id) }}">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <button type="submit" class="btn btn-danger">
                      <i class="fa fa-btn fa-trash" style="margin-left:5px"></i>
                    </button>
                  </form>
                  <!-- <button onclick="window.location='{{ url('/profil/edit/'.$user->id) }}'" class="btn btn-primary">
                    <i class="fa fa-btn fa-pencil"></i>
                  </button> -->
                  <form class="form-horizontal" role="form" method="GET" action="{{ url('profil/edit/'.$user->id) }}">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <button type="submit" class="btn btn-primary">
                      <i class="fa fa-btn fa-pencil" style="margin-left:5px"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @endif

  </div>
</div>
@endsection
