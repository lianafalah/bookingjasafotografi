<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use AutoNumber;
use PDF;
use Mail;
use Carbon\Carbon;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
class PaketController extends Controller
{
    
    public function create()
    {
        $id_paket = $this->getNumber();
        return view('paket.input_paket',compact('id_paket'));
    }
     public function create_email()
    {
       
        return view('paket.input_email');
    }
    public function show($id)
    {
        $halaman ='paket';
        $paket = Paket::findOrFail($id);
        return view('paket.show', compact('halaman','paket'));
    }
    public function getNumber(){

     $table="paket";
            $primary="id_paket";
            $prefix="PA";
            $id_paket=Autonumber::nextNumber($table,$primary,$prefix);
            return $id_paket;
    }
    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        return view('paket.edit', compact('paket'));
    }
    public function store(Request $request)
    {   
    	$cek = Paket::where('id_paket',$request['id_paket'])->first();

    	if(is_null($cek)){

        $tambah = new paket;
        $tambah->id_paket = $request['id_paket'];
        $tambah->nama_paket = $request['nama_paket'];
        $tambah->tipe = $request['tipe'];
      
        $tambah->harga_paket = $request['harga_paket'];
        $tambah->dp = $request['harga_paket'] * 50/100 ;
        $tambah->status = $request['status'];
        $tambah->keterangan = $request['keterangan'];
        $file       = $request->file('gambar');
        $file       = $request->file('gambar');
        $fileName   = $file->getClientOriginalName();
        $request->file('gambar')->move("upload/Paket/", $fileName);
        $tambah->gambar = $fileName;   
        $tambah->id_petugas = Auth::user()->id_petugas;
        
        $tambah->save();   
        return redirect()->to('index_paket')->with('alert', 'Proses Simpan Berhasil!');  
    	}
    	else{
        return redirect()->back()->with('alert0', 'Siliahkan Melakukan Input ulang')->withInput(Input::all());;

    	}
    }
    public function store_email(Request $request)
    {   
       $request -> validate([
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required'
       ])  ;
       $data = [
        'email' => $request->email,
        'subject' => $request->subject,
        'bodyMessage' => $request->message
       ];
       Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from('falahpujimarliana@gmail.com');
            $message->to($data['email']);
            $message->subject($data['subject']);
       });
       return redirect()->back();
    }
    public function index()
    {          
        $paket_list=Paket::all();
        return view('Paket.index',compact('paket_list')); 
    }
    
    public function viewPaket($tipe)
    {      

        if($tipe == 'wedding'){

            $paket_list = Paket::where('tipe','Wedding')->where('status','Enable')->get();
            return view('paket.paket',compact('paket_list','tipe')); 
        }
        elseif($tipe == 'outdoor') {
            $paket_list = Paket::where('tipe','Prewedding-Outdoor')->where('status','Enable')->get();
      
            return view('paket.paket_prewedding',compact('paket_list','tipe')); 
        }
        elseif($tipe == 'indoor') {
            $paket_list = Paket::where('nama_paket','LIKE','%'.$tipe.'%')
            ->where('nama_paket','LIKE','%'.$tipe.'%')->where('status','Enable')->get();
         
            return view('paket.paket_prewedding',compact('paket_list','tipe')); 
        }
        else{
            $paket_list = Paket::where('tipe','Foto Studio')->where('status','Enable')->get();
            return view('paket.paket',compact('paket_list','tipe')); 
            }
            
    }    
    public function viewPaketMember($tipe)
    {      
        $paket= Paket::where('tipe',$tipe)->where('status','Enable');
        
        if($tipe == 'wedding'){
            
            $paket_list = Paket::where('tipe','Wedding')->where('status','Enable')->get();
            return view('member.paket',compact('paket_list','tipe')); 
        }
        elseif($tipe == 'outdoor') {
            $paket_list = Paket::where('tipe','Prewedding-Outdoor')->where('status','Enable')->get();
            $paket = 'Prewedding-Outdoor';
      
            return view('member.paket_out',compact('paket_list','tipe','paket')); 
        }
        elseif($tipe == 'indoor') {
            $paket_list = Paket::where('tipe','Prewedding-Indoor')->where('status','Enable')->get();
            return view('member.paket',compact('paket_list','tipe')); 
        }
        else{
            $paket_list = Paket::where('tipe','Foto Studio')->where('status','Enable')->get();
            return view('member.paket',compact('paket_list','tipe')); 
            }
            
    }    

    public function destroy($id, Request $request)
    {
        $paket = Paket::findOrFail($id);
       
        $paket->delete();

        return redirect('index_paket')->with('message', 'Data berhasil dihapus!');
    }
    
    public function update(Request $request, $id)
    {
        $update = Paket::where('id', $id)->first();
        
        $update->id_paket = $request['id_paket'];
        $update->nama_paket = $request['nama_paket'];
        $update->tipe = $request['tipe'];

        $update->harga_paket = $request['harga_paket'];
        $update->dp = $request['dp'];
        $update->status = $request['status'];
        $update->keterangan = $request['keterangan'];
        if($request->file('gambar') == "")
        {
            $update->gambar = $update->gambar;
        } 
        else
        {
            $file       = $request->file('gambar');
            $fileName   = $file->getClientOriginalName();
            $request->file('gambar')->move("upload/Paket/", $fileName);
            $update->gambar = $fileName;
        }
        
        $update->update();
        return redirect()->to('index_paket')->with('alert2', 'Data Berhasil! Diubah');
    }
    
     public function makePDF(){
      $paket_list = Paket::all();

      $pdf = PDF::loadView('paket.pdf', compact('paket_list'));
      $pdf->setPaper('a4','potrait');
      return $pdf->stream();
      //dd($pdf);
      // return $pdf->download('invoice.pdf');

    }
    
}
