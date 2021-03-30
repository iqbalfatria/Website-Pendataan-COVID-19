@extends('template.template_pengunjung.app')
@section('header')
@include('template.template_pengunjung.header')
@endsection
@section('content')
@include('template.template_pengunjung.content')



        <!-- Portfolio Section -->
        <section class="commonSection porfolioPage">
            <div class="container">

                <div class="row" id="Grid">
                    <div class="custom">
                                    <div class="row">
                    <div class="col-lg-12">
                        <div class="folio_mixing">
                            <h3><bold>Terima kasih telah mengisi data pendatang, data anda menunggu di konfirmasi oleh petugas, jika data telah di konfirmasi maka akan secara otomatis hilang dari halaman ini</h3></bold>
                        </div>
                    </div>
                </div>

                
                    @forelse ($pendataans as $mahasiswa)
                        <div class="col-lg-3 col-sm-4 col-md-3 mix logos branding">
                            <div class="singlefolio">
                                <img src="{{url('')}}/{{$mahasiswa->image}}" alt="" style="height: 290px; width: 280px; display: block;"/>
                                <div class="folioHover">
                                    <h4>{{$mahasiswa->nama}}</h4>
                                </div>
                            </div>
                        </div>

                     @empty
                    @endforelse

                    </div>
                </div>

            </div>
        </section>

@endsection
