@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">

    <!-- Blog Entries Column -->

    <div class="col-md-8">

      <h1 class="page-header" style="border-bottom: 1px solid #000;">
        Articles
        <small>Liste des articles</small>
      </h1>

      @foreach($articles as $article)
      <h2>
        {!! $article->title !!}
      </h2>
      <p class="lead">
        Par <span style="color:#337ab7;"><strong>{!! $article->username !!}</strong></span>
      </p>
      <p><span class="glyphicon glyphicon-time"></span> Posté le {!! $article->created_at !!}</p>
     <!--  <hr>
      <img class="img-responsive" src="http://placehold.it/900x300" alt="">
      <hr> -->
      <p style="font-size:19px">{!! $article->text !!}</p>

      @if(Auth::check())
      <form class="form-horizontal" role="form" method="GET" action="{{ url('article/post/'.$article->id) }}">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <button type="submit" class="btn btn-primary">
          Plus <i class="glyphicon glyphicon-chevron-right" style="margin-left:5px"></i>
        </button>
      </form>
      @endif
      @endforeach

      <hr style="border-bottom: 1px solid #000;">

      <!-- Pager -->
      <ul class="pager">
        <li>
          {{ $articles->links() }}
        </li>
      </ul>

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

      <!-- Blog Search Well -->
      <div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">
          <input type="text" class="form-control">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>
        </div>
        <!-- /.input-group -->
      </div>

      <!-- Blog Categories Well -->
      <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
          <div class="col-lg-6">
            <ul class="list-unstyled">
              <li><a href="#">Category Name</a>
              </li>
              <li><a href="#">Category Name</a>
              </li>
              <li><a href="#">Category Name</a>
              </li>
              <li><a href="#">Category Name</a>
              </li>
            </ul>
          </div>
          <!-- /.col-lg-6 -->
          <div class="col-lg-6">
            <ul class="list-unstyled">
              <li><a href="#">Category Name</a>
              </li>
              <li><a href="#">Category Name</a>
              </li>
              <li><a href="#">Category Name</a>
              </li>
              <li><a href="#">Category Name</a>
              </li>
            </ul>
          </div>
          <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
      </div>

      <!-- Side Widget Well -->
      <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
      </div>

    </div>

  </div>
  <!-- /.row -->

  <hr>

  <!-- Footer -->
  <footer style="margin: 50px 0;">
    <div class="row">
      <div class="col-lg-12">
        <p>Copyright &copy; Your Website 2014</p>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
  </footer>
</div>
@endsection
