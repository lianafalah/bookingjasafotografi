<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\User;
use Validator;
use Auth;
use redirect;
use Illuminate\Support\Facades\Hash;
use AutoNumber;
// use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class UsersController extends Controller
{
    //
    public function getNumber(){

     $table="users";
            $primary="id_petugas";
            $prefix="PP";
            $id_petugas=Autonumber::nextNumber($table,$primary,$prefix);
            return $id_petugas;
    }
    public function index()
    {
        $user_list=User::all();
        return view('users.index',compact('user_list')); 
    }
    
    public function create()
    {
        $id_petugas = $this->getNumber();
        return view('users.input',compact('id_petugas'));
    
    }
    public function store(Request $request)
    {   
        $tambah = new User;

        $tambah->name = $request['name'];
        $tambah->id_petugas = $request['id_petugas'];
        $tambah->email = $request['email'];
        $tambah->password = bcrypt($request['password']);
        $tambah->jabatan = $request['jabatan'];
        $tambah->no_telp = $request['no_telp'];
        $tambah->alamat = $request['alamat'];  
        $tambah->gambar = $request['gambar'];  
        $tambah->save();
        return redirect()->to('index_user')->with('alert', 'Proses Simpan Berhasil!');  
    }
    public function show($id)
    {
   
        $user = User::where('id',$id)->first();
        return view('users.show', compact('user'));
    }
    public function update($id, Request $request)
    {

        $update = User::where('id', $id)->first();
        $current_password = Auth::user()->password;
        // $ll = Hash::make($request['password']);
        // $kk = bcrypt($ll);
        // dd($kk);
        $update->name = $request['name'];
        $update->id_petugas = $request['id_petugas'];
        $update->email = $request['email'];
        $update->jabatan = $request['jabatan'];


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
        return redirect()->to('/home')->with('alert2', 'Data Berhasil! Diubah');
    }
    
    public function edit($id)
    {

    	$user = User::where('id',$id);
        return view('users.edit', compact('user'));
    }
   
    public function destroy($id, Request $request)
    {
        $user = User::findOrFail($id);
       
        $user->delete();

        return redirect('index_user')->with('message', 'Data berhasil dihapus!');
    }
      public function makePDF(){
      $user_list = User::all();

      $pdf = PDF::loadView('users.pdf', compact('user_list'));
      $pdf->setPaper('a4','potrait');
      return $pdf->stream();
      //dd($pdf);
      // return $pdf->download('invoice.pdf');
    }
}
