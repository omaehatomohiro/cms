<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request){

        $image_data = $request->file("upload");
        $filename = $image_data->getClientOriginalName();

        if ( app()->isLocal() || app()->runningUnitTests() ) {
            $image_data->storeAs('public/upload',$filename);
            $obj = array(
                "url" => asset("storage/upload/" .$filename),
                "uploaded"=> true
            );
        }else{
            $image_data->storeAs('public/upload',$filename,'s3');
            $obj = array(
                "url" => asset("storage/upload/" .$filename),
                "uploaded"=> true
            );
        }
        
        return json_encode($obj);
    }


}
