@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="mt-4 mb-4 d-flex justify-content-center">
                <h3><i class="fa fa-shopping-cart"></i> Checkout</h3>
            </div>
            @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
            @endif
            @if(!empty($keranjang->harga_total))
            <p align="right">Tanggal Pembayaran : {{ $keranjang->tanggal }} </p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Harga Per Barang</th>
                        <th>Total Harga</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($pembayarans as $pembayaran)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pembayaran->barang->nama_barang }}</td>
                        <td>{{ $pembayaran->jumlah_barang }}</td>
                        <td>Rp. {{ number_format( $pembayaran->barang->harga ) }}</td>
                        <td>Rp. {{ number_format ( $pembayaran->jumlah_harga ) }}</td>
                        <td>
                            <form action="{{ url('keranjang/'.$pembayaran->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" align="right"><strong> = </strong></td>
                        <td><strong>Rp. {{ number_format($keranjang->harga_total) }}</strong></td>
                        <td>
                            <a href="{{ url('checkout') }}" class="btn btn-success" onclick="return confirm('Checkout?');">
                                Check Out
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
