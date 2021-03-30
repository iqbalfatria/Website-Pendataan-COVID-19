<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendataan;
use App\User;
use File;
use Mail;

use Illuminate\Support\Str;

class AdminDataController extends Controller
{

	public function create()
	{
	$data['module']['name'] = "Beranda";
	return view('admin.data.create',['data' => $data]);
	}
    public function create2()
	{
	$data['module']['name'] = "Beranda";
	return view('admin.data.create2',['data' => $data]);
	}
	
	public function store(Request $request)
	{
		$validateData = $request->validate([
		'nama' => 'required|min:5',
		'email'=> 'required|email|min:2|unique:pendataans|unique:users',
		'ttl' => 'required',
		'jenis_kelamin' => 'required',
		'alamat' => 'required',
		'asal' => 'required',
		'tujuan' => 'required',
		'kepentingan' => 'required',
		'keluhan' =>'required' ,
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
		return redirect()->route('admin.data.index');
	}

    	public function store2(Request $request)
	{
		$validateData = $request->validate([
		'nama' => 'required|min:5',
		'email'=> 'required|email|min:2|unique:pendataans|unique:users',
        'pass'=>'required',
		'ttl' => 'required',
		'jenis_kelamin' => 'required',
		'alamat' => 'required',
		'asal' => 'required',
		'tujuan' => 'required',
		'kepentingan' => 'required',
		'keluhan' =>'required' ,
		'photo' => 'file|image|max:1000',
		'sehat' => 'file|image|max:1000',
		]);
		$mahasiswa = new user();
		$mahasiswa->nama = $validateData['nama'];
        $mahasiswa->email = $validateData['email'];
        $mahasiswa->pass = $validateData['pass'];
		$mahasiswa->ttl = $validateData['ttl'];
		$mahasiswa->jenis_kelamin = $validateData['jenis_kelamin'];
		$mahasiswa->alamat = $validateData['alamat'];
		$mahasiswa->asal = $validateData['asal'];
		$mahasiswa->tujuan = $validateData['tujuan'];
		$mahasiswa->kepentingan = $validateData['kepentingan'];
		$mahasiswa->keluhan = $validateData['keluhan'];
		if($request->hasFile('photo'))
		{
			$extFile = $request->photo->getClientOriginalExtension();
			$namaFile = 'user-'.time().".".$extFile;
			$path = $request->photo->move('assets/images/photo',$namaFile);
			$mahasiswa->photo = $path;
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
		return redirect()->route('admin.data.index');
	}

	public function index()
	{
		$mahasiswas = Pendataan::all();
		return view('admin.data.index',['pendataans' => $mahasiswas]);
	}
    	public function pendataan()
	{
		$mahasiswas = Pendataan::all();
		return view('admin.data.pendataan.pendataan',['pendataans' => $mahasiswas]);
	}
    	public function users()
	{
		$mahasiswas = User::all();
		return view('admin.data.users.users',['users' => $mahasiswas]);
	}
	
	public function show($pendataan_id)
	{
		$result = Pendataan::findOrFail($pendataan_id);
		return view('admin.data.show',['pendataan' => $result]);
	}

    public function show2($pendataan_id)
	{
		$result = User::findOrFail($pendataan_id);
		return view('admin.data.show2',['user' => $result]);
	}

	public function edit($pendataan_id)
	{
		$result = Pendataan::findOrFail($pendataan_id);
		return view('admin.data.edit',['pendataan' => $result]);
	}
    	public function edit2($pendataan_id)
	{
		$result = User::findOrFail($pendataan_id);
		return view('admin.data.edit2',['user' => $result]);
	}


	public function update(Request $request, Pendataan $pendataan)
	{
		$validateData = $request->validate([
		'nama' => 'required|min:5',
		'email'=> 'required|email|min:2|unique:users',
		'ttl' => 'required',
		'jenis_kelamin' => 'required', 
		'alamat' => 'required',
		'asal' => 'required',
		'tujuan' =>'required',
		'kepentingan' => 'required',
		'keluhan' => 'required',
		'image' => 'file|image|max:1000',
		'sehat' => 'file|image|max:1000',
		]);
		$pendataan->nama = $validateData['nama'];
        $pendataan->email = $validateData['email'];
		$pendataan->ttl = $validateData['ttl'];
		$pendataan->jenis_kelamin = $validateData['jenis_kelamin'];
		$pendataan->alamat = $validateData['alamat'];
		$pendataan->asal = $validateData['asal'];
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
		return redirect()->route('admin.data.pendataan.pendataan',['pendataan' => $pendataan->id]);
	}

    public function update2(Request $request, User $user)
	{
		$validateData = $request->validate([
		'nama' => 'required|min:5',
		'email'=> 'required|email|min:2|unique:pendataans',
        'pass'=>'required',
		'ttl' => 'required',
		'jenis_kelamin' => 'required', 
		'alamat' => 'required',
		'asal' => 'required',
		'tujuan' =>'required',
		'kepentingan' => 'required',
		'keluhan' => 'required',
		'photo' => 'file|image|max:1000',
		'sehat' => 'file|image|max:1000',
		]);
		$user->nama = $validateData['nama'];
        $user->email = $validateData['email'];
        $user->pass = $validateData['pass'];
		$user->ttl = $validateData['ttl'];
		$user->jenis_kelamin = $validateData['jenis_kelamin'];
		$user->alamat = $validateData['alamat'];
		$user->asal = $validateData['asal'];
		$user->tujuan = $validateData['tujuan'];
		$user->kepentingan = $validateData['kepentingan'];
		$user->keluhan = $validateData['keluhan'];
		if($request->hasFile('photo'))
		{
			$extFile = $request->photo->getClientOriginalExtension();
			$namaFile = 'user-'.time().".".$extFile;
			$path = $request->photo->move('assets/images/photo',$namaFile);
			$user->photo = $path;
		}		
		if($request->hasFile('sehat'))
		{
			$extFile = $request->sehat->getClientOriginalExtension();
			$namaFile = 'user-'.time().".".$extFile;
			$path = $request->sehat->move('assets/images/suratsehat',$namaFile);
			$user->keterangan_sehat = $path;
		}
		$user->save();
		$request->session()->flash('pesan','Perubahan data berhasil');
		return redirect()->route('admin.data.users.users',['user' => $user->id]);
	}
	
	public function destroy(Request $request, Pendataan $pendataan)
	{


		$pendataan->delete();

		$request->session()->flash('pesan','Hapus data berhasil');
		return redirect()->route('admin.data.pendataan.pendataan');
	}
    	public function destroy2(Request $request, User $user)
	{
		$user->delete();
		$request->session()->flash('pesan','Hapus data berhasil');
		return redirect()->route('admin.data.users.users');
	}
	
	public function moving(Request $request, Pendataan $pendataan)
	{
		

		$nama = $pendataan->nama;
		$email = $pendataan->email;
		$ttl = $pendataan->ttl;
		$jenis_kelamin = $pendataan->jenis_kelamin;
		$alamat = $pendataan->alamat;
		$asal = $pendataan->asal;
		$tujuan = $pendataan->tujuan;
		$kepentingan = $pendataan->kepentingan;
		$keluhan = $pendataan->keluhan;
		$image = $pendataan->image;
		$sehat = $pendataan->keterangan_sehat;
		$pendataan->delete();

	
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$aa= substr(str_shuffle($permitted_chars), 0, 10);

		$user = new User();
		 
		$user->nama = $nama;
		$user->email = $email;
		$user->pass= $aa;
		$user->ttl = $ttl;
		$user->jenis_kelamin = $jenis_kelamin;
		$user->alamat = $alamat;
		$user->asal = $asal;
		$user->tujuan = $tujuan;
		$user->kepentingan = $kepentingan;
		$user->keluhan = $keluhan;
		$user->photo=$image;
		$user->keterangan_sehat = $sehat;
		$user->save();
		
		$to_name = $nama;
		$to_email = $email;
		$to_pass = $aa;
		$data = array('name'=>$to_name,'email'=>$to_email, "pass" => $to_pass);
			
		Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email, $to_pass) {
			$message->to($to_email, $to_name, $to_pass)
					->subject('Terimakasih Data Anda Sudah di Verifikasi');
			$message->from('tubeswebkelompok7@gmail.com','Anti-Covid-Covid-Club');
		});
		
		return redirect()->route('admin.data.pendataan.pendataan');
		
	
	}
	
	public function sendEmail(Request $request)
	{
		try{

			return redirect()->route('admin.data.index');
		}
		catch (Exception $e){
			return response (['status' => false,'errors' => $e->getMessage()]);
		}
	}
	
}
