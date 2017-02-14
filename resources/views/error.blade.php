@extends('layout.master')

@section('title','Error')

@section('cuerpo')

<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="cs-page-not-found">
        <div class="cs-text">
          <p>{{ $error }}</p>
          <span class="cs-error">404<em>Error</em></span> </div>
        <form>
          {{ csrf_field() }}
          <div class="input-holder"> <i class="icon-search2"> </i>
            <input type="text" placeholder="Search by Keyword">
            <label>
              <input type="submit" value="search">
              <i class="icon-search2"> </i> </label>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <div class="cs-seprater-v1"> <span class="cs-bgcolor"><i class="icon-home2"> </i></span> </div>
    </div>
  </div>
</div>

@endsection
