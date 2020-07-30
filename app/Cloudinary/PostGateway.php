<?php

namespace App\Cloudinary;

use JD\Cloudder\Facades\Cloudder;


class PostGateway implements CloudinaryInterface
{

    public function upload($file) {
        $mimeFile = $file->getMimeType();
        $mimeFile = substr($mimeFile, 6);
        if($mimeFile == 'jpeg') {
            $mimeFile = 'jpg';
        }
        $upload = Cloudder::upload($file);
        $result = Cloudder::getResult();
        $nameFile = 'v' . $result['version'] . '/' .Cloudder::getPublicId() . '.' . $mimeFile;
        return $nameFile;
    }
    
}
