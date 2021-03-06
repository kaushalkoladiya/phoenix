@extends('layouts.artist')

@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col display-3 font-weight-bold">
        Songs
      </div>
    </div>

    <div class="row">
      <div class="col">
        @if (count($songs) !== 0)
          @includeIf('includes.songs-header')
          @php($cnt = 0)
          @foreach ($songs as $song)
            @php($cnt++)
            @include('includes.song-thumbnail', ['song' => $song, 'cnt' => $cnt])
          @endforeach
        @endif
      </div>
    </div>
  </div>
  </div>
@endsection