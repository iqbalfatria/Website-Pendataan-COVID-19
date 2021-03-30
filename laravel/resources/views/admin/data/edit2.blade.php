@extends('template.admin_layout.app')
@section('aside')
@include('template.admin_layout.aside')
@endsection
@section('header')
@include('template.admin_layout.header')
@endsection
@section('content')
<form action="{{ route('admin.data.update2',['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
@method('PATCH')
@csrf

                           <div class="padding">
                                   <div class="row">
                                    <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-body">           
                                        <div class="text-center mb-3">


                                     <label for="photo">
                                        <center> <img class="card-img-bottom" data-src="holder.js/100px1800/" alt="100%x180" src="{{url('')}}/{{$user->photo}}" data-holder-rendered="true" style="height: 450px; width: 450px; display: block;"></center>
                                     <input type="file" class="form-control-file" id="photo" name="photo" style="display:none;">
                                    @error('photo')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </label>

                                    </div>    
                                     </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group mb-3">



                                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $user->nama }}" placeholder="{{$user->nama}}" aria-label="Username" aria-describedby="basic-addon1">
                                                @error('nama')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Edit Data</strong>
                                        </div>
                                        <div class="card-body">
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $user->email }}">
                                                     @error('email')
                                                     <div class="text-danger">{{ $message }}</div>
                                                     @enderror
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Password</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control @error('pass') is-invalid @enderror" id="pass" name="pass" value="{{ old('pass') ?? $user->pass }}">
                                                     @error('pass')
                                                     <div class="text-danger">{{ $message }}</div>
                                                     @enderror
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Tempat Tanggal Lahir</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control @error('ttl') is-invalid @enderror" id="ttl" name="ttl" value="{{ old('ttl') ?? $user->ttl }}">
                                                     @error('ttl')
                                                     <div class="text-danger">{{ $message }}</div>
                                                     @enderror
                                                </div>
                                        </div>


                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
<option value="Laki-Laki"
{{ (old('jenis_kelamin') ?? $user->jenis_kelamin)=='Laki-Laki' ? 'selected': '' }} > Laki-Laki
</option>
<option value="Perempuan"
{{ (old('jenis_kelamin') ?? $user->jenis_kelamin)=='Perempuan' ? 'selected': '' }} > Perempuan
</option>
</select>
@error('jenis_kelamin')
<div class="text-danger">{{ $message }}</div>
@enderror
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') ?? $user->alamat }}">
                                                     @error('alamat')
                                                     <div class="text-danger">{{ $message }}</div>
                                                     @enderror
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Asal</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control @error('asal') is-invalid @enderror" id="asal" name="asal" value="{{ old('asal') ?? $user->asal }}">
                                                     @error('asal')
                                                     <div class="text-danger">{{ $message }}</div>
                                                     @enderror
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Tujuan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan" value="{{ old('tujuan') ?? $user->tujuan }}">
                                                     @error('tujuan')
                                                     <div class="text-danger">{{ $message }}</div>
                                                     @enderror
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Keluhan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control @error('keluhan') is-invalid @enderror" id="keluhan" name="keluhan" value="{{ old('keluhan') ?? $user->keluhan }}">
                                                     @error('keluhan')
                                                     <div class="text-danger">{{ $message }}</div>
                                                     @enderror
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Kepentingan</label>
                                                <div class="col-sm-8">

                                                    <textarea type="text"  name="kepentingan" class="form-control" rows=6 name="kepentingan">{{ old('kepentingan') ?? $user->kepentingan  }}</textarea>
                                                </div>
                                        </div>

                                        
                                    </div>
                                    </div>
                                    </div>



                                </div>

                                </div>
                                      <div class="padding">                      
                                   <div class="row">
                                    <div class="col-md-12">
                                    <div class="card">

                                        <div class="card-header">
                                            <center><strong><h2>Surat Keterangan Sehat</h></strong></center>
                                        </div>

                                            <div class="card-body">           
                                        <div class="text-center mb-3">

 

    
      
    
                                     <label for="sehat">
                                        
                                        <center> <img type="file" class="card-img-bottom" data-src="holder.js/100px1800/" alt="100%x180" src="{{url('')}}/{{$user->keterangan_sehat}}" data-holder-rendered="true" style="height: 500px; width: 1000px; display: block;"></center>
                                    <input type="file" class="form-control-file" id="sehat" name="sehat" style="display:none;">
                                    @error('sehat')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    </label
                                    
                                    </div>    
                                     </div>
                                        </div>

                                    </div>
                                </div>
                                </div>

                                <center><button class="btn btn-dark btn-block" type="submit">Submit</button></center>



</form>






@endsection
