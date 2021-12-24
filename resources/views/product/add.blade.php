@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="mt-4 d-flex justify-content-center">
            <h3> Tambah</h3>
        </div>
        <div class="col-md-16 mt-5">
            @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" action="add" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="nama_barang" class="col-md-2 col-form-label text-md-right">{{ __('Nama Barang') }}</label>

                    <div class="col-md-6">
                        <input id="nama_barang" type="text" class="form-control @error('name') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}" required autocomplete="nama_barang" autofocus>

                        @error('nama_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="deskripsi" class="col-md-2 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

                    <div class="col-md-6">
                        <textarea id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi') }}" required autocomplete="deskripsi" autofocus cols="130" rows="5"></textarea>
                        @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="harga" class="col-md-2 col-form-label text-md-right">{{ __('Harga') }}</label>

                    <div class="col-md-4">
                        <div class="input-group ">
                            <span class="input-group-text" id="harga">Rp.</span>
                            <input id="harga" type="number" min="1" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" required autocomplete="harga" autofocus>
                        </div>
                        @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="stok" class="col-md-2 col-form-label text-md-right">{{ __('Stok') }}</label>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input id="stok" type="number" min="1" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok') }}" required autocomplete="stok" autofocus>
                        </div>
                        @error('stok')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="stok" class="col-md-2 col-form-label text-md-right">{{ __('Kategori') }}</label>
                    <div class="col-md-2">
                        <div class="input-group">
                            <select id="kategori" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori') }}" required autocomplete="kategori" autofocus>
                                <option @if(old('kategori')=='murray') selected @endif value="murray">Murray</option>
                                <option @if(old('nagisa')=='nagisa') selected @endif value="nagisa">Nagisa</option>
                                <option @if(old('ricks')=='ricks') selected @endif value="ricks">Ricks</option>
                                <option @if(old('scout')=='scout') selected @endif value="scout">Scout</option>
                                <option @if(old('tobhi')=='tobhi') selected @endif value="tobhi">Tobhi</option>
                                <option @if(old('tomf')=='tomf') selected @endif value="tomf">Tomf</option>
                                <option @if(old('wity')=='wity') selected @endif value="wity">Wity</option>
                            </select>
                        </div>
                        @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 input-group">
                    <div class="custom-file">
                        <label for="gambar" class="col-md-2 col-form-label text-md-right"> {{ __('Gambar') }}</label>
                        <input id="gambar" type="file" class="col-md-4 input @error('gambar') is-invalid @enderror" name="gambar" value="{{ old('gambar') }}" autofocus>
                      </div>
                    @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-2 offset-md-2 ">
                        <button type="submit" class="btn btn-success" onclick="return confirm('Tambah Data?')">
                            {{ __('Tambah') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
