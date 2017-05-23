<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use zgldh\QiniuStorage\QiniuStorage;

/**
 * Class QiNiuUpload
 *
 * @package App\Http\Middleware
 */
trait UploadFileTrait
{
    /**
     * 本地上传
     */
    public function localUpload($fileDir, $fileRealPath)
    {
        return true;
    }

    /**
     * @param $fileDir
     * @param $fileRealPath
     * @return bool
     */
    public function qiniuUpload($fileDir, $fileRealPath)
    {
        // 上传到七牛
        $disk = QiniuStorage::disk('qiniu');
        $bool = $disk->put($fileDir, file_get_contents($fileRealPath));
        // 判断是否上传成功
        if ($bool) {
            return true;
        }
        return false;
    }
}