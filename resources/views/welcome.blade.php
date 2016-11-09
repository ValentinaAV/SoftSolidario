@extends('template/main')

@section('title')
  Inicio
@endsection

@section('content')

<link rel="stylesheet" href="{{ asset('bootstrap/css/inicio.css')}}">

<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
  <!-- Overlay -->
  <div class="overlay"></div>

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>
    <li data-target="#bs-carousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="slide-1"></div>
      <div class="hero">
        <hgroup>
            <h1>SofSolidario</h1>
            <h3>Somos un software que gestiona indicadores para la toma de decisiones.</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button">SofSolidario</button>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-2"></div>
      <div class="hero">
        <hgroup>
            <h1>Quindio Solidario</h1>
            <h3>Ser empresa líder en el sector Solidario  para integrarlo, impulsando acciones  y proyectos que permitan el desarrollo social  y económico de las organizaciones cooperativas.</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button">Quindio Solidario</button>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-3"></div>
      <div class="hero">
        <hgroup>
            <h1>We are amazing</h1>
            <h3>Get start your next awesome project</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button">See all features</button>
      </div>
    </div>
  </div>
</div>
@endsection
