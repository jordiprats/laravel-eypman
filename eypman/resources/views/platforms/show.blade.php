@extends('layouts.app')
@section('content')
<div class="container">
  @if(Auth::user()==$user)
  <div class="card" style="float: right;">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal3" style="display: inline-block;">
      Delete platform
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button btn-secondary" class="close" data-dismiss="modal" aria-label="Close">
              X
            </button>
            <h5 class="modal-title" id="exampleModal3Label">Delete platform</h5>
          </div>
          <div class="modal-body">
            Once you delete a platform, there is no going back. Please be certain.
            <hr />
            {!! Form::open(['route' => ['platforms.destroy', $platform->id], 'method' => 'delete']) !!}
              {{ Form::submit('Yes, I\'m sure to delete this platform', array('class'=>'btn-danger btn-lg')) }}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>

    <div class="dropdown" style="display: inline-block;">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">Actions <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="{{ route('environments.create', [$user->slug, $platform->platform_name]) }}">Create environment</a></li>
      </ul>
    </div>
  </div>
  @endif
  <h1><ol class="breadcrumb">
    <li class="breadcrumb-item">@include('breadcrumbs.user')</li>
    <li class="breadcrumb-item active">{{ $platform->platform_name }}</li>
  </ol></h1>
  <button class="float-right btn-info btn-sm" onclick="toggleinstructions()">Configuration instructions</button>
  <div id="instructions" style="display: none">
    <h2>Instructions</h2>
    @include('instructions.configure_platform')
    <hr />
  </div>
  <script>
  function toggleinstructions() {
      var x = document.getElementById("instructions");
      if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
  }
  </script>
  {{-- @if(count($platform->environments)=='') --}}
  <h3>No environments defined</h3>
  {{-- @else --}}
    <h3>Environments</h3>
    <ul>
    {{-- @foreach ($platform->environments as $environment)
    <li><a href="{{ route('show.eyp.user.platform.env', ['user' => $user->slug, 'platform' => $platform->slug, 'environment' => $environment->slug]) }}">{{ $environment->environment_name }}</a></li>
    @endforeach --}}
  </ul>
  {{-- @endif --}}
  <h3>Server types</h3>
  <ul>
    <li>...</li>
  </ul>
  <h3>Nodes</h3>
  <ul>
    <li>...</li>
  </ul>
  <h3>Server groups</h3>
  <ul>
    <li>...</li>
  </ul>
</div>
@endsection
