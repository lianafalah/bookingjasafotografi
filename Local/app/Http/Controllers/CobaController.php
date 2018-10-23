<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    //
    public function uploadSubmit(Request $request)
		 
	{
		$this->validate($request, [	 
		'name' => 'required',
		'tahun' => 'required',
		'photos'=>'required',
		]);
		if($request->hasFile('photos'))
		{
			$allowedfileExtension=['pdf','jpg','png','docx'];
			$files = $request->file('photos');
		 	foreach($files as $file)
		 	{

        
		 		$filename = $file->getClientOriginalName();
        		// $request->file('photos')->move("upload/", $fileName);
				$extension = $file->getClientOriginalExtension();
				$check=in_array($extension,$allowedfileExtension);
				if($check)
				{

					 $tambah = new Item;
        			$tambah->name = $request['name'];
        			$tambah->tahun = $request['tahun'];
        			$tambah->save();
		 			// $items= Item::create($request->all());
		 			foreach($request->photos as $photo) 
		 			{
						$filename = $photo->store($request['name']);
						ItemDetails::create([
						'item_id' => $tambah->id,
						'name'	=> $tambah->name,
						'filename' => $filename
						]);
					}
					return view('/eror');

				}
		 
				else
				{
				echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
				}
		 
			}
		 
		}
		 
	}
}
