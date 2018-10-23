<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimoni;

class TestimoniController extends Controller
{
    //
    
    public function store(Request $request)
    {   
        $tambah = new testimoni;
        $tambah->nama = $request['nama'];
        $tambah->email = $request['email'];
        $tambah->isi = $request['isi'];
        $tambah->tanggal = date('Y-m-d');
        $tambah->save();
        return redirect()->to('/')->with('alert', 'Proses Simpan Berhasil!'); 

    }

    public function index()
    {
       
        $testi_list=Testimoni::all();
        return view('testimoni.index',compact('testi_list')); 
    }
    public function testimoni()
    {
        $testi_list=Testimoni::where('status','Tampil')->get();  

        return view('testimoni.testimoni', compact('testi_list')); 
    }
     public function aboutus()
    {
    
        return view('pagepel.aboutus'); 
    }
    public function destroy($id, Request $request)
    {
        $testi = Testimoni::findOrFail($id);
       
        $testi->delete();

        return redirect('index_testi')->with('message', 'Data berhasil dihapus!');
    } 
    public function update(Request $request, $id)
    {
        $update = Testimoni::where('id', $id)->first();
        
       
        $update->status = $request['status'];
   
        $update->update();
        return redirect()->to('index_testi')->with('alert2', 'Data Berhasil! Diubah');
    }
    public function index_karyawan()
    {
       
        $testi_list=Testimoni::all();
        return view('testimoni.index_karyawan',compact('testi_list')); 
    }
    public function destroy_karyawan($id, Request $request)
    {
        $testi = Testimoni::findOrFail($id);
       
        $testi->delete();

        return redirect('karyawan.index_testimoni')->with('message', 'Data berhasil dihapus!');
    }

    public function update_karyawan(Request $request, $id)
    {
        $update = Testimoni::where('id', $id)->first();
        
       
        $update->status = $request['status'];
   
        $update->update();
        return redirect()->to('karyawan.index_testimoni');
    }
}
