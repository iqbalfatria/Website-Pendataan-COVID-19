<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index()
	{
		return view('login.login');
	}
	public function process(Request $request){
		$validateData = $request->validate([
		
			'email' => 'required',
			'pass' => 'required',
		]);
		
		$result2 = Admin::where('email', '=', $validateData['email'])->first();
		
		$result = User::where('email' , '=', $validateData['email'])->first();
		if($result2){
			if (($request->pass == $result2->pass))
			{
			session(['admin' => $request->email]);
			return redirect('admin/data/index');
			}
			else {
			return back()->withInput()->with('pesan',"Login Gagal");
			}
		}
		if($result){
			if (($request->pass == $result->pass))
			{
			session(['user' => $request->email]);
			return redirect()->route('user.data.index',['user' => $result]);
			//return redirect('user/data/index');
			}
			else {
			return back()->withInput()->with('pesan',"Login Gagal");
			}
		}
		else{
			return back()->withInput()->with('pesan',"Login Gagal");
			}
	}

		
	public function logout(Request $request){

		session()->forget('admin');
		session()->forget('user');
		return redirect('login')->with('pesan','Logout berhasil');
	}
}
