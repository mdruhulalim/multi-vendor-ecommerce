<?php
namespace App\Traits;
use Illuminate\Http\Request;
use File;

trait ImageUploadTrait{
    // for upload image
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
    
    // for upload multiimages
    public function uploadMultiImage(Request $request, $inputName, $path){

        $imagePaths = [];
        if($request->hasFile($inputName)){
            // get new image name
            $images = $request->{$inputName};
            
            foreach($images as $image){
                // generate image name
                $imageName = 'media_'.rand().'.'.$image->getclientoriginalextension();
                // upload image in public path
                $image->move(public_path($path), $imageName);
                // storage path for database table
                $imagePaths[] = $path.'/'.$imageName;
            }
            // return storage path for database table
            return $imagePaths;
        }

    }

    // for updateing image
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

    // for delete image
    public function deleteImage(string $path){
        // delete previous image
        if(File::exists(public_path($path))){
            File::delete(public_path($path));
        }
    }
}