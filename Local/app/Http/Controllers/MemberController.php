<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Member;
use Redirect;
use Validator;
use Alert;
use Hash;
use AutoNumber;
use Kode_member;
use Mail;
use App\MailFile;
class MemberController extends Controller
{
     public function getNumber()
    {
        $table="member";
        $primary="id_member";
        $prefix="MR";
        $prefix_length=2;
        $id_member=Kode_member::nextNumber($table,$primary,$prefix,$prefix_length);
        return $id_member;

    }
    public function login(Request $request)
    {
    if (Auth::guard('member')->attempt(
            $request->only('email', 'password'), $request->has('remember') ))
        {
            if(Auth::guard('member')->user()->status =='Aktif'){

                return redirect()->route('homemember');
            }
            else{
                return redirect()->back()->with('alert12', 'Blm Aktif');   
            }
        
        }
    else {
        return redirect()->back()->with('alert1', 'Maaf password yang anda masukan salah');   
    	}
	}
     public function login_page()
 	{
  		return view('member.loginmember');
 	}
    public function register()
    {   
        $id_member = $this->getNumber();
        return view('member.registermember',compact('id_member'));
    }
 	public function homemember()
 	{   
    	return view('member.home');
 	}
 	public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect()->route('member.login');
    	}
    public function store(Request $request) 
    {   
        $tambah = new member;
        $tambah->id_member = $request['id_member'];
        $tambah->nama = $request['nama'];
        $tambah->alamat = $request['alamat'];
        $tambah->email = $request['email'];
        $tambah->no_telp = $request['no_telp'];
        $tambah->gambar = $request['gambar'];
        $tambah->password = bcrypt($request['password']);
        $tambah->status = 'Tidak Aktif';
        // dd($request['email']);
         $data =  [

                    'email' => $request['email'],
                    'subject' => 'Verify your account!',
                    'bodyMessage' =>$request['id_member'],
                    'id_member' =>$request['id_member'],
                    'nama' =>$request['nama']
                    ];
        Mail::send('emails.aktif', $data, function($message) use ($data) 
                {
                    $message->to($data['email']);
                    $message->subject($data['subject']);
                    $message->from('falahpujimarliana@gmail.com','Star Photo & Printing');
                });

        
        
        $tambah->save();
        // $tambah->save();
        return redirect()->to('member/login')->with('alert2', 'Proses Simpan Berhasil!'); 
    }
    public function update($id, Request $request)
    {
        $update = Member::where('id', $id)->first();
        $current_password = auth()->guard('member')->user()->password;

        $update->nama = $request['nama'];
        $update->email = $request['email'];
        if(Hash::check($request['current_password'], $current_password))//untuk memecah password yang di lock
        {
            $update->password = Hash::make($request['password']); // untuk membuat lock password
            $update->update();               
        }
        if($request->file('gambar') == "")
        {
            $update->gambar = $update->gambar;
        } 
        else
        {
            $file       = $request->file('gambar');
            $fileName   = $file->getClientOriginalName();
            $request->file('gambar')->move("upload/gambar/", $fileName);
            $update->gambar = $fileName;
        }
        $update->update();
        return redirect()->to('/homemember')->with('alert3', 'Data Berhasil! Diubah');
    }
    
    public function edit($id)
    {
        $user = Member::where('id',$id);
        return view('member.edit', compact('user'));
    }
    public function edit_email($id_member)
    {
        $user = Member::where('id_member',$id_member)->first();
        $user->status = 'Aktif';
        $user->update();
   
         return redirect()->to('member/login')->with('alert9', 'thx');
    }
    // public function index(){
    //     $member_list = Member::all();
    //     return view('member.index', compact('member_list'));
    // }
	

}