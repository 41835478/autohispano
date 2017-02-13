@extends('layout.master')

@section('title','Dealers')

@section('cuerpo')
<div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="cs-agent-filters"> <span class="cs-filters-title">Buscar dealer</span>
        <div class="row">
          <form>
            {{ csrf_field() }}
            <div class="cs-agent-filtration">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-select-location">
                  <label>Seleccionar ubicación</label>
                  <input type="text" placeholder="Ingrese ubicación">
                  
            </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-search-btn">
                  <input type="submit" value="Buscar">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="row">
            

            @foreach($dealers as $dealer)
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="cs-agent-listing">
                <div class="cs-media">
                  <figure> <a href="#"><img alt="#" src="<?php if($dealer->foto==""){ echo url('/images/usuarios/sinfoto.png');}else{ echo url('/images/usuarios/'.$dealer->foto);} ?>"></a> </figure>
                </div>
                <div class="cs-text">
                  <div class="cs-post-title">
                    <h6><a href="#">{{ $dealer->nombre }}</a></h6>
                    
                  <address>
                  {{ $dealer->ubicacion}}
                  </address>
              </div>
            </div>
            @endforeach

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
