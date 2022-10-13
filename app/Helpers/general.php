<?php

define('PAGINATION_COUNT',60);

function getFolder()
{

    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}


function uploadImage($folder,$image){
    $image->store('/', $folder);
    $filename = $image->hashName();
    return  $filename;
 }

 function removeImage($path,$image)
{
   unlink(public_path($path).$image);
   
}
  function  getPhotoAttribute($photo)
{
  
   return ( $photo !== null) ? asset('assets/images/brands/' .$photo) : "";
}



 