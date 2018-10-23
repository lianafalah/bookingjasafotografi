<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailPemesanan;
use App\Pemesanan;
use App\HasilEdit;
use DB;
use Auth;
use File;
use Storage;

class DetailPemesananController extends Controller
{
    public function create()
	{
		return view('detail_pemesanan.input_detail_pemesanan');
	}
	public function index_member()
	{
		$detailpemesanan_list = DetailPemesanan::leftJoin('Pemesanan', 'DetailPemesanan.id_pesan','=','Pemesanan.id_pesan')->select('DetailPemesanan.id_pesan','DetailPemesanan.status','DetailPemesanan.konfirmasi')
			->where('Pemesanan.id_member',auth('member')->user()->id_member)
		->get();

	
        $cek=DetailPemesanan::all();
        return view('detail_pemesanan.index_member',compact('detailpemesanan_list','cek')); 
	}
	public function UploadSubmit(Request $request)	 
	{
		$query = HasilEdit::where('id_pesan',$request['id_pesan']);
		$Pemesanan = Pemesanan::where('id_pesan',$request['id_pesan'])->first();
		// $Pemesan = Pemesanan::where('id_pesan',$request['id_pesan'])->first();
	if(is_null($Pemesanan)){
		// redirect()->back()->with('alert', 'Maaf dp yang anda inputkan salah')->withInput(Input::all());
		return redirect()->back()->with('alert7','maaf tidak terdapat dipesanan');
	}
	else{

		$detail = DetailPemesanan::where('id_pesan',$request['id_pesan'])->first();
		if(is_null($detail)){
		$files_to_delete = $query->pluck('filename')->toArray(); //keeping the result in a php
		$filename = HasilEdit::select('filename')->where('id_pesan',$request['id_pesan'])->first();
        $query->delete(); // For delete from database
		\File::delete($filename);
		if(Storage::delete($files_to_delete))
		{  
		$this->validate($request, [
		 
		'id_pesan' => 'required',
		'status' => 'required',
		'photos'=>'required',
		 
		]);
		 
		if($request->hasFile('photos'))
		 
		{
		 
		$allowedfileExtension=['pdf','jpg','png','docx'];
		 
		$files = $request->file('photos');
		 
		foreach($files as $file){
		 
		$filename = $file->getClientOriginalName();
		 
		$extension = $file->getClientOriginalExtension();
		 
		$check=in_array($extension,$allowedfileExtension);
		 
		//dd($check);
		 
		if($check)
		 
		{
		$items= DetailPemesanan::create($request->all());
		 
		 $Pemesanan->status = 'Proses Konfirmasi Hasil Edit';
		 $Pemesanan->update();
		foreach ($request->photos as $photo) {
		 
		$filename = $photo->store($request['id_pesan']);
		HasilEdit::create([
		 
		'id_pesan' => $items->id_pesan,
		'filename' => $filename
		]);
		}
		return redirect()->to('index_detailpemesanan')->with('alert', 'Proses Simpan Berhasil!'); 
		}
		else
			{
				echo 'wkwk';
					}
				}
			}	
		}
	}
		else{
			
			
        $files_to_delete = $query->pluck('filename')->toArray(); //keeping the result in a php
		$filename = HasilEdit::select('filename')->where('id_pesan',$request['id_pesan'])->first();
        $query->delete(); // For delete from database
		\File::delete($filename);
		if(Storage::delete($files_to_delete))
		{  
		$this->validate($request, [
		 
		'id_pesan' => 'required',
		'status' => 'required',
		'photos'=>'required',
		 
		]);
		 
		if($request->hasFile('photos'))
		 
		{
		 
		$allowedfileExtension=['pdf','jpg','png','docx'];
		 
		$files = $request->file('photos');
		 
		foreach($files as $file){
		 
		$filename = $file->getClientOriginalName();
		 
		$extension = $file->getClientOriginalExtension();
		 
		$check=in_array($extension,$allowedfileExtension);
		 
		//dd($check);
		 
		if($check)
		 
		{
			$update= DetailPemesanan::where('id_pesan',$request['id_pesan'])->first();
		$update->status = $request['status'];
        $update->update();

		
		 $Pemesanan->status = 'Proses Konfirmasi Hasil Edit';
		 $Pemesanan->update();
		foreach ($request->photos as $photo) {
		 
		$filename = $photo->store($request['id_pesan']);
		HasilEdit::create([
		 
		'id_pesan' => $request['id_pesan'],
		'filename' => $filename
		 
		]);
		 
		}
						return redirect()->to('index_detailpemesanan')->with('alert', 'Proses Simpan Berhasil!'); 
					}
					else
					{
					echo 'wkwk';
					}
				}
			}	 
		}	
		}	
	}
	}
	 public function update_member(Request $request, $id_pesan)
    {
        $update = DetailPemesanan::where('id_pesan', $id_pesan)->first();
        $Pemesanan = Pemesanan::where('id_pesan', $id_pesan)->first();
        
        $cek = $request['konfirmasi'];
        if($cek == 'Setuju')
        {
        $update->konfirmasi = $request['konfirmasi'];
        $update->keterangan = $request['keterangan'];
        $Pemesanan->status = 'Hasil Edit Selesai';
        $update->update();
        $Pemesanan->update();

        }
        else {
        $update->konfirmasi = $request['konfirmasi'];
        $update->keterangan = $request['keterangan'];
        $Pemesanan->status = 'Proses Konfirmasi Hasil Edit';
        $update->update();
        $Pemesanan->update();
        }
        return redirect()->to('index_detailpemesanan_member')->with('alert2', 'Data Berhasil! Diubah');
    }
    public function index()
    {          
    	$detailpemesanan_list= DetailPemesanan::groupBy('id_pesan','status','konfirmasi')->select('id_pesan','status','konfirmasi')->get();
        $cek=DetailPemesanan::all();
        return view('detail_pemesanan.index',compact('detailpemesanan_list')); 
    }
    public function show($id_pesan)
    {
        
        $depes = DetailPemesanan::Where('id_pesan',$id_pesan)->first();
        $depe = HasilEdit::Where('id_pesan',$id_pesan)->get();
        return view('detail_pemesanan.show', compact('depes','id_pesan','depe'));
    }
    public function show_member($id_pesan)
    {
       	$depes = DetailPemesanan::Where('id_pesan',$id_pesan)->first();
        $depe = HasilEdit::Where('id_pesan',$id_pesan)->get();

        return view('detail_pemesanan.show_member', compact('depes','id_pesan','depe'));
    }
    public function edit_member($id_pesan)
    {
       $depes = DetailPemesanan::Where('id_pesan',$id_pesan)->first();
        $depe = HasilEdit::Where('id_pesan',$id_pesan)->get();
        // dd($depe);
        return view('detail_pemesanan.edit_member', compact('depes','depe','id_pesan'));
    }
    
}
