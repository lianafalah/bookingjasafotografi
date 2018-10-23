<?php 
namespace App\Helper;
use DB;

class DateIndo 
{
    public static function convertdate()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('ym');
        return $date;
    }
    
}