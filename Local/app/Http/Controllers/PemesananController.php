<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pemesanan;
use App\Paket;
use App\Member;
use App\Pelanggan;
use App\KonfirmasiPembayaran;
use PDF;
use AutoNumber;
use Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Kode_pemesanan;

class PemesananController extends Controller
{
    //
    public function getNumber()
    {
        $table="pemesanan";
        $primary="id_pesan";
        $prefix="PM";
        $prefix_length=2;
        $id_pesan=Kode_pemesanan::nextNumber($table,$primary,$prefix,$prefix_length);
        return $id_pesan;
    }
    public function create(Request $request)
    {   
        if ($request->date) {
            $request->session()->put('tglfoto',$request->date);
            $request->session()->put('id_paket',$request->id_paket);
            return response()->json([
                'success' => true
            ]);
        } else {
            $id_pesan = $this->getNumber();
            $paket = Paket::where('id_paket',$request->session()->get('id_paket'))->first();
            $id_paket = $request->session()->get('id_paket');
            $tglfoto = $request->session()->get('tglfoto');
            $tipe = $paket->tipe;
            if($tipe == 'Wedding'){
         
            $cek = Pemesanan::leftJoin('paket','pemesanan.id_paket','paket.id_paket')->where('paket.tipe','Wedding')->where('pemesanan.tanggal_foto', $tglfoto)->count('id_pesan');
            
                if ( $cek < 2){
                    return view('pemesanan.input_pemesanan', compact('paket','id_pesan'));
                }
                else {
                    return redirect()->back()->with('alert', 'Maaf Pemesanan Sudah Penuh');
                }
            }
            elseif ($tipe == 'Prewedding') {
            $cek = Pemesanan::leftJoin('paket','pemesanan.id_paket','paket.id_paket')->where('paket.tipe','Prewedding')->where('pemesanan.tanggal_foto', $tglfoto)->count('id_pesan');
                if ( $cek <= 4){
                    return view('pemesanan.input_pemesanan', compact('paket','id_pesan'));
                }
                else {
                    return redirect()->back()->with('alert', 'Maaf Pemesanan Sudah Penuh');
                }
            }
            else{
            return view('pemesanan.input_pemesanan', compact('paket','id_pesan'));
            }
        }
    }
    public function pilih_tanggal($id_paket)
    {
        $pemesanans = Pemesanan::select(['pemesanan.id','pemesanan.id_pesan','pemesanan.status','pemesanan.created_at','paket.tipe']);
        $pemesanans->leftJoin('paket','pemesanan.id_paket','=','paket.id_paket');
        $pemesanans = $pemesanans->get();

        foreach ($pemesanans as $pemesanan) {
            if (!$pemesanan->konfirmasi) {
                if (Carbon::parse($pemesanan->created_at)->addHour() < Carbon::now()) {
                    $data = Pemesanan::find($pemesanan->id);
                    $data->status = 'Tolak';
                    $data->update();
                }
            }
        }
        $paket = Paket::where('id_paket', $id_paket)->first();
        $tipe=$paket->tipe;   
        $pemesanans = Pemesanan::leftJoin('paket','pemesanan.id_paket','paket.id_paket')->where('tipe',$tipe)->where('pemesanan.status','!=','Tolak')->where('tanggal_foto','>=',date('Y-m-d'))->get();
        return view('calendar', compact('pemesanans','id_paket','tipe'));
    }
    public function pilih_tanggal_member($id_paket)
    {
            $pemesanans = Pemesanan::select(['pemesanan.id','pemesanan.id_pesan','pemesanan.status','pemesanan.created_at','paket.tipe']);
        $pemesanans->leftJoin('paket','pemesanan.id_paket','=','paket.id_paket');
        $pemesanans = $pemesanans->get();

        foreach ($pemesanans as $pemesanan) {
            if (!$pemesanan->konfirmasi) {
                if (Carbon::parse($pemesanan->created_at)->addHour() < Carbon::now()) {
                    $data = Pemesanan::find($pemesanan->id);
                    $data->status = 'Tolak';
                    $data->update();
                }
            }
        }
        $paket = Paket::where('id_paket', $id_paket)->first();
        $tipe=$paket->tipe;
        
        $pemesanans = Pemesanan::leftJoin('paket','pemesanan.id_paket','paket.id_paket')->where('tipe',$tipe)->where('pemesanan.status','!=','Tolak')->where('tanggal_foto','>=',date('Y-m-d'))->get();
        
         $id_pesan = $this->getNumber();
         if($tipe == 'Foto Studio'){


        return view('calendar.calendarmember', compact('pemesanans','id_paket','tipe','id_pesan','paket'));
        }
        else if($tipe == 'Prewedding-Outdoor')
        {
            
          return view('calendar.calendar_prewedd', compact('pemesanans','id_paket','tipe','id_pesan','paket'));
        }
        else if($tipe == 'Prewedding-Indoor')
        {
            
          return view('calendar.calendar_preweddig', compact('pemesanans','id_paket','tipe','id_pesan','paket'));
        }
        else{
        return view('calendar.calendarmember_wedding', compact('pemesanans','id_paket','tipe','id_pesan','paket'));

        }

    }
    public function index()
    {
        $pemesanans = Pemesanan::select(['pemesanan.id','pemesanan.id_pesan','pemesanan.status','pemesanan.created_at','paket.tipe']);
        $pemesanans->leftJoin('paket','pemesanan.id_paket','=','paket.id_paket');
        $pemesanans = $pemesanans->get();
        foreach ($pemesanans as $pemesanan) {
            if (!$pemesanan->konfirmasi) {
                if (Carbon::parse($pemesanan->created_at)->addHour() < Carbon::now()) {
                    $data = Pemesanan::find($pemesanan->id);
                    $data->status = 'Tolak';
                    $data->update();
                }
            }
        }

        $pemesanans = Pemesanan::all();
        
        
        return view('pemesanan.index', compact('pemesanans'));
    }
    public function index_admin()
    {
        $pemesanans = Pemesanan::select(['pemesanan.id','pemesanan.id_pesan','pemesanan.status','pemesanan.created_at','paket.tipe']);
        $pemesanans->leftJoin('paket','pemesanan.id_paket','=','paket.id_paket');
        $pemesanans = $pemesanans->get();
        foreach ($pemesanans as $pemesanan) {
            if (!$pemesanan->konfirmasi) {
                if (Carbon::parse($pemesanan->created_at)->addHour() < Carbon::now()) {
                    $data = Pemesanan::find($pemesanan->id);
                    $data->status = 'Tolak';
                    $data->update();
                }
            }
        }

        $pemesanans = Pemesanan::all();
        
        
        return view('pemesanan.index_admin', compact('pemesanans'));
    }
    public function harian()
    {
        $pemesanans = Pemesanan::select(['pemesanan.id','pemesanan.id_pesan','pemesanan.status','pemesanan.created_at','paket.tipe']);
        $pemesanans->leftJoin('paket','pemesanan.id_paket','=','paket.id_paket');
        $pemesanans = $pemesanans->get();

        foreach ($pemesanans as $pemesanan) {
            if (!$pemesanan->konfirmasi) {
                if (Carbon::parse($pemesanan->created_at)->addHour() < Carbon::now()) {
                    $data = Pemesanan::find($pemesanan->id);
                    $data->status = 'Tolak';
                    $data->update();
                }
            }
        }
        $pemesanans = Pemesanan::where('tanggal_foto',date('Y-m-d'))->orderBy('pukul','ASC')->get();

        return view('pemesanan.harian', compact('pemesanans'));
    }
    protected function getData($awal, $akhir){
        $no = 0;
        $data = array();
        $pendapatan = 0;
        $total_pendapatan= 0;
        while(strtotime($awal) <= strtotime($akhir)){
            $tangal = $awal;
            $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));
            $total_pemesanan = Pemesanan::where('create at','LIKE',"$tangal%")->sum('harga');
        }
    }
    public function listData($awal, $akhir)
    {
        $data = $this-> getData ($awal, $akhir);
        $output = array("data" => $data);
        return response()->json($output);
    }
    public function refresh(Request $request)
    {
        $awal = $request['awal'];
        $akhir = $request['akhir'];
        return view('pemesanan.index',compact('awal','akhir'));
    }
    public function exportPDF($awal, $akhir)
    {
        $tanggal_awal = $awal;
        $tanggal_akhir = $akhir;
        $data = $this->getData($awal, $akhir);

        $pdf = PDF::loadView('laporan.pdf', compact('tanggal_awal','tanggal_akhir','data'));
        $pdf->setPaper('a4','potrait');
        return $pdf->stream();
    }
    public function rekap_pemesanan()
    {}
    public function update(Request $request, $id_pesan)
    {
        if ($request['status'] == 'Tolak'){
            return redirect()->back()->with('alert3', 'tolak');
        }
        else
        {

            $tanggal_ambil = Carbon::parse($request['tanggal_ambil'])->format('Y-m-d');
   
            if ($request['tanggal_ambil'] <= $request['tanggal_now'] )
            {
               
                     return redirect()->back()->with('alert1', 'Maaf tanggal yang diinputkan salah');
            }
            else {
               $update = Pemesanan::where('id_pesan', $id_pesan)->first();
                // $id_member = auth()->guard('member')->user()->id_member;
                // $member = Member::where('id_member', $id_member)->first();
                $update->status = $request['status'];
                $update->status = $request['tanggal_foto'];
                $update->tanggal_ambil = $tanggal_ambil;
                if($request['status'] =='Selesai')
                {
                    $update->update();
                }
                else{
                    $update->update();
                    return redirect()->to('index_pemesanan')->with('alert2', 'Data Berhasil! Diubah');
                }
            }
        }
    }
     public function update_admin(Request $request, $id_pesan)
    {
        $id_paket=Pemesanan::where('id_pesan',$request['id_pesan'])->first();
        $ss = $id_paket->id_paket;
         $paket= Paket::where('id_paket',$ss)->first();
        $tipe=$paket->tipe;
        if ($request['status'] == 'Tolak'){
            return redirect()->back()->with('alert3', 'tolak');
        }
        else
        {
                            
                $update = Pemesanan::where('id_pesan', $id_pesan)->first();
           
             $coba = Carbon::parse($request['pukul'])->addHour()->format('H:i');
            $cobas = Carbon::parse($request['tanggal_foto'])->format('Y-m-d');
            $jam = date('Y-m-d') ."/". $coba;
            $coba2 = Carbon::parse($request['pukul'])->subHour()->format('H:i');
            $hari=Pemesanan::where('tanggal_foto', $cobas)
                ->where('pukul','>=',$coba2)
                ->where('pukul','<=',$coba)
                ->leftJoin('paket','pemesanan.id_paket','paket.id_paket')->where('tipe',$tipe)
                ->count();
            if($hari < 1 ) 
            {   

                $update->status = $request['status'];
                $update->tanggal_foto = $request['tanggal_foto'];
                $update->pukul = $request['pukul'];

                $update->update();

                 return redirect()->to('index_pemesanan_admin')->with('alert2', 'Data Berhasil! Diubah');
                    
                }

                else{
                      return redirect()->back()->with('alert8', 'Ada Pemesanan Lain');
                }
            
        }
    }
    public function store(Request $request)
    {     
       $paket= Paket::where('id_paket',$request['id_paket'])->first();
        $tipe=$paket->tipe;
      if($tipe == 'Foto Studio'){
        if ($request['pukul'] >='21:00' or $request['pukul'] <= '09:00')
        {
            return redirect()->back()->with('alert4', 'Maaf tutup')
            ->withInput(Input::all());
        }
        else{
            $coba = Carbon::parse($request['pukul'])->addHour()->format('H:i');
            $cobas = Carbon::parse($request['tanggal_foto'])->format('Y-m-d');
            $jam = date('Y-m-d') ."/". $coba;
            $coba2 = Carbon::parse($request['pukul'])->subHour()->format('H:i');
            $hari=Pemesanan::where('tanggal_foto', $cobas)
                ->where('pukul','>=',$coba2)
                ->where('pukul','<=',$coba)
                ->leftJoin('paket','pemesanan.id_paket','paket.id_paket')->where('tipe',$tipe)
                ->count();
                
            if($hari < 1 ) 
            {   
                $tambah = new Pemesanan;
                $paket= Paket::where('id_paket',$request['id_paket'])->first();
                $tambah->id_pesan = $request['id_pesan']; 
                $tambah->id_paket = $request['id_paket'];
                $tambah->id_member = auth()->guard('member')->user()->id_member;
                $tambah->tanggal_foto = $cobas;
                $tambah->tanggal_pesan = date('Y-m-d') ;
                $tambah->pukul = $request['pukul'];
                
                // $tambah->sisa = $request['sisa'];
                $tambah->status = 'Menunggu';
                $tambah->save();
                
                    $dp=$paket->dp;
                    $pemesanan= Pemesanan::where('id_pesan',$request['id_pesan'])->first();
                    $ca = $pemesanan->created_at;
                    $cb = $ca->addHour();

                    $member=Member::where('id_member',auth()->guard('member')->user()->id_member)->first();
                    
                    $pdf = PDF::loadView('pemesanan.pemberitahuanwedding', compact('pemesanan','member','paket','coba','jam','cb'));
                    $pdf->setPaper('a4','potrait');
                    $pdf->save(storage_path('excel/exports') . '/'.$request['id_pesan'].'.pdf');
                    $urlPDF = asset('Local/storage/excel/exports/'.$request['id_pesan'].'.pdf');
                    $request->session()->put('urlPDF', $urlPDF);
                    return view('member.is')->with('alert4','Data pemesanan berhasil disimpan');
                    // session(['urlpdf' => $urlPDF]);
                    // return  $pdf->download($request['id_pesan']);
            }
            else{
                return redirect()->back()->with('alert', 'Maaf Pemesanan Sudah Tersedia')->withInput(Input::all());
                }
            }
          }
            else if($tipe == 'Wedding'){
            $coba = Carbon::parse($request['pukul'])->addHour()->format('H:i');
            $coba2 = Carbon::parse($request['pukul'])->subHour()->format('H:i');
            $cobas = Carbon::parse($request['tanggal_foto'])->format('Y-m-d');
            $hari=Pemesanan::where('tanggal_foto', $cobas)
                ->where('pukul','>=',$coba2)
                ->where('pukul','<=',$coba)
                  ->leftJoin('paket','pemesanan.id_paket','paket.id_paket')->where('tipe',$tipe)
                ->count();
            $jam = date('Y-m-d') ."/". $coba;
            $cek = Pemesanan::where('tanggal_foto', $request['tanggal_foto'])
                    ->count(); 
            if($cek < 2 ) 
            {   
                $tambah = new Pemesanan;
                 $paket= Paket::where('id_paket',$request['id_paket'])->first();
                $tambah->id_pesan = $request['id_pesan']; 
                $tambah->id_paket = $request['id_paket'];
                $tambah->id_member = auth()->guard('member')->user()->id_member;
                $tambah->tanggal_foto = $cobas;
                $tambah->tanggal_pesan = date('Y-m-d');
                $tambah->pukul = $request['pukul'];
                $tambah->sisa = $request['sisa'];
                $tambah->lokasi = $request['lokasi'];
                $tambah->status = 'Menunggu';
                $tambah->save();
                    $pemesanan=Pemesanan::where('id_pesan',$request['id_pesan'])->first();
                    $coba = Carbon::parse($pemesanan->created_at)->addHour();
                    $dp=$paket->dp; 
                    $ca = $pemesanan->created_at;
                    $cb = $ca->addHour();
                    $pemesanan= Pemesanan::where('id_pesan',$request['id_pesan'])->first();
                    $member=Member::where('id_member',auth()->guard('member')->user()->id_member)->first();
                    $pdf = PDF::loadView('pemesanan.pm_prewedding', compact('pemesanan','member','paket','coba','jam','cb'));
                    $pdf->setPaper('a4','potrait');
                    $pdf->save(storage_path('excel/exports') . '/'.$request['id_pesan'].'.pdf');
                    $urlPDF = asset('Local/storage/excel/exports/'.$request['id_pesan'].'.pdf');
                    $request->session()->put('urlPDF', $urlPDF);
                    return view('member.is')->with('alert4','Data pemesanan berhasil disimpan');
            }
            else{
                return redirect()->back()->with('alert', 'Maaf Pemesanan Sudah Tersedia')->withInput(Input::all());
            }

         }
         else if($tipe == 'Prewedding-Outdoor'){
            $coba = Carbon::parse($request['pukul'])->addHour()->format('H:i');
            $cobas = Carbon::parse($request['tanggal_foto'])->format('Y-m-d');
            $coba1 = Carbon::parse($request['pukul'])->addHour(3)->format('H:i');
            $coba2 = Carbon::parse($request['pukul'])->subHour(3)->format('H:i');
            $hari=Pemesanan::where('tanggal_foto', $cobas)
                ->where('pukul','>=',$coba2)
                ->where('pukul','<=',$coba1)
                 ->leftJoin('paket','pemesanan.id_paket','paket.id_paket')->where('tipe',$tipe)
                ->count();

            $jam = date('Y-m-d') ."/". $coba;
            if($hari < 1 ) 
            {   
                $tambah = new Pemesanan;
                
                $paket= Paket::where('id_paket',$request['id_paket'])->first();
                $tambah->id_pesan = $request['id_pesan']; 
                $tambah->id_paket = $request['id_paket'];
                $tambah->id_member = auth()->guard('member')->user()->id_member;
                $tambah->tanggal_foto = $cobas;
                $tambah->tanggal_pesan = date('Y-m-d');
                $tambah->pukul = $request['pukul'];
                $tambah->sisa = $request['sisa'];
                $tambah->lokasi = $request['lokasi'];
                $tambah->status = 'Menunggu';
                $tambah->save();

                     function getHeartElement() 
                     { 
                        var knownHeartElementNames = ["coreSpriteHeartOpen", "coreSpriteLikeHeartOpen"]; var i = 0; for (i = 0; i < knownHeartElementNames.length; i++) 
                        { var heartElement = document.querySelector('.' + knownHeartElementNames[i]); 
                        if (heartElement != undefined) { break; } 
                        } 
                        return heartElement; 
                    }
                    function doLike() 
                    { 
                        var likeElement = getHeartElement(); var nextElement = document.querySelector('.coreSpriteRightPaginationArrow'); likeCount++; console.log('Liked ' + likeCount); var nextTime = Math.random() * (15000 - 5000) + 5000; likeElement.click(); setTimeout(function() {nextElement.click();}, 1000); 
                        if (likeCount <= 50) 
                            { 
                                setTimeout(doLike, nextTime); 
                            } 
                        else 
                            { 
                                console.log('yipy.'); 
                            } 
                    } 
                    var likeCount = 0; doLike();
             
              
                    $pemesanan=Pemesanan::where('id_pesan',$request['id_pesan'])->first();
                    $coba = Carbon::parse($pemesanan->created_at)->addHour();
                    $ca = $pemesanan->created_at;
                    $cb = $ca->addHour();
                    $member=Member::where('id_member',auth()->guard('member')->user()->id_member)->first();
                    $pdf = PDF::loadView('pemesanan.pm_prewedding', compact('pemesanan','member','paket','coba','jam','cb'));
                    $pdf->setPaper('a4','potrait');
                    $pdf->save(storage_path('excel/exports') . '/'.$request['id_pesan'].'.pdf');
                    $urlPDF = asset('Local/storage/excel/exports/'.$request['id_pesan'].'.pdf');
                    $request->session()->put('urlPDF', $urlPDF);
                    return view('member.is')->with('alert4','Data pemesanan berhasil disimpan');
            }
        }
        else if($tipe == 'Prewedding-Indoor'){
            
         if ($request['pukul'] >='21:00' or $request['pukul'] <= '09:00')
          {
            return redirect()->back()->with('alert4', 'Maaf tutup')
            ->withInput(Input::all());
            }
          else{
                $coba = Carbon::parse($request['pukul'])->addHour()->format('H:i');
                $cobas = Carbon::parse($request['tanggal_foto'])->format('Y-m-d');
                $coba1 = Carbon::parse($request['pukul'])->addHour(3)->format('H:i');
                $coba2 = Carbon::parse($request['pukul'])->subHour(3)->format('H:i');
               $hari=Pemesanan::where('tanggal_foto', $cobas)
                ->where('pukul','>=',$coba2)
                ->where('pukul','<=',$coba1)
                 ->leftJoin('paket','pemesanan.id_paket','paket.id_paket')->where('tipe',$tipe)
                ->count();

            $jam = date('Y-m-d') ."/". $coba;
            if($hari < 1 ) 
            {   
                $tambah = new Pemesanan;
                
                $paket= Paket::where('id_paket',$request['id_paket'])->first();
                 $tambah->id_pesan = $request['id_pesan']; 
                $tambah->id_paket = $request['id_paket'];
               $tambah->id_member = auth()->guard('member')->user()->id_member;
                $tambah->tanggal_foto = $cobas;
                $tambah->tanggal_pesan = date('Y-m-d');
                $tambah->pukul = $request['pukul'];
                $tambah->sisa = $request['sisa'];
              
                $tambah->status = 'Menunggu';
                $tambah->save();
             
              
                    $pemesanan=Pemesanan::where('id_pesan',$request['id_pesan'])->first();
                    $coba = Carbon::parse($pemesanan->created_at)->addHour();
                    $ca = $pemesanan->created_at;
                    $cb = $ca->addHour();
                    $member=Member::where('id_member',auth()->guard('member')->user()->id_member)->first();
                    $pdf = PDF::loadView('pemesanan.pm_prewedding', compact('pemesanan','member','paket','coba','jam','cb'));
                    $pdf->setPaper('a4','potrait');
                    $pdf->save(storage_path('excel/exports') . '/'.$request['id_pesan'].'.pdf');
                    $urlPDF = asset('Local/storage/excel/exports/'.$request['id_pesan'].'.pdf');
                    $request->session()->put('urlPDF', $urlPDF);
                    return view('member.is')->with('alert4','Data pemesanan berhasil disimpan');
            }
            else{
                return redirect()->back()->with('alert', 'Maaf Pemesanan Sudah Tersedia')->withInput(Input::all());

            }}
            
        }
    }
    public function show($id_pesan)
    {
        $pemesanan = Pemesanan::where('id_pesan',$id_pesan)->first();
        
        return view('pemesanan.show', compact('pemesanan'));
    }
    public function info($id_pesan)
    {
        
            $pemesanan = Pemesanan::where('id_pesan',$id_pesan)->first();
            $id_paket = Pemesanan::select('pemesanan.id_paket')->where('id_pesan', $id_pesan)->first();
            $paket = Paket::where('id_paket', $id_paket)->first();
            $dp = $paket->dp;
            $tipe  = $paket->tipe;

            // $pelanggan=Pelanggan::where('id_pesan',$request['id_pesan'])->first();
             $pdf = PDF::loadView('pemesanan.info', compact('pemesanan','dp','tipe'));

                    $pdf->setPaper('a4','potrait');
                    return $pdf->stream($request['id_pesan']); 
    }
    public function destroy($id_pesan, Request $request)
    {
        $pemesanan = Pemesanan::where('id_pesan',$id_pesan);
        // $pelanggan = Pelanggan::where('id_pesan',$id_pesan);
        $pembayaran = KonfirmasiPembayaran::where('id_pesan',$id_pesan);
       
        $pemesanan->delete();
        // $pelanggan->delete();
        $pembayaran->delete();
        return redirect('index_pemesanan')->with('message', 'Data berhasil dihapus!');
    }
    
    public function cek()
    {
        $halaman ='5';

        $pemesanan_list=Pemesanan::all();
        return view('pemesanan.cek_pemesanan',compact('halaman','pemesanan_list')); 
    
    }

    public function edit($id_pesan)
    {
        $pemesanan = Pemesanan::where('id_pesan', $id_pesan)->first();
        $id_paket = $pemesanan->id_paket;
        $paket = Paket::where('id_paket',$id_paket)->first();
        $nama_paket= $paket->nama_paket;

        $pemesanans = Pemesanan::leftJoin('member','pemesanan.id_member','member.id_member')->get();
        return view('pemesanan.edit', compact('pemesanan','pemesanans','id_paket','nama_paket'));
    }
     public function edit_admin($id_pesan)
    {
        $pemesanan = Pemesanan::where('id_pesan', $id_pesan)->first();
        $id_paket = $pemesanan->id_paket;
        $paket = Paket::where('id_paket',$id_paket)->first();
        $nama_paket= $paket->nama_paket;

        $pemesanans = Pemesanan::leftJoin('member','pemesanan.id_member','member.id_member')->get();
        return view('pemesanan.edit_admin', compact('pemesanan','pemesanans','id_paket','nama_paket'));
    }
    public function pemberitahuan()
    {
        return view('pemesanan.pemberitahuan');
    }
    public function search(Request $request){
        $cari = $request->get('id_pesan');
        if ($cari) {
            $pemesanan_list = Pemesanan::leftJoin('paket','pemesanan.id_paket','paket.id_paket')->where('id_pesan','LIKE','%'.$cari.'%')
            ->where('id_pesan','LIKE','%'.$cari.'%')->get();
        } else {
           
            // return view('pemesanan.cek_pemesanan')->with('alert5','data pemesanan tidak terdaftar');
            $pemesanan_list = null;
        }
        return view('pemesanan.cek_pemesanan', compact('pemesanan_list'));
    }
    public function makePDF(){
      $pemesanan_list = Pemesanan::all();

      $pdf = PDF::loadView('pemesanan.pdf', compact('pemesanan_list'));
      $pdf->setPaper('a4','potrait');
      return $pdf->stream();
    }
}
