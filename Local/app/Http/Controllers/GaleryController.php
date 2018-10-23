<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Galery;
use AutoNumber;
use Alert;
class GaleryController extends Controller
{
    //
    public function create()
    {
        $id_galery = $this->getNumber();
        return view('galery.input_galery',compact('id_galery'));
    }
    
    public function getNumber(){
     $table="galery";
            $primary="id_galery";
            $prefix="GA";
            $id_galery=Autonumber::nextNumber($table,$primary,$prefix);
            return $id_galery;
    }
    public function store(Request $request)
    {   
        $tambah = new galery;

        $tambah->id_galery = $request['id_galery'];
        $tambah->nama_galery = $request['nama_galery'];
        $tambah->size = $request['size'];
        if($request['size'] == 'Potrait')
        {

        $tambah->style = 'height: 266px; with: auto;';
        }
        else if ($request['size'] == 'Landscape')
        {
        $tambah->style = 'height: 133px; with: auto;';

        }
        $tambah->tipe = $request['tipe'];
        $tambah->tanggal = $request['tanggal'];
        $tambah->status = $request['status'];
        $tambah->terbaru = $request['terbaru'];
        $tambah->slider = $request['slider'];
        $tambah->caption = $request['caption'];
        $file       = $request->file('gambar');
        $fileName   = $file->getClientOriginalName();
        $request->file('gambar')->move("upload/Galery/", $fileName);
        
        $tambah->gambar = $fileName;   
        $tambah->save();
        return redirect()->to('index_galery')->with('alert', 'Proses Simpan Berhasil!'); 
    }
    
    public function edit($id)
    {
        $galery = Galery::findOrFail($id);
        
        return view('galery.edit', compact('galery'));
    }

    public function edit_karyawan($id)
    {
        $galery = Galery::findOrFail($id);
        
        return view('galery.edit_karyawan', compact('galery'));
    }
    public function show($id)
    {
        $halaman ='galery';
        $galery = Galery::findOrFail($id);
        return view('galery.show', compact('halaman','galery'));
    }
    public function index()
    {
        dd('aaa');
        $galery_list=Galery::all();
        return view('galery.index',compact('galery_list')); 

    }
    public function destroy($id, Request $request)
    {
        $galery = Galery::findOrFail($id);
       
        $galery->delete();

        return redirect('index_galery')->with('message', 'Data berhasil dihapus!');
    }

    public function update(Request $request, $id)
    {
        $update = galery::where('id', $id)->first();
        $update->id_galery = $request['id_galery'];
        $update->nama_galery = $request['nama_galery'];
        $update->tipe = $request['tipe'];
        $update->tanggal = $request['tanggal'];
        $update->status = $request['status'];
        $update->terbaru = $request['terbaru'];
        $update->slider = $request['slider'];
        $update->caption = $request['caption'];
        if($request->file('gambar') == "")
        {
            $update->gambar = $update->gambar;
        } 
        else
        {
            $file       = $request->file('gambar');
            $fileName   = $file->getClientOriginalName();
            $request->file('gambar')->move("upload/Galery/", $fileName);
            $update->gambar = $fileName;
        }
        $update->update();
        return redirect()->to('index_galery')->with('alert2', 'Data Berhasil! Diubah');
    }
        public function wedding()
    {
        
        
        $galery_list=Galery::where('tipe','Wedding')->where('status','enable')->get();
        return view('galery.wedding',compact('galery_list')); 

    }
    public function prewedding()
    {   
        $galery_list=Galery::where('tipe','Prewedding')->where('status','enable')->get();
        
        return view('galery.prewedding',compact('galery_list')); 

    }
    public function foto_studio()
    {
        $galery_list=Galery::where('tipe','Foto Studio')->where('status','enable')->get();
       

        return view('galery.foto_studio',compact('galery_list','galery')); 

    }
    public function terbaru()
    {
        
        $galery_list=Galery::where('terbaru','Yes')->get();
        $slider=Galery::where('slider','Yes')->get();
        return view('pagepel.home',compact('galery_list','slider'));
        dd($galery_list); 

    }
    
}
