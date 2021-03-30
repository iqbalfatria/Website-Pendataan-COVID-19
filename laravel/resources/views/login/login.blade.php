@extends('template.template_login.app')
@section('content')

    <div class="form-body" class="container-fluid">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="index.html">

                            </a>
                        </div>
                        <h3>LOGIN</h3>
                        <p></p><br>

                        @if(session()->has('pesan'))
                        <div class="alert alert-success">
                        {{ session()->get('pesan') }}
                        </div>
                        @endif
                        <form action="{{ route('login.process') }}" method="POST">
                        @csrf
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            
                            <input class="form-control @error('pass') is-invalid @enderror" type="password" id="pass" name="pass" placeholder="Password" value="{{ old('pass') }}" required >
                            @error('pass')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button>
                            </div>
                        </form>
                        <div class="other-links">
                            <a href="{{url('') }}/">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
