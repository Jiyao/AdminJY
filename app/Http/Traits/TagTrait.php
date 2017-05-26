<?php
namespace App\Http\Traits;
use App\Models\Tag;

/**
 * Author: jiyao
 * Date  : 2017/5/26
 */
trait TagTrait
{
    /**
     * 处理标签
     * @param Tag $tag
     * @param $tags     string 逗号分隔标签名
     * @return string   string 逗号分隔标签id
     */
    public function Taghandle(Tag $tag, $tags)
    {
        $tag_ids = array();
        $tag_name_arr = explode(',', $tags);
        foreach($tag_name_arr as $tag_name){
            $result = $tag->updateOrCreate(
                ['short'=> strtolower($tag_name)],
                ['name' => $tag_name]
            );
            $tag_ids[] = $result->id;
        }
        return implode(',', array_unique($tag_ids));
    }
}