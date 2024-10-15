<?php


namespace App\Http\Traits ;

trait media
{
    public function upload_files($file,$location){

        $file_name = uniqId().  $file->getClientOriginalName();
        $path = public_path("$location") ;
        $file->move($path,$file_name);

        return $file_name;
    }






}
