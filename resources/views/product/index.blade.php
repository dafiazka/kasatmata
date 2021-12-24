@extends('layouts.main')

@section('content')

<div class="site-section">
    <div class="container">
        @if (session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="row">
              @foreach($barangs as $barang)
              <div class="col-md-4 mb-4">
                  <div class="card" style="width: 24rem;">
                      <img src="{{ asset('images/post/'.$barang->gambar) }} " class="rounded img-top" height="258">
                      <div class="card-body">
                          <h3> {{ $barang->nama_barang }}</h3>
                          <div class="d-flex post-entry">
                          </div>
                          <div class="mb-3">
                              <h4>Rp. {{ number_format($barang->harga)}}</h4>
                              <span></span>
                          </div>
                      @csrf
                      <table>
                          <tr>
                              @if (auth()->user()->level==1)
                              <td><a href="{{ url('edit/'.$barang->id) }}" class="btn btn-primary"><i class="icon-pencil"></i></a></td>
                              <td>
                                  <form action="{{ url('delete/'.$barang->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" class="btn btn-danger"><i class="icon-trash"></i></button>
                                  </form>
                              </td>
                              @endif
                              <td><a href="{{ url('detail/'.$barang->id) }}" class="btn btn-info"><i class="icon-arrow-right"></i></a></td>
                          </tr>
                      </table>
                      </div>
                  </div>
              </div>
              @endforeach
        </div>
       </div>
    </div>
</div>
@endsection
