<?php

namespace App\Http\Controllers\Investis;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use TCG\Voyager\Http\Controllers\VoyagerController as BaseVoyagerController;

class VoyagerController extends BaseVoyagerController
{
    //

    public function assets($path)
    {
        Log::info('Path Before', [$path]);
        $path = str_start(str_replace(['../', './'], '', $path), '/');
//        $path = __DIR__.'/../../../publishable/assets'.$path;
        $path = base_path('vendor/tcg/voyager/publishable/assets').$path;
        Log::info('Path After', [$path]);
        Log::info('See if File exist: ', [File::exists($path)]);
        if (File::exists($path)) {
            $mime = '';
            if (ends_with($path, '.js')) {
                $mime = 'text/javascript';
            } elseif (ends_with($path, '.css')) {
                $mime = 'text/css';
            } else {
                $mime = File::mimeType($path);
            }
            $response = response(File::get($path), 200, ['Content-Type' => $mime]);
            $response->setSharedMaxAge(31536000);
            $response->setMaxAge(31536000);
            $response->setExpires(new \DateTime('+1 year'));
            Log::info("yes it exist", [$response]);
            return $response;
        }

        Log::error("no doesn't exist", [$path]);
        return response('', 404);
    }
}
