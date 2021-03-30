@extends('template.admin_layout.app')
@section('aside')
@include('template.admin_layout.aside')
@endsection
@section('header')
@include('template.admin_layout.header')
@endsection
@section('content')


                                <div class="col-sm-12">
                                    <div class="card-columns">
                                    @forelse ($pendataans as $mahasiswa)
                                        <div class="card">
                                         <img class="card-img-bottom" data-src="holder.js/100px1800/" alt="100%x180" src="{{url('')}}/{{$mahasiswa->image}}" data-holder-rendered="true" style="height: 450px; width: 100%; display: block;">
                                            <div class="card-body">
                                             <figure>
                                                <h4><center>{{$mahasiswa->nama}}</center></h4>
                                            </figure>
                                            </div>
                                        </div>

                                        @empty

                                         @endforelse
                                     </div>
                                </div>



	
								
</div>
</div>
</div>
</div>
		<section class="content">

		</section>
		<!-- /.content -->
	</div>
	
@endsection
