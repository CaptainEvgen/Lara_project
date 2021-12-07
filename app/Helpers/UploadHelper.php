<?php

namespace App\Helpers;



class UploadHelper
{
    static public function upload_image($file,$path)
    {
       // $images = array();

       // foreach($files as $file){
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = "uploads/".$path."/";
            $image_url = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
            //array_push($images,["filename" => $image_url]);
       // }

        return $image_url;
    }
}
