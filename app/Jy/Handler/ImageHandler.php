<?php
namespace App\Jy\Handler;

use App\Exceptions\ImageException;
use App\Http\Traits\UploadFileTrait;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

/**
 * Author: jiyao
 * Date  : 2017/5/22
 */
class ImageHandler
{
    use UploadFileTrait;

    /**
     * @var UploadedFile $file
     */
    protected $file;
    protected $file_ext;
    protected $img_extensions = ["png", "jpg", "gif", 'jpeg'];

    /**
     * 上传图片
     * @param UploadedFile $file
     * @param string $dir       文件前缀路径
     * @param string $type
     * @return bool
     */
    public function uploadImages(UploadedFile $file, $dir, $type)
    {
        $this->file = $file;
        $this->file_ext = strtolower($this->file->getClientOriginalExtension());

        $this->checkImgExtensions();

        $real_path = $this->file->getRealPath();
        $image_name = md5($this->file->getClientOriginalName().time().rand());

        $result = $this->saveImages($dir .$image_name. '.'. $this->file_ext, $real_path);
        if ($type == 'cover') {
            $thumb_path = $this->makeImageThumb($image_name. '.'.$this->file_ext);
            $this->saveImages($dir .'/thumb/'.$image_name. '.'. $this->file_ext, $thumb_path);
        }
        return $result ? $image_name.'.'.$this->file_ext: '';
    }

    protected function checkImgExtensions()
    {
        if($this->file_ext && !in_array($this->file_ext, $this->img_extensions))
        {
            throw new ImageException('文件格式不支持，请上传：'.implode(',', $this->img_extensions));
        }
    }

    /**
     * 生成缩略图
     * @param $image_name
     * @return string
     */
    protected function makeImageThumb($image_name)
    {
        $path = public_path().'/'.$image_name;
        $img = Image::make($this->file->getRealPath())->resize(30,30);
        $img->save($path);
        return $path;
    }

    /**
     * 上传图片
     * @param $save_name
     * @param $real_path
     * @return bool
     */
    protected function saveImages($save_name, $real_path)
    {
        if (config('app.image_local')) {
            return $this->localUpload($save_name, $real_path);
        } else {
            return $this->qiniuUpload($save_name, $real_path);
        }
    }

}