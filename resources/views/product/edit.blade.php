@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="mt-4 d-flex justify-content-center">
            <h3>Edit Barang</h3>
        </div>
        <div class="col-md-12 mt-5">
            <img src="{{ asset('images/post/'.$barangs->gambar) }}" class="rounded mx-auto d-block float-right mt-4 mb-4"  width="450" alt="...">
            <form method="POST" action="{{ url('edit', $barangs->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="nama_barang" class="col-md-3 col-form-label text-md-right">{{ __('Nama Barang') }}</label>
                    <div class="col-md-6">
                        <input id="nama_barang" type="text" value="{{ $barangs->nama_barang }}"  class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}" required autocomplete="nama_barang" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="deskripsi" class="col-md-3 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

                    <div class="col-md-6">
                        <textarea id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi') }}" required autocomplete="deskripsi" autofocus cols="130" rows="8">{{ $barangs->deskripsi }}</textarea>
                        @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="harga" class="col-md-3 col-form-label text-md-right">{{ __('Harga') }}</label>

                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text" id="harga">Rp.</span>
                            <input id="harga" type="number" value="{{ $barangs->harga }}" min="1" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" required autocomplete="harga" autofocus>
                        </div>
                        @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="stok" class="col-md-3 col-form-label text-md-right">{{ __('Stok') }}</label>

                    <div class="col-md-6">
                        <div class="input-group">
                            <input id="stok" type="number" value="{{ $barangs->stok }}" min="1" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok') }}" required autocomplete="stok" autofocus>
                        </div>
                        @error('stok')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="stok" class="col-md-3 col-form-label text-md-right">{{ __('Kategori') }}</label>
                    <div class="col-md-6">
                        <select id="kategori" value="{{ $barangs->kategori }}" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori') }}" required autofocus>
                            <option @if(old('kategori')=='murray') selected @endif value="murray">Murray</option>
                            <option @if(old('nagisa')=='nagisa') selected @endif value="nagisa">Nagisa</option>
                            <option @if(old('ricks')=='ricks') selected @endif value="ricks">Ricks</option>
                            <option @if(old('scout')=='scout') selected @endif value="scout">Scout</option>
                            <option @if(old('tobhi')=='tobhi') selected @endif value="tobhi">Tobhi</option>
                            <option @if(old('tomf')=='tomf') selected @endif value="tomf">Tomf</option>
                            <option @if(old('wity')=='wity') selected @endif value="wity">Wity</option>
                            <option @if(old('arata')=='arata') selected @endif value="arata">Arata</option>
                        </select>
                        @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="input-group">
                        <label for="gambar" class="col-md-3 col-form-label text-md-right">{{ __('Gambar') }}</label>
                        <input id="gambar" type="file" value="{{ $barangs->gambar }}" class="col-md-3 @error('gambar') is-invalid @enderror" name="gambar" value="{{ old('gambar') }}" autofocus>
                      </div>
                    @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-3 float-right">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Edit Data?')">
                        {{ __('Edit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
