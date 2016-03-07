@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <!-- Blog Post Content Column -->
    @foreach($articles as $article)
    <div class="col-lg-8">

      <!-- Blog Post -->

      <!-- Title -->
      <h1>{!! $article->title !!}</h1>

      <!-- Author -->
      <p class="lead">
        Par <span style="color:#337ab7;"><strong>{!! $article->username !!}</strong></span>
      </p>

      <hr>

      <!-- Date/Time -->
      <p><span class="glyphicon glyphicon-time"></span> Posté le {!! $article->created_at !!}</p>

      <hr>

      <!-- Post Content -->
      <p class="lead"><p style="font-size:19px">{!! $article->text !!}</p>

      <hr>

      <!-- Blog Comments -->

      <!-- Comments Form -->
      <div class="well">
        <h4>Ecrire un commentaire:</h4>
        @foreach($articles as $article)
        <form role="form" method="POST" action="{{ url('comment/post/'.$article->id) }}">
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
          <div class="form-group">
            <textarea class="form-control" name="comment" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">
            Envoyer <i class="glyphicon glyphicon-chevron-right" style="margin-left:5px"></i>
          </button>
        </form>
        @endforeach
      </div>

      <hr>

      <!-- Posted Comments -->

      <!-- Comment -->
      @foreach($comments as $comment)
      <div class="media">
        <a class="pull-left" href="#">
          <img class="media-object" src="https://gravatar.com/avatar/" alt="">
        </a>
        <div class="media-body">
          <h4 class="media-heading">{!! $comment->username !!}
            <small>| posté le {!! $comment->created_at !!}</small>
          </h4>
          {!! $comment->commentaire !!}
        </div>
      </div>
      @endforeach

    </div>
    @endforeach
  </div>
</div>
@endsection
