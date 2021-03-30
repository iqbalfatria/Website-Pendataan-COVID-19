<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pendataan;
use Carbon\Carbon;
use App\User;

use File;
use Image;

class PendataanController extends Controller
{
   public function index()
	{
	return view('pendataan.index');
	}
	
	public function store(Request $request)
	{
		$validateData = $request->validate([
		'nama' => 'required|min:5',
		'email'=> 'required|email|min:2|unique:pendataans|unique:users',
		'ttl' => 'required|min:3|max:50',
		'jenis_kelamin' => 'required',
		'alamat' => 'required',
		'asal' => '',
		'tujuan' => '',
		'keluhan' => '',
		'kepentingan' => '',

		'image' => 'file|image|max:1000',
		'sehat' => 'file|image|max:1000',
		]);
		$mahasiswa = new pendataan();
		$mahasiswa->nama = $validateData['nama'];
		$mahasiswa->email = $validateData['email'];
		$mahasiswa->ttl = $validateData['ttl'];
		$mahasiswa->jenis_kelamin = $validateData['jenis_kelamin'];
		$mahasiswa->alamat = $validateData['alamat'];
		$mahasiswa->asal = $validateData['asal'];
		$mahasiswa->tujuan = $validateData['tujuan'];
		$mahasiswa->kepentingan = $validateData['kepentingan'];
		$mahasiswa->keluhan = $validateData['keluhan'];
		if($request->hasFile('image'))
		{
					
		
			$extFile = $request->image->getClientOriginalExtension();
			$namaFile = 'user-'.time().".".$extFile;
			$path = $request->image->move('assets/images/photo',$namaFile);
			$mahasiswa->image = $path;
			
			     //$image = $request->file('image');

				// $image_name = time() . '.' . $image->getClientOriginalExtension();

				// $destinationPath = public_path('/thumbnail');

				// $resize_image = Image::make($image->getRealPath());

				// $resize_image->resize(255, 325, function($constraint){
				//  $constraint->aspectRatio();
				// })->save($destinationPath . '/' . $image_name);

				// $destinationPath = public_path('assets/images/photo/resize');

			//	 $image->move($destinationPath, $image_name);


			//$mahasiswa->image = $image;
		}		
		if($request->hasFile('sehat'))
		{
			$extFile = $request->sehat->getClientOriginalExtension();
			$namaFile = 'user-'.time().".".$extFile;
			$path = $request->sehat->move('assets/images/suratsehat',$namaFile);
			$mahasiswa->keterangan_sehat = $path;
		}
		$mahasiswa->save();
		$request->session()->flash('pesan','Penambahan data berhasil');
		return redirect()->route('welcome');
	}
	public function welcome()
	{
		$mahasiswas = Pendataan::all();
		return view('welcome');
		
	}	
	
	
	public function show($pendataan_id)
	{
		$result = Pendataan::findOrFail($pendataan_id);
		return view('pendataan.show',['pendataan' => $result]);
	}
	public function edit($pendataan_id)
	{
		$result = Pendataan::findOrFail($pendataan_id);
		return view('pendataan.edit',['pendataan' => $result]);
	}
	public function update(Request $request, Pendataan $pendataan)
	{
		$validateData = $request->validate([
		'nim' => 'required|size:8,unique:pendataans',
		'nama' => 'required|min:3|max:50',
		'jenis_kelamin' => 'required|in:P,L',
		'jurusan' => 'required',
		'alamat' => '',
		]);
		$pendataan->nim = $validateData['nim'];
		$pendataan->name = $validateData['nama'];
		$pendataan->gender = $validateData['jenis_kelamin'];
		$pendataan->departement = $validateData['jurusan'];
		$pendataan->address = $validateData['alamat'];
		$pendataan->save();
		$request->session()->flash('pesan','Perubahan data berhasil');
		return redirect()->route('pendataan.show',['pendataan' => $pendataan->id]);
	}
	
	public function destroy(Request $request, Pendataan $pendataan)
	{
		$pendataan->delete();
		$request->session()->flash('pesan','Hapus data berhasil');
		return redirect()->route('pendataan.index');
	}

}
