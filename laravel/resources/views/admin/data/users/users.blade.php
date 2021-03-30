@extends('template.admin_layout.app')
@section('aside')
@include('template.admin_layout.aside')
@endsection
@section('header')
@include('template.admin_layout.header')
@endsection
@section('content')



<div id="content" class="flex ">
<div>
<div class="page-hero page-container " id="page-hero">
<div class="padding d-flex">
</div>
@if(session()->has('pesan'))
<div class="alert alert-success">
{{ session()->get('pesan') }}
</div>
@endif

<div class="table-responsive">
 <table class="table table-theme table-row v-middle">
<thead>
<tr>
<th class="text-muted">
<form action="{{ route('admin.data.create2') }}">
<button class="btn btn-md btn-raised btn-wave btn-icon btn-rounded mb-2 green text-white" type="submit">
 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
</button> 
</form>

</th>
<th class="text-muted">Nama</th>
<th class="text-muted">Email</th>
<th class="text-muted">TTL</th>
<th class="text-muted">Jenis Kelamin</th>
<th class="text-muted">Alamat</th>
<th class="text-muted">#</th>

</tr>
</tr>
</thead>
<tbody>

@forelse ($users as $mahasiswa)
<tr class=" v-middle" data-id="15">

<th class="text-muted">{{$loop->iteration}}</th>

<td>
{{$mahasiswa->nama}}
</td>
<td>
{{$mahasiswa->email}}
</td>
<td>
{{$mahasiswa->ttl}}
</td>
<td>
{{$mahasiswa->jenis_kelamin}}
 </td>
 <td>
 {{$mahasiswa->alamat}}
 </td>
 
												
               <td>
                 <div class="item-action dropdown">
                        <a href="#" data-toggle="dropdown" class="text-muted">
                                     <i data-feather="more-vertical"></i>
                                     </a>
                                  <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                              <a class="dropdown-item" href="{{ route('admin.data.show2',['user' => $mahasiswa->id]) }}"class="btn btn-primary">
                                        See detail
                                   </a>
                                       <a class="dropdown-item edit" href="{{ route('admin.data.edit2',['user' => $mahasiswa->id]) }}">
                                            Edit
                                           </a>
										<form action="{{ route('admin.data.destroy2',['user'=>$mahasiswa->id]) }}" method="POST">
                                          <a>
								@method('DELETE')
								@csrf
																
							<button  class="dropdown-item edit">Delete item</button>
																
                                 </a>
							</form>	
                         </div>
                          </div>
                    </td>

               </tr>
			</div>
	@empty
		<td colspan="6" class="text-center">Tidak ada data...</td>
		@endforelse
	</tbody>	
								
</div>
</div>
</div>
</div>
		<section class="content">

		</section>
		<!-- /.content -->
	</div>
	
@endsection
