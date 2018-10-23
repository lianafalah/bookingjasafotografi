<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\KonfirmasiPembayaran;
use PDF;
use Carbon\Carbon;
use App\Paket;

class LaporanController extends Controller
{
    //
    // public function index()
    // {
    // 	$awal = date('Y-m-d', mktime(0,0,0, date('m'), 1, date('Y')));
    // 	$akhir = date('Y-m-d');
    // 	return view('laporan.index',compact('awal','akhir'));    
    // }
    // protected function getData($awal, $akhir){
    // 	$no = 0;
    // 	$data = array();
    // 	$pendapatan = 0;
    // 	$totalpendapatan = 0;
    // 	while(strtotime($awal) <= strtotime($akhir)){
    // 		$tanggal = $awal;
    // 		$awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));
    // 		$total_penjualan= Pemesanan::where('created at','LIKE',"$tanggal%")->sum('bayar');

    // 	}
    // }
    // public function listData($awal, $akhir){
    // 	$data = $this->getData($awal, $akhir);
    // 	$output= array("data" => json(output));
    // }
    public function create_lapes(){
        return view('laporan.lap_pesan');
    }
    public function lap_pesan(Request $request)
    {
        $tanggal_awal= Carbon::parse($request['tanggal_awal'])->format('Y-m-d');
        $tanggal_akhir= Carbon::parse($request['tanggal_az'])->format('Y-m-d');
        $data = Pemesanan::leftJoin('paket','pemesanan.id_paket','paket.id_paket')->whereBetween('pemesanan.tanggal_foto',[$tanggal_awal,$tanggal_akhir])->get();
      
        $pdf = PDF::loadView('pemesanan.pdf', compact('data'));
        $pdf->setPaper('a4','potrait');
         return $pdf->stream();
    }
}
