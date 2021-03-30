<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pendataan;
use File;
class PendataanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$pendataans = pendataan::all()->toJson(JSON_PRETTY_PRINT);
		return response($pendataans, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$validateData = Validator::make($request->all(), [
			'nama' => 'required|min:4,unique:pendataans',
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
			if ($validateData->fails()) {
			return response($validateData->errors(), 400);
			}else{
			$mahasiswa = new pendataan();
			$mahasiswa->nama = $request->nama;
			$mahasiswa->ttl = $request->ttl;
			$mahasiswa->jenis_kelamin = $request->jenis_kelamin;
			$mahasiswa->alamat = $request->alamat;
			$mahasiswa->asal = $request->asal;
			$mahasiswa->tujuan = $request->tujuan;
			$mahasiswa->keluhan = $request->keluhan;
			$mahasiswa->kepentingan = $request->kepentingan;
			if($request->hasFile('image'))
			{
			$extFile = $request->image->getClientOriginalExtension();
			$namaFile = 'user-'.time().".".$extFile;
			$path = $request->image->move('assets/images',$namaFile);
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
			return response()->json([
			"message" => "pendataan record created"
			], 201);
			}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	if (pendataan::where('id', $id)->exists()) {
	$validateData = Validator::make($request->all(), [
			'nama' => 'required|min:4,unique:pendataans',
			'ttl' => 'required|min:3|max:50',
			'jenis_kelamin' => 'required',
			'alamat' => 'required',
			'asal' => 'required',
			'tujuan' => 'required',
			'keluhan' => 'required',
			'kepentingan' => 'required',
			'image' => 'file|image|max:1000',
			'sehat' => 'file|image|max:1000',
	]);
	if ($validateData->fails()) {
	return response($validateData->errors(), 400);
	}else{
	$mahasiswa = pendataan::find($id);
	$mahasiswa->nama = $request->nama;
	$mahasiswa->ttl = $request->ttl;
	$mahasiswa->jenis_kelamin = $request->jenis_kelamin;
	$mahasiswa->alamat = $request->alamat;
	$mahasiswa->asal = $request->asal;
	$mahasiswa->tujuan = $request->tujuan;
	$mahasiswa->keluhan = $request->keluhan;
	$mahasiswa->kepentingan = $request->kepentingan;
	if($request->hasFile('image'))
	{
	$extFile = $request->image->getClientOriginalExtension();
	$namaFile = 'user-'.time().".".$extFile;
	File::delete($mahasiswa->image);

	$path = $request->image->move('assets/images',$namaFile);

	$mahasiswa->image = $path;
	}
	if($request->hasFile('sehat'))
	{
	$extFile = $request->sehat->getClientOriginalExtension();
	$namaFile = 'user-'.time().".".$extFile;
	File::delete($mahasiswa->image);
	
	$path = $request->sehat->move('assets/images/suratsehat',$namaFile);
	
	$mahasiswa->keterangan_sehat = $path;
	}
	$mahasiswa->save();
	return response()->json([
	"message" => "Pendataan record updated"
	], 201);
	}
	} else {
	return response()->json([
	"message" => "Pendataan not found"
	], 404);
	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if (pendataan::where('id', $id)->exists()) {
		$mahasiswa = pendataan::find($id);
		File::delete($mahasiswa->image);
		File::delete($mahasiswa->sehat);
		$mahasiswa->delete();
		return response()->json([
		"message" => "student record deleted"
		], 201);
		} else {
		return response()->json([
		"message" => "Student not found"
		], 404);
		}
    }
}
