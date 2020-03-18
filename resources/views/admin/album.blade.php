@extends('layouts.admin')


@section('head-section')
  <style>
    .kt-blog-grid-v2{background-size:cover;background-position:center;background-repeat:no-repeat;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;min-height:33rem;padding:3.5rem;position:relative}.kt-blog-grid-v2:before{content:' ';position:absolute;top:0;left:0;width:100%;height:100%;background-color:#000;opacity:.3;z-index:0}.kt-blog-grid-v2 .kt-blog-grid-v2__tag{background-color:rgba(255,255,255,.3);color:#fff;font-weight:600;padding:.5rem .7rem;margin:0 auto auto 0;border-radius:5px;-ms-flex-item-align:start;align-self:flex-start;position:relative;z-index:1}.kt-blog-grid-v2 .kt-blog-grid-v2__body{position:relative;z-index:1}.kt-blog-grid-v2 .kt-blog-grid-v2__body .kt-blog-grid-v2__date{color:#fff;margin-bottom:1.5rem;font-weight:400}.kt-blog-grid-v2 .kt-blog-grid-v2__body .kt-blog-grid-v2__link{color:#fff}.kt-blog-grid-v2 .kt-blog-grid-v2__body .kt-blog-grid-v2__link .kt-blog-grid-v2__title{font-weight:700;margin:0}.kt-blog-grid-v2 .kt-blog-grid-v2__body .kt-blog-grid-v2__link:focus .kt-blog-grid-v2__title,.kt-blog-grid-v2 .kt-blog-grid-v2__body .kt-blog-grid-v2__link:hover .kt-blog-grid-v2__title{text-decoration:underline}
    .kt-blog-grid-v2__tag{background-color:rgba(255,255,255,.3);color:#fff;font-weight:600;padding:.5rem .7rem;margin:0 auto auto 0;border-radius:5px;-ms-flex-item-align:start;align-self:flex-start;position:relative;z-index:1}
  </style>
@endsection

@section('searchBar')
  @include('admin.includes.searchBox', ['collection' => $albums, 'collectionType' => 'album'])
@endsection

@section('content')

<section>
  <div class="container mt-5">
    <div class="row" style="display:none" id="searchTitle">
      <div class="col h4 font-weight-bold">Searching...</div>
    </div>
    <div class="row m-5" id="searchData"></div>
    <div class="row">
      @foreach ($albums as $album)          
      @include('admin.includes.album-playlist', ['collection' => $album, 'collectionType' => 'album'])
      @endforeach
    </div>
  </div>

</section>
@endsection
