@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #101010;color: #777"><h1 style="margin:5px 0 5px 0;font-size:20px"><strong>Modifier le profil</strong></h1></div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/profil/update/'.$users->id) }}">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="form-group">
              <label class="col-md-4 control-label">Nom</label>

              <div class="col-md-6">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{ $users->name }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">E-mail</label>

              <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ $users->email }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Mot de passe</label>

              <div class="col-md-6">
                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-btn fa-floppy-o"></i>Enregistrer
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection