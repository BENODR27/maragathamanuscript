<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage; 
use Intervention\Image\Facades\Image;

class ImageHelper {

  public static function storeImage($imageData,$imagePathName="posterimages/") {

    $data = substr($imageData, strpos($imageData, ",") + 1);  

    // Decode base64 data and generate image  
    $image = base64_decode($data);
    $imageName = uniqid() . '.png';

    // $imagePath = $_ENV['STORAGES_PATH'].$imagePathName . $imageName; 
    // $thumbPath = $_ENV['STORAGES_PATH'].'thumbnail/' .$imagePathName. $imageName;

    // Generate and save the thumbnail
    $thumb = Image::make($image)->fit(150)->encode();
    // Storage::put($thumbPath, $thumb);

    // Storage::put($imagePath, $image);

    Storage::disk('s3')->put($imagePathName.'/main/'.$imageName, $image);
    Storage::disk('s3')->put($imagePathName.'/thumbnail/'.$imageName, $thumb);
    // {{ Storage::disk('s3')->url($filename) }}
    return $imageName;
    
  }

  public static function storePdf($pdfFile){

    // Generate a unique filename for the image
    $pdfName = uniqid() . '.' . $pdfFile->getClientOriginalExtension();

    // Move the uploaded file to the desired directory within the public disk
    // $pdfFile->storeAs($_ENV['STORAGES_PATH'].'work', $pdfName);
    Storage::disk('s3')->put('work/file/'.$pdfName, file_get_contents($pdfFile));


    return $pdfName;
  }
  public static function deleteImage($imageName,$imagePathName,$hasThumbnail=false):void{
    $imagePath = $imagePathName . $imageName;
    // Storage::delete($imagePath);
    $deleted = Storage::disk('s3')->delete($imagePath);

    if($hasThumbnail){
      $thumbPath = $imagePathName. $imageName;
      // Storage::delete($thumbPath);
      $deleted = Storage::disk('s3')->delete($thumbPath);

    }
  }
  public static function deletePDF($pdfName,$pdfPathName):void{
    $pdfPath = $_ENV['STORAGES_PATH'].$pdfPathName . $pdfName;
    // Storage::delete($pdfPath);
    $deleted = Storage::disk('s3')->delete($pdfPath);

  }
}