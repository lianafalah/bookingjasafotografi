<?php

namespace App\Http\Controllers;
use App\Item; 
use App\ItemDetails;
use Illuminate\Http\Request;

class UploadController extends Controller
{
	public function uploadForm()
	{
		return view('upload_form');	 
	}
	public function uploadSubmit(Request $request)	 
	{
		$this->validate($request, [
		 
		'name' => 'required',
		'id_pesan' => 'required',
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
		$items= Item::create($request->all());
		 
		 
		foreach ($request->photos as $photo) {
		 
		$filename = $photo->store('photos');
		 
		ItemDetails::create([
		 
		'item_id' => $items->id_pesan,
		 
		'filename' => $filename
		 
		]);
		 
		}
		dd('sksksk');
 
		}
				else
				{
					dd('mskmks');
				}
		 
			}
		 
		}
		 
	}
}
