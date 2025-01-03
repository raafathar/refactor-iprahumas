<?php

namespace App\Helper;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

trait FileHandler
{
    /**
     * File Image Handler
     *
     * @param Illuminate\Http\Request $request
     * @param string $name
     * @param string $path
     * @param string $type
     * @return string
     */
    private function fileImageHandler($request, $name, $path, $type = "public")
    {
        if ($request->hasFile($name)) {
            $file = $request->file($name);
            $foto = $file->hashName();

            $foto_path = $file->storeAs($path, $foto);
            $foto_path = Storage::disk($type)->put($path, $file);
            return $foto_path;
        }
    }

    /**
     * File Image Update Handler
     *
     * @param Illuminate\Http\Request $request
     * @param string $name
     * @param string $oldData
     * @param string $path
     * @param string $type
     * @return string
     */
    private function fileImageUpdateHandler($request, $name, $oldData, $path, $type = "public")
    {
        if ($request->hasFile($name)) {

            if ($oldData) {
                $this->isExistFile($oldData, $type);
            }

            $file = $request->file($name);
            $foto = $file->hashName();

            $foto_path = $file->storeAs($path, $foto);
            $foto_path = Storage::disk($type)->put($path, $file);
            return $foto_path;
        }
    }

    private function isExistFile($oldData, $type = "public")
    {
        if (Storage::disk($type)->exists($oldData)) {
            Storage::disk($type)->delete($oldData);
        }
    }

    private function fileImageCheckRatio($request, $name, $width, $height)
    {
        $image = $request->file($name);
        $imageDimensions = Image::read($image);

        // Check Ratio
        $widthDimension = $imageDimensions->width();
        $heightDimension = $imageDimensions->height();
        $aspectRatio = $widthDimension / $heightDimension;
        if (round($aspectRatio, 2) != round($width / $height, 2)) {
            return false;
        }
        return true;
    }
}
