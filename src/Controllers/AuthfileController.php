<?php
namespace Semdevops\Authfile\Controllers;

use Illuminate\Http\Request;
use Storage;

class AuthfileController
{

	public function getFile(Request $request)
	{
		if(Storage::disk('uploads')->exists($request->name)){
			return response()->download(storage_path("/app/uploads/".$request->name), null, [], null);
		}else{
			return response()->download(storage_path("noimage.png"), null, [], null);
		}
	}

	public function getStream(Request $request)
	{
		if(Storage::disk('uploads')->exists($request->name)){
			$fileName = $request->name;
			return response()->stream(function() use ($fileName) {
											$stream = Storage::disk('uploads')->readStream($fileName);
											fpassthru($stream);
											if (is_resource($stream)) { fclose($stream); }
										}, 200, 
										['Cache-Control'	=> 'must-revalidate, post-check=0, pre-check=0',
										'Content-Type'  => Storage::disk('uploads')->mimeType($fileName),
										'Content-Length'=> Storage::disk('uploads')->size($fileName),
										'Pragma'		=> 'public']
									);
		}else{
			return "";
		}
	}
}