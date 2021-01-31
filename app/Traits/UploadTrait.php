<?php
namespace App\Traits;

trait UploadTrait 
{   
    private function imageUpload($images, $imageColumn = null)
        {

            $uploadedImages = [];

        if(is_array($images)){

            foreach($images as $image) {
               $uploadedImages [] = [$imageColumn => $image->store('products','public')]; //primeiro a pasta onde quer armazenar, segundo parametro o disco no caso public do filesystem em (storage/app/public "vai criar a pasta products com o arquivo")
               
            }

        } else{
            $uploadedImages = $images->store('logo', 'public');
        }
        
        return $uploadedImages;
    }
}