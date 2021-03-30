@extends('template.admin_layout.app')
@section('aside')
@include('template.admin_layout.aside')
@endsection
@section('header')
@include('template.admin_layout.header')
@endsection
@section('content')

                            <div class="padding">
                                   <div class="row">
                                    <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-body">           
                                        <div class="text-center mb-3">

                                        <center> <img class="card-img-bottom" data-src="holder.js/100px1800/" alt="100%x180" src="{{url('')}}/{{$pendataan->image}}" data-holder-rendered="true" style="height: 450px; width: 450px; display: block;"></center>

                                    </div>    
                                     </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group mb-3">

                                                <input type="text"  value="{{$pendataan->nama}}" disabled="disabled" class="form-control" placeholder="{{$pendataan->nama}}" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Data lengkap</strong>
                                        </div>
                                        <div class="card-body">
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="text" value="{{$pendataan->email}}" disabled="disabled" class="form-control">
                                                </div>
                                        </div>
                                                                                <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Tempat Tanggal Lahir</label>
                                                <div class="col-sm-8">
                                                    <input type="text" value="{{$pendataan->ttl}}" disabled="disabled" class="form-control">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-8">
                                                    <input type="text" value="{{$pendataan->jenis_kelamin}}" disabled="disabled" class="form-control">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" value="{{$pendataan->alamat}}" disabled="disabled" class="form-control">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Asal</label>
                                                <div class="col-sm-8">
                                                    <input type="text" value="{{$pendataan->asal}}" disabled="disabled" class="form-control">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Tujuan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" value="{{$pendataan->tujuan}}" disabled="disabled" class="form-control">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Keluhan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" value="{{$pendataan->keluhan}}" disabled="disabled" class="form-control">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Kepentingan</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text"  disabled="disabled" class="form-control" rows=8>{{$pendataan->kepentingan}}</textarea>
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

                                        <center> <img class="card-img-bottom" data-src="holder.js/100px1800/" alt="100%x180" src="{{url('')}}/{{$pendataan->keterangan_sehat}}" data-holder-rendered="true" style="height: 500px; width: 1000px; display: block;"></center>

                                    </div>    
                                     </div>
                                        </div>

                                    </div>
                                </div>
@endsection
