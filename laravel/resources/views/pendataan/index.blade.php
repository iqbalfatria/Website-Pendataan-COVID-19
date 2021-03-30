@extends('template.template_pendataan.app')
@section('header')
@extends('template.template_pendataan.header')
@endsection
@section('content')
@include('template.template_pendataan.content')


<section class="commonSection ContactPage">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-sm-12 col-md-10 col-md-offset-1">

                        <div class="container-contact100">
	                        <div class="wrap-contact100">
		                        <form class="contact100-form validate-form" action="{{ route('pendataan.store') }}" method="POST" enctype="multipart/form-data">
			                        @csrf
                            <div class="row">

                                <div class="col-lg-6 col-sm-6">
                                    <input class="input-form @error('nama') is-invalid @enderror" type="nama" name="nama" id="nama" placeholder="Nama Lengkap" value="{{ old('nama') }}">
                                    @error('nama')
					                <div class="text-danger">{{ $message }}</div>
					                @enderror
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <input class="input-form @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
					                <div class="text-danger">{{ $message }}</div>
					                @enderror
                                </div>

                               <div class="col-sm-12">
                                    <input class="input-form @error('ttl') is-invalid @enderror" type="ttl" name="ttl" id="ttl" placeholder="ttl" value="{{ old('ttl') }}">
                                    @error('ttl')
					                <div class="text-danger">{{ $message }}</div>
					                @enderror
                                </div>


				                <div class="col-sm-12" data-validate="Name is required">
					                <select class="input-form required" name="jenis_kelamin" id="jenis_kelamin" placeholder="Name">
						                <option value="empty">Jenis Kelamin</option>
						                <option value="Laki-Laki" {{ old('jenis_kelamin')=='Laki-Laki' ? 'selected': '' }}>
							                Laki-Laki
						                </option>
						                <option value="Perempuan" {{ old('jenis_kelamin')=='Perempuan' ? 'selected': '' }}>
							                Perempuan
						                </option>
					                </select>
				                </div>

                                <div class="col-sm-12">
                                    <input class="input-form @error('alamat') is-invalid @enderror" type="alamat" name="alamat" id="alamat" placeholder="alamat" value="{{ old('alamat') }}">
                                    @error('alamat')
					                <div class="text-danger">{{ $message }}</div>
					                @enderror
                                </div>

                                <div class="col-sm-12">
                                    <input class="input-form @error('asal') is-invalid @enderror" type="asal" name="asal" id="asal" placeholder="asal" value="{{ old('asal') }}">
                                    @error('asal')
					                <div class="text-danger">{{ $message }}</div>
					                @enderror
                                </div>

                                <div class="col-sm-12">
                                    <input class="input-form @error('tujuan') is-invalid @enderror" type="tujuan" name="tujuan" id="tujuan" placeholder="tujuan" value="{{ old('tujuan') }}">
                                    @error('tujuan')
					                <div class="text-danger">{{ $message }}</div>
					                @enderror
                                </div>

                                <div class="col-sm-12">
                                    <input class="input-form @error('keluhan') is-invalid @enderror" type="keluhan" name="keluhan" id="keluhan" placeholder="keluhan" value="{{ old('keluhan') }}">
                                    @error('keluhan')
					                <div class="text-danger">{{ $message }}</div>
					                @enderror
                                </div>

                                <div class="col-sm-12">
                                <textarea class="input-form @error('kepentingan') is-invalid @enderror" name="kepentingan" id="kepentingan" placeholder="Kepentingan" value="{{ old('kepentingan') }}"></textarea>
                                @error('kepentingan')
					            <div class="text-danger">{{ $message }}</div>
					            @enderror
                                </div>


                               
					            <div class="col-lg-6 col-sm-6">
						            <input type="file" name="sehat" id="sehat" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
						            <label for="sehat"><center>SURAT KETERANGAN SEHAT</center></label>
						            @error('sehat')
						            <div class="text-danger">{{ $message }}</div>
						            @enderror

                                </div>
                                <div class="col-lg-6 col-sm-6">
						            <input type="file" name="image" id="image" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
						            <label for="image"><center>PHOTO WAJAH</center></label>
						            @error('image')
						            <div class="text-danger">{{ $message }}</div>
						            @enderror
					            </div>
	
                                  <div class="col-sm-12">
                                  <center>  <button class="common_btn red_bg" type="submit" id="con_submit"><span>SUBMIT</span></button></center>
                                  </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>






@endsection
