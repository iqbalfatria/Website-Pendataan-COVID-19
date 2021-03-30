<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pendataan;
use App\User;
use File;
use Mail;

class UserDataController extends Controller
{
	
	
	public function create()
	{
	$data['module']['name'] = "Beranda";
	return view('user.data.index',['data' => $data]);
	}
	
	public function store(Request $request)
	{
		$validateData = $request->validate([
		'nama' => 'required|min:4,unique:pendataans',
		'ttl' => 'required|min:3|max:50',
		'jenis_kelamin' => 'required|in:P,L',
		'alamat' => 'required',
		'asal' => '',
		'tujuan' => '',
		'kepentingan' => '',
		'keluhan' => '',
		'photo' => 'file|image|max:1000',
		'sehat' => 'file|image|max:1000',
		]);
		$mahasiswa = new user();
		$mahasiswa->nama = $validateData['nama'];
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
		return redirect()->route('user.data.index');
	}

	public function index($pendataan_id)
	{
		$mahasiswas = User::findOrFail($pendataan_id);

		return view('user.data.index',['user' => $mahasiswas]);
	}
	
	public function show($pendataan_id)
	{
		$aa= substr(str_shuffle($pendataan_id), 0, 10);
		$result = User::findOrFail($pendataan_id);
		
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		
		return view('user.data.show',['user' => $result]);
	}
	public function edit($pendataan_id)
	{
		$result = User::findOrFail($pendataan_id);
		return view('user.data.edit',['user' => $result]);
	}
    public function update(Request $request, User $user)
	{
		$validateData = $request->validate([
		'nama' => 'required|min:5',
		'email'=> 'required|email|min:2|unique:pendataans',
        'pass' => 'required|min:5',
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
		return redirect()->route('user.data.index',['user' => $user->id]);
	}
	
	public function destroy(Request $request, User $user)
	{
		$pendataan->delete();
		$request->session()->flash('pesan','Hapus data berhasil');
		return redirect()->route('user.data.index');
	}
	
	public function moving(Request $request, User $user)
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
		//$pendataan->delete();

	
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
		
		return redirect()->route('user.data.index');
		
	
	}
	
	public function sendEmail(Request $request)
	{
		try{

			return redirect()->route('user.data.index');
		}
		catch (Exception $e){
			return response (['status' => false,'errors' => $e->getMessage()]);
		}
	}
}
