<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KonfirmasiPembayaran;
use App\Pelanggan;
use App\Pemesanan;
use App\Paket;
use App\Member;
use Carbon\Carbon;
use Mail;
use App\MailFile;
use PDF;
use Illuminate\Support\Facades\Input;
use Auth;
use App\History;


class KonfirmasiPembayaranController extends Controller
{
    //
    public function create()
    {
        return view('konfirmasipembayaran.input_pembayaran');
    }
    public function store(Request $request)
    {   

        $cek = KonfirmasiPembayaran::where('id_pesan',$request['id_pesan'])->first();

        if(is_null($cek)){
        
        $pemesanan=Pemesanan::where('id_pesan',$request['id_pesan'])->first();
        if(is_null($pemesanan)){
            return redirect()->back()->with('alert8', 'Pemesanan Tidak tersedia');
             }
           else {
        
            $ambil= $pemesanan->created_at;
            $id_paket= $pemesanan->id_paket;
            $paket = Paket::where('id_paket',$id_paket)->first();
            $dpe = $paket->dp; 
            if ( $request['nominal'] >= $dpe)
            {

            $dt = Carbon::parse($ambil);
            $testedTime = $dt->timestamp;
            $currentTime = time();
          
            $hasil= $currentTime - $testedTime;
            
            if($currentTime - $testedTime > 3600) {
                    $tambah = new konfirmasipembayaran;

                    $tambah->id_pesan = $request['id_pesan'];
                    $tambah->nama = $request['nama'];
                    $tambah->nama_bank = $request['nama_bank'];
                    $tambah->no_rekening = $request['no_rekening'];
                    $tambah->nominal = $request['nominal'];
                    $tambah->tanggal = $request['tanggal'];
                    $tambah->status = 'Expired';
                    $file       = $request->file('foto_bukti');
                    $fileName   = $file->getClientOriginalName();
                    $request->file('foto_bukti')->move("upload/Bukti_transfer/", $fileName);
                    $tambah->foto_bukti = $fileName;   
                    $tambah->save();
                  
                    $pemesanan->status = 'Tolak';
                    $pemesanan->update();
                     return view('konfirmasipembayaran.tolak', compact('pemesanan'));
                } else{
                    $tambah = new konfirmasipembayaran;

                    $tambah->id_pesan = $request['id_pesan'];
                    $tambah->nama = $request['nama'];
                    $tambah->nama_bank = $request['nama_bank'];
                    $tambah->no_rekening = $request['no_rekening'];
                    $tambah->nominal = $request['nominal'];
                    $tambah->tanggal = $request['tanggal'];
                    $file       = $request->file('foto_bukti');
                    $fileName   = $file->getClientOriginalName();
                    $request->file('foto_bukti')->move("upload/Bukti_transfer/", $fileName);
                    $tambah->foto_bukti = $fileName;   
                    $pembayaran=konfirmasipembayaran::where('id_pesan',$request['id_pesan'])->first();
                    $pesan = Pemesanan::where('id_pesan',$request['id_pesan'])->first();
                    $id_member = $pesan->id_member;
                    $member = Member::where('id_member',$id_member)->first();
                    $email = $member->email;
                    $id_paket = Pemesanan::select('pemesanan.id_paket')->where('id_pesan',$request['id_pesan'])->first();
                    
                    $tipe = $paket->tipe;
                    $dp = $paket->dp;
                    $harga = $paket->harga;
                    $tambah->save();
                    // dd('njknjn');
                        return redirect()->back()->with('alert0', 'Konfirmasi Pembayaran Berhasil');
                       
                }
                
            }
            else{
                return redirect()->back()->with('alert', 'Maaf dp yang anda inputkan salah')->withInput(Input::all());
            }
        }
    }

       else{
        return redirect()->back()->with('alert9', 'Konfirmasi Pembayaran Sudah Dilakukan');

        }
        
    }
    public function index()
    {
        $pemesanan_list = Pemesanan::leftJoin('paket','pemesanan.id_paket','paket.id_paket')->get();
        $konfirmasipembayaran_list = KonfirmasiPembayaran::all();
        return view('konfirmasipembayaran.index', compact('konfirmasipembayaran_list'));
    }
    public function index_after()
    {
        $pemesanan_list = Pemesanan::leftJoin('paket','pemesanan.id_paket','paket.id_paket')->get();
        $konfirmasipembayaran_list = KonfirmasiPembayaran::all();
        return view('konfirmasipembayaran.index_after', compact('konfirmasipembayaran_list'));
    }
    public function update(Request $request, $id_pesan)
    {
        $add = Pemesanan::where('id_pesan',$id_pesan)->first();

        $id_paket = $add->id_paket; 
        
        $paket = Paket::where('id_paket',$id_paket)->first();
        $harga = $paket->harga_paket;

        $konfirmasipembayaran = KonfirmasiPembayaran::where('id_pesan', $id_pesan)->first();
        $nominal=$konfirmasipembayaran->nominal;
            
                $id_member = $add->id_member;
                $member = Member::where('id_member',$id_member)->first();
                $email = $member->email;
                $dp = $paket->dp;
              
        $update = KonfirmasiPembayaran::where('id_pesan', $id_pesan)->first();
        $update->status = $request['status'];
        if($request['status'] =='Sudah Bayar')
        {
            $add->sisa= $harga - $nominal;
            $add->status='Proses';
            $add->update();
                 $pdf = PDF::loadView('konfirmasipembayaran.info', compact('add','member','id_member','konfirmasipembayaran','paket'));
                $pdf->setPaper('a4','potrait');
                    $pdf->save(storage_path('excel/konfirmasipembayaran') . '/'.$request['id_pesan'].'.pdf');
                    $urlPDF = asset('Local/storage/excel/konfirmasipembayaran/'.$request['id_pesan'].'.pdf');
                 $request->session()->put('urlPDF', $urlPDF);  
                 
            $update->update();
                
                   $data =  [

                    'email' => $email,
                    'subject' => 'Konfirmasi Pembayaran',
                    'bodyMessage' =>'',
                    'url' => $urlPDF
                    ];
                     Mail::send('emails.contact', $data, function($message) use ($data)
                {
                    $message->to($data['email']);
                    $message->subject($data['subject']);
                    $message->from('falahpujimarliana@gmail.com');
                    $message->attach($data['url']);
                  
                });


            return redirect()->to('index_pembayaran')->with('alert3', 'Konfirmasi Berhasil');
        }
        else{
            $update->update();
            return redirect()->to('index_pembayaran')->with('alert2', 'Data Berhasil! Diubah')
            ;
        }
    }
    public function update2(Request $request, $id_pesan)
    {
        
        $konfirmasipembayaran = KonfirmasiPembayaran::where('id_pesan',$request['id_pesan'])->first();
         $add = Pemesanan::where('id_pesan',$id_pesan)->first();
          $id_paket = $add->id_paket; 
          $id_member = $add->id_member;
                $member = Member::where('id_member',$id_member)->first();
                $email = $member->email;
                $paket = Paket::where('id_paket',$id_paket)->first();
                $dp = $paket->dp;
                $harga_paket = $paket->harga_paket;
                $nama_paket = $paket->nama_paket;
        $harga = $paket->harga_paket;
        if($request['status'] =='Sudah Bayar')
        {
            $konfirmasipembayaran->status = $request['status'];
            $konfirmasipembayaran->nominal = $request['nominal'];
            $konfirmasipembayaran->id_petugas = Auth::user()->id_petugas;
            $konfirmasipembayaran->update();
            $add->sisa= $harga - $request['nominal'];
            $add->status='Proses';
            $add->update();
                 $pdf = PDF::loadView('konfirmasipembayaran.info', compact('add','member','id_member','konfirmasipembayaran','paket'));
                $pdf->setPaper('a4','potrait');
                     $pdf->save(storage_path('excel/konfirmasipembayaran') . '/'.$request['id_pesan'].'.pdf');
                    $urlPDF = asset('Local/storage/excel/konfirmasipembayaran/'.$request['id_pesan'].'.pdf');
                 $request->session()->put('urlPDF', $urlPDF);  
                 
            
                
                   $data =  [

                    'email' => $email,
                    'subject' => 'Konfirmasi Pembayaran',
                    'bodyMessage' =>'',
                    'url' => $urlPDF
                    ];
                     Mail::send('emails.contact', $data, function($message) use ($data)
                {
                    $message->to($data['email']);
                    $message->subject($data['subject']);
                    $message->from('falahpujimarliana@gmail.com','Star Photo & Printing');
                    $message->attach($data['url']);
                  
                });
                       $sim = new History;
            $sim->id_pesan= $request['id_pesan'];
            $sim->id_petugas= Auth::user()->id_petugas;
            $sim->status= $request['status'];
            $sim->nominal=$request['nominal'];
            $sim->tanggal= date('Y-m-d');
            $sim->save();

            return redirect()->to('index_pembayaran_after')->with('alert3', 'Konfirmasi Berhasil');
      }

      else if($request['status'] =='Lunas')
      {
            if($request['nominal'] == $harga_paket) {
            $konfirmasipembayaran->status = $request['status'];
            $konfirmasipembayaran->nominal = $request['nominal'];
            $konfirmasipembayaran->id_petugas = Auth::user()->id_petugas;
            $konfirmasipembayaran->update();
            $add->sisa= $harga - $request['nominal'];
            $add->status='Proses';
            $add->update();
                 $pdf = PDF::loadView('konfirmasipembayaran.info', compact('add','member','id_member','konfirmasipembayaran','paket'));
                $pdf->setPaper('a4','potrait');
                     $pdf->save(storage_path('excel/konfirmasipembayaran') . '/'.$request['id_pesan'].'lunas'.'.pdf');
                    $urlPDF = asset('Local/storage/excel/konfirmasipembayaran/'.$request['id_pesan'].'lunas'.'.pdf');
                 $request->session()->put('urlPDF', $urlPDF);  
                
                   $data =  [

                    'email' => $email,
                    'subject' => 'Konfirmasi Pembayaran',
                    'bodyMessage' =>'',
                    'url' => $urlPDF
                    ];
                     Mail::send('emails.contact', $data, function($message) use ($data)
                {
                    $message->to($data['email']);
                    $message->subject($data['subject']);
                    $message->from('falahpujimarliana@gmail.com');
                    $message->attach($data['url']);
                  
                });
            }
                 else{
                    return redirect()->back()->with('alert10', 'Nominal tidak sama dengan Harga Paket');
                 }

              $sim = new History;
            $sim->id_pesan= $request['id_pesan'];
            $sim->id_petugas= Auth::user()->id_petugas;
            $sim->status= $request['status'];
            $sim->nominal=$request['nominal'];
            $sim->tanggal= date('Y-m-d');
            $sim->save();

            return redirect()->to('index_pembayaran_after')->with('alert3', 'Konfirmasi Berhasil');
        }
          
        
    }
    public function history(){
        $history = History::all();
        return view('history.index', compact('history'));
    }
    public function show($id_pesan) 
    {
        $konfirmasipembayaran = KonfirmasiPembayaran::where('id_pesan',$id_pesan)->first();
        return view('konfirmasipembayaran.show', compact('konfirmasipembayaran'));
    }
    public function destroy($id_pesan)
    {
        $pembayaran = KonfirmasiPembayaran::where('id_pesan',$id_pesan);  
        $pembayaran->delete();
        return redirect('index_pembayaran')->with('message', 'Data berhasil dihapus!');
    }
    public function edit(Request $request, $id_pesan)
    {
        $konfirmasipembayaran = KonfirmasiPembayaran::where('id_pesan',$request['id_pesan'])->first();
        
        return view('konfirmasipembayaran.edit', compact('konfirmasipembayaran'));
    }
    

}
