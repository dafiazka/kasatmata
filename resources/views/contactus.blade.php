@extends('layouts.main')

@section('content')

<div class="container">
    <div class="site-section">
        <div class=" d-flex justify-content-center mb-5">
            <h3><i class="icon icon-phone"></i> Contact Us</h3>
        </div>
        @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ url('send')}}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"  placeholder="Your Name *" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email *">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <!-- Phone number input-->
                        <input id="nohp" type="number" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ old('nohp') }}" required autocomplete="nohp" autofocus placeholder="Your Phone *">
                        @error('nohp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <!-- Message input-->
                        <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required autocomplete="message" autofocus placeholder="Your Message *" rows="5"></textarea>
                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-xl" onclick="return confirm('Kirim?')">{{ __('Send Message') }}</button>
                </div>
                <div class="col-md-6 float-right">
                    <img src="{{ asset('images/envelope.png') }}" class="rounded mx-auto d-block"  width="450" alt="...">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
