<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pendataan;

use File;
class DataController extends Controller
{
	 public function create()
	{
		
	$data['module']['name'] = "Beranda";
	return view('data_pengunjung.index',['data' => $data]);
	}
		public function store(Request $request)
	{
		$validateData = $request->validate([
		'nama' => 'required|min:4,unique:pendataans',
		'ttl' => 'required|min:3|max:50',
		'jenis_kelamin' => 'required|in:P,L',
		'alamat' => 'required',
		'asal' => '',
		'hari_datang' => '',
		'tujuan' => '',
		'kepentingan' => '',
		'keluhan' => '',
		'image' => 'file|image|max:1000',
		'sehat' => 'file|image|max:1000',
		]);
		$mahasiswa = new pendataan();
		$mahasiswa->nama = $validateData['nama'];
		$mahasiswa->ttl = $validateData['ttl'];
		$mahasiswa->jenis_kelamin = $validateData['jenis_kelamin'];
		$mahasiswa->alamat = $validateData['alamat'];
		$mahasiswa->asal = $validateData['asal'];
		$mahasiswa->hari_datang = $validateData['hari_datang'];
		$mahasiswa->tujuan = $validateData['tujuan'];
		$mahasiswa->kepentingan = $validateData['kepentingan'];
		$mahasiswa->keluhan = $validateData['keluhan'];
		if($request->hasFile('image'))
		{
			$extFile = $request->image->getClientOriginalExtension();
			$namaFile = 'user-'.time().".".$extFile;
			$path = $request->image->move('assets/images/photo',$namaFile);
			$mahasiswa->image = $path;
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
		return redirect()->route('data_pengunjung.index');
	}

	public function index()
	{
		$mahasiswas = Pendataan::all();

		return view('data_pengunjung.index',['pendataans' => $mahasiswas]);
	}
	
	public function show($pendataan_id)
	{
		$result = Pendataan::findOrFail($pendataan_id);
		return view('data_pengunjung.show',['pendataan' => $result]);
	}
	public function edit($pendataan_id)
	{
		$result = Pendataan::findOrFail($pendataan_id);
		return view('data_pengunjung.edit',['pendataan' => $result]);
	}
	public function update(Request $request, Pendataan $pendataan)
	{
		$validateData = $request->validate([
		'nama' => 'required|min:4,unique:pendataans',
		'ttl' => 'required|min:3|max:50',
		'jenis_kelamin' => 'required|in:P,L',
		'alamat' => 'required',
		'asal' => '',
		'hari_datang' => '',
		'tujuan' => '',
		'kepentingan' => '',
		'keluhan' => '',
		'image' => 'file|image|max:1000',
		'sehat' => 'file|image|max:1000',
		]);
		$pendataan->nama = $validateData['nama'];
		$pendataan->ttl = $validateData['ttl'];
		$pendataan->jenis_kelamin = $validateData['jenis_kelamin'];
		$pendataan->alamat = $validateData['alamat'];
		$pendataan->asal = $validateData['asal'];
		$pendataan->hari_datang = $validateData['hari_datang'];
		$pendataan->tujuan = $validateData['tujuan'];
		$pendataan->kepentingan = $validateData['kepentingan'];
		$pendataan->keluhan = $validateData['keluhan'];
		if($request->hasFile('image'))
		{
			$extFile = $request->image->getClientOriginalExtension();
			$namaFile = 'user-'.time().".".$extFile;
			$path = $request->image->move('assets/images/photo',$namaFile);
			$pendataan->image = $path;
		}		
		if($request->hasFile('sehat'))
		{
			$extFile = $request->sehat->getClientOriginalExtension();
			$namaFile = 'user-'.time().".".$extFile;
			$path = $request->sehat->move('assets/images/suratsehat',$namaFile);
			$pendataan->keterangan_sehat = $path;
		}
		$pendataan->save();
		$request->session()->flash('pesan','Perubahan data berhasil');
		return redirect()->route('admin.data.index',['pendataan' => $pendataan->id]);
	}
	
	public function destroy(Request $request, Pendataan $pendataan)
	{
		$pendataan->delete();
		$request->session()->flash('pesan','Hapus data berhasil');
		return redirect()->route('data_pengunjung.index');
	}

}
