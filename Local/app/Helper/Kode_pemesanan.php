<?php 
namespace App\Helper;
use DB;

class Kode_pemesanan
{
    
 public static function nextNumber($table,$primary,$prefix,$prefix_length){
        $q=DB::table($table)->select(DB::raw('MAX(RIGHT('.$primary.',2)) as kd_max'));
        $q->where(DB::raw('LEFT('.$primary.','.$prefix_length.')'),$prefix);
        $prx=$prefix.Monthindo::convertdate();;
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = $prx.sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = $prx."001";
        }
 
        return $kd;
    }
}
?>