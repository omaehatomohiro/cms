<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UploadRequest;

class UploadController extends Controller
{
    public function store(UploadRequest $request){

        $filename = $this->create_filename($request);

        if ( app()->isLocal() || app()->runningUnitTests() ) {
            $path = $request->file("upload")->storeAs('public/posts', $filename);
            $obj = array(
                "url" => asset(str_replace('public','/storage',$path)),
                "uploaded"=> true
            );
        }else{
            $request->file("upload")->storeAs('media/posts',$filename,'s3');
            $obj = array(
                "url" => asset("media/posts/" .$filename),
                "uploaded"=> true
            );
        }
        
        return json_encode($obj);
    }

    public function get_extension_name($mime){
        $arr = [
            "image/png" => "png",
            'image/jpeg' => 'jpg'
        ];
        return $arr[$mime];
    }

    public function create_filename($request){
        $extention = $this->get_extension_name($request->file("upload")->getClientMimeType());
        return date('Y-m-d_H-i-s') . md5(uniqid(rand(), true)) . '.' . $extention;
    }



}
