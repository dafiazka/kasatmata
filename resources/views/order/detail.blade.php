@extends('layouts.main')

@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-1">
                @if (session('status'))
                <div class="alert alert-success mt-3">
                    {{ session('status') }}
                </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-6 mt-3">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="{{ asset('images/post/'.$barang->gambar) }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>

                              <!-- Murray -->
                              @if ($barang->kategori == 'murray')
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/murray/murray_black_2.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/murray/murray_black_3.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/murray/murray_brown_1.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              @endif

                              <!-- Nagisa -->
                              @if ($barang->kategori == 'nagisa')
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/nagisa/nagisa_leo_2.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/nagisa/nagisa_peach_1.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              @endif

                              <!-- Ricks -->
                              @if ($barang->kategori == 'ricks')
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/ricks/ricks_2.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              @endif

                              <!-- Tobhi -->
                              @if ($barang->kategori == 'tobhi')
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/tobhi/tobhi_2.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/tobhi/tobhi_3.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              @endif

                              <!-- Tomf -->
                              @if ($barang->kategori == 'tomf')
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/tomf/tomf_grey_1.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/tomf/tomf_grey_2.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/tomf/tomf_trans_1.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/tomf/tomf_trans_2.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              @endif

                              <!-- Wity -->
                              @if ($barang->kategori == 'wity')
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/wity/wity_brown.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/wity/wity_grey.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('images/kasatmata/wity/wity_grey.jpg') }}" class="rounded img-top" height="450" width="535" alt="...">
                              </div>
                              @endif

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <h3> {{ $barang->nama_barang }}</h3>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td> Rp. {{ number_format($barang->harga)}}</td>
                                </tr>

                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td>{{ $barang->deskripsi }}</td>
                                </tr>

                                <form action="{{ url('order/'.$barang->id) }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td><label for="stok" class=>{{ __('Stok') }}</label></td>
                                        <td>:</td>
                                        <td>{{ $barang->stok }}</td>
                                    </tr>
                                    <tr>
                                        <td><label for="jumlah_barang" class=>{{ __('Pesan') }}</label></td>
                                        <td>:</td>
                                        <td>
                                            <input id="jumlah_barang" type="number" min="1" class="form-control @error('jumlah_barang') is-invalid @enderror" name="jumlah_barang" value="{{ old('jumlah_barang') }}" required autocomplete="jumlah_barang" autofocus>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-warning"><i class="icon-shopping-cart"></i></button>
                                        </td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
