@extends('layouts.main')

@section('content')

<div class="site-section">
    <div class="container">
        <div class=" d-flex justify-content-center mb-5">
            <h3><i class="icon icon-envelope"></i> Pesan Masuk</h3>
        </div>
        @if (session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
        @endif
        @foreach($contactuses as $contactus)
        <div class="row">
            <div class="row">
              <div class="col-md-5 mb-4">
                  <div class="card" style="width: 45rem;">
                      <div class="card-body">
                          <div class="card-header">
                            <h3><strong>{{ $contactus->name }}</strong></h3>
                          </div>
                          <table class="table">
                              <tr>
                                <td>Email </td>
                                <td>: </td>
                                <td> {{ $contactus->email }} </td>
                            </tr>
                            <tr>
                                <td>Nomor Hp </td>
                                <td>: </td>
                                <td>{{ $contactus->nohp }} </td>
                            </tr>
                            <tr>
                                <td>Pesan </td>
                                <td>: </td>
                                <td>{{ $contactus->message }} </td>
                            </tr>
                          </table>
                          <form action="{{ url('receive/delete/'.$contactus->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                              @method('delete')
                              @csrf
                              <button type="submit" class="btn btn-danger float-right"><i class="icon-trash"></i></button>
                          </form>
                      </div>
                  </div>
              </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
