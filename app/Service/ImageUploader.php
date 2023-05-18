<?php


namespace App\Service;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploader
{
    public static function upload(UploadedFile $file, $dir, $prefix, $quality = 90, $params = [])
    {
        if (!file_exists(storage_path('app/public/' . $dir))) {
            mkdir(storage_path('app/public/' . $dir), 0777);
        }

        $filename = $dir . '/' . uniqid($prefix . '_') . '.' . mb_strtolower($file->getClientOriginalExtension());
        $img = Image::make($file);
        if (array_key_exists('width', $params) && array_key_exists('height', $params)) {
            $img->resize($params['width'], $params['height']);
        }
        $img->stream($file->getClientOriginalExtension(), $quality);
        Storage::disk('local')->put('public/' . $filename, $img);
        return $filename;

    }

    public static function resize($img, $width)
    {
        /**
         * @var Image $img
         */
        return $img->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });
    }

}
