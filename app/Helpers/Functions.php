<?php

if (!function_exists('upload_url'))
{
    function upload_url($uri = '')
    {
        if (config('app.image_local')) {
            return app()->make('path').(DIRECTORY_SEPARATOR.'upload').($uri ? DIRECTORY_SEPARATOR.$uri : $uri);
        } else {
            return 'http://'. config('filesystems.disks.qiniu.domains.default'). '/'. $uri;
        }
    }
}
