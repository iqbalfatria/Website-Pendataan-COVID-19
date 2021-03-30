@extends('template.admin_layout.app')
@section('aside')
@include('template.admin_layout.aside')
@endsection
@section('header')
@include('template.admin_layout.header')
@endsection
@section('content')
	<div class="container-contact100">
		<div class="wrap-contact100">
<form class="contact100-form validate-form" action="{{ route('admin.data.store2') }}" method="POST" enctype="multipart/form-data">
@csrf

				
				
		
                                    <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong><h1><center>INPUT DATA</center></h1></strong>
                                        </div>
                                            <div class="card-body">
                                            <div class="row row-sm">
                                                <div class="col-sm-12">
                                                  
                                                    <div class="md-form-group float-label" data-validate="Name is required">
                                                        <input class="md-input @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" onkeyup="this.setAttribute('value', this.value);" >
                                                        <label>Nama Lengkap</label>
                                                        @error('nama')
                                                        <div class="text-danger">{{ $message }}</div>
			                                        	@enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">                                   
                                                    <div class="md-form-group float-label" data-validate="Name is required">
                                                        <input class="md-input @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" onkeyup="this.setAttribute('value', this.value);" >
                                                        <label>Email</label>
                                                        @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
			                                        	@enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">                                   
                                                    <div class="md-form-group float-label" data-validate="Name is required">
                                                        <input class="md-input @error('pass') is-invalid @enderror" id="pass" name="pass" value="{{ old('pass') }}" onkeyup="this.setAttribute('value', this.value);" >
                                                        <label>password</label>
                                                        @error('pass')
                                                        <div class="text-danger">{{ $message }}</div>
			                                        	@enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">                                   
                                                    <div class="md-form-group float-label" data-validate="Name is required">
                                                        <input class="md-input @error('ttl') is-invalid @enderror" id="ttl" name="ttl" value="{{ old('ttl') }}" onkeyup="this.setAttribute('value', this.value);" >
                                                        <label>Tempat Tanggal Lahir</label>
                                                        @error('ttl')
                                                        <div class="text-danger">{{ $message }}</div>
			                                        	@enderror
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3" data-validate="Name is required">
                                                <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin">
                                                    <option selected="">Pilih...</option>
                                                    <option value="Laki-Laki"
					                                {{ old('jenis_kelamin')=='Laki-Laki' ? 'selected': '' }} >
					                                Laki-Laki
					                                </option>
					                                <option value="Perempuan"
					                                {{ old('jenis_kelamin')=='Perempuan' ? 'selected': '' }} >
					                                Perempuan
					                                </option>
                                                </select>
                                                </div>

                                                <div class="col-sm-12">                                   
                                                    <div class="md-form-group float-label" data-validate="Name is required">
                                                        <input class="md-input @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}" onkeyup="this.setAttribute('value', this.value);" >
                                                        <label>Alamat</label>
                                                        @error('alamat')
                                                        <div class="text-danger">{{ $message }}</div>
			                                        	@enderror
                                                    </div>
                                                </div>
				
                                                <div class="col-sm-12">                                   
                                                    <div class="md-form-group float-label" data-validate="Name is required">
                                                        <input class="md-input @error('asal') is-invalid @enderror" id="asal" name="asal" value="{{ old('asal') }}" onkeyup="this.setAttribute('value', this.value);" >
                                                        <label>Asal</label>
                                                        @error('asal')
                                                        <div class="text-danger">{{ $message }}</div>
			                                        	@enderror
                                                    </div>
                                                </div>				

                                                <div class="col-sm-12">                                   
                                                    <div class="md-form-group float-label" data-validate="Name is required">
                                                        <input class="md-input @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan" value="{{ old('tujuan') }}" onkeyup="this.setAttribute('value', this.value);" >
                                                        <label>Tujuan</label>
                                                        @error('tujuan')
                                                        <div class="text-danger">{{ $message }}</div>
			                                        	@enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">                                   
                                                    <div class="md-form-group float-label" data-validate="Name is required">
                                                        <input class="md-input @error('keluhan') is-invalid @enderror" id="keluhan" name="keluhan" value="{{ old('keluhan') }}" onkeyup="this.setAttribute('value', this.value);" >
                                                        <label>Keluhan</label>
                                                        @error('keluhan')
                                                        <div class="text-danger">{{ $message }}</div>
			                                        	@enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">                                   
                                                <div class="md-form-group float-label" data-validate="Name is required">
                                                        <textarea class="md-input @error('kepentingan') is-invalid @enderror" id="kepentingan" name="kepentingan" value="{{ old('kepentingan') }}" onkeyup="this.setAttribute('value', this.value);" rows=4></textarea>
                                                        <label>Kepentigan</label>
                                                        @error('Tkepentingan')
                                                        <div class="text-danger">{{ $message }}</div>
			                                        	@enderror
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" name="photo" id="photo" class="custom-file-input">
                                                    <label class="custom-file-label" for="inputGroupFile02">Foto</label>
                                                    @error('photo')
					                                <div class="text-danger">{{ $message }}</div>
					                                @enderror
                                                </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" name="sehat" id="sehat" class="custom-file-input">
                                                    <label class="custom-file-label" for="inputGroupFile02">Surat keterangan sehat</label>
                                                    @error('sehat')
					                                <div class="text-danger">{{ $message }}</div>
					                                @enderror
                                                </div>
                                                </div>

				
				
				                            <div class="col-sm-12">                                         
                                            <div class="md-form-group">

                                            <center><button class="btn btn-dark btn-block" type="submit">Submit</button></center>
                                            </div>                
                                            </div>

                                          


				

				

				

</div>
</div>
</form>
</div>
</div>
@endsection
