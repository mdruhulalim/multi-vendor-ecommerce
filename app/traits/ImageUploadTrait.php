<?php
namespace App\Traits;
use Illuminate\Http\Request;

trait ImageUploadTrait{
    public function uploadImage(Request $request, $inputName, $path){

        if($request->hasFile($inputName)){
            // get new image name
            $image = $request->{$inputName};
            // generate image name
            $imageName = 'media_'.rand().'.'.$image->getclientoriginalextension();
            // upload image in public path
            $image->move(public_path($path), $imageName);
            // return storage path for database table
            return $path.'/'.$imageName;
        }

    }
}