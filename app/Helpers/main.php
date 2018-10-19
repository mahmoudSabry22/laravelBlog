<?php


function aurl($url)
{
    return url('/admin' . $url);
}


function UploadImages($dir, $image)
{
    $saveImage = '';

    if (! File::exists(public_path('uploads').'/' . $dir)) { // if file or fiolder not exists
        /**
         *
         * @param $PATH Required
         * @param $mode Defualt 0775
         * @param create the directories recursively if doesn't exists
         */

        File::makeDirectory(public_path('uploads') . '/' . $dir, 0775, true); // create the dir or the
    }

    if (File::isFile($image)) {
       $name       = $image->getClientOriginalName(); // get image name
       $extension  = $image->getClientOriginalExtension(); // get image extension
       $sha1       = sha1($name); // hash the image name
       $fileName   = rand(1, 1000000) . "_" . date("y-m-d-h-i-s") . "_" . $sha1 . "." . $extension; // create new name for the image

       // get the image realpath
       $uploadedImage = Image::make($image->getRealPath());

       $uploadedImage->save(public_path('uploads/' . $dir . '/' . $fileName), '100'); // save the image

       $saveImage = $dir . '/' . $fileName; // get the name of the image and the dir that uploaded in
    }

    return $saveImage;
}

function UpdateImages($oldFile, $dir, $image) {

    if ( !empty($oldFile) && !is_null($oldFile) && file_exists( public_path('uploads/'.$oldFile) ) ) {
        unlink(public_path('uploads/'.$oldFile));
    }

    return UploadImages($dir, $image);
}

function checkValue($value)
{
    return !empty($value) && !is_null($value);
}
