<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
class CurlController extends Controller
{
    //
    	
    	public function getCURL()

{

    $response = Curl::to('https://example.com/posts/1')

                ->withData(['title'=>'Test', 'body'=>'sdsd', 'userId'=>1])

                ->patch();

    dd($response);

}
}
