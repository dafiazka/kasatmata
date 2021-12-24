@extends('layouts.main')

@section('content')
<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/person_profile.jpg') }}" class="d-block w-100" height="700" alt="gambar">
      <div class="carousel-caption d-none d-md-block">
        <h3>Kasatmata</h3>
        <p>Lihatlah Kehidupan dengan Kacamata</p>
      </div>
    </div>
    <div class="carousel-item">
        <img src="{{ asset('images/kasatmata/murray/murray_black_1.jpg') }}" class="d-block w-100" height="700" alt="gambar">
    </div>
    <div class="carousel-item">
        <img src="{{ asset('images/kasatmata/nagisa/nagisa_peach_1.jpg') }}" class="d-block w-100" height="700" alt="gambar">
    </div>
    <div class="carousel-item">
        <img src="{{ asset('images/kasatmata/tobhi/tobhi_2.jpg') }}" class="d-block w-100" height="700" alt="gambar">
    </div>
    <div class="carousel-item">
        <img src="{{ asset('images/kasatmata/wity/wity_brown.jpg') }}" class="d-block w-100" height="700" alt="gambar">
    </div>
  </div>
</div>
@endsection
