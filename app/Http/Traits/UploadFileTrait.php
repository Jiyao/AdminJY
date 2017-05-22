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
    public function QiniuUpload($name, Request $request)
    {
        $file = $request->file($name);
        $fileName = md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
        // 上传到七牛
        $disk = QiniuStorage::disk('qiniu');
        $bool = $disk->put('articles/cover_'.$fileName,file_get_contents($file->getRealPath()));
        // 判断是否上传成功
        if ($bool) {
            // $path = $disk->privateDownloadUrl('articles/cover_'.$fileName);
            return 'articles/cover_'.$fileName;
        }
        return false;
    }
}