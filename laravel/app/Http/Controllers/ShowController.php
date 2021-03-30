<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowController extends Controller
{
	 public function tentang()
	{
	$data['module']['name'] = "Beranda";
	return view('tentang.tentang',['data' => $data]);
	}

    public function hubungi()
	{
	$data['module']['name'] = "Beranda";
	return view('hubungi.hubungi',['data' => $data]);
	}
}
