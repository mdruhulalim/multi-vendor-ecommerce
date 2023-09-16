<?php
namespace App\Traits;
use Illuminate\Http\Request;
use File;

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

    public function updateImage(Request $request, $inputName, $path, $oldPath=null){

        if($request->hasFile($inputName)){
            // delete previous image
            if(File::exists(public_path($oldPath))){
                File::delete(public_path($oldPath));
            }
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

    public function deleteImage(string $path){
        // delete previous image
        if(File::exists(public_path($path))){
            File::delete(public_path($path));
        }
    }
}