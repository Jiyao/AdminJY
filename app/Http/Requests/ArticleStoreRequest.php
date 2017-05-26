<?php

namespace App\Http\Requests;

use App\Http\Traits\TagTrait;
use App\Models\Article;
use App\Models\Tag;
use App\Models\TaggedArticle;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ArticleStoreRequest extends FormRequest
{
    use TagTrait;
    public static $img_dir = 'article/cover/';
    public static $img_type = 'cover';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
        ];
    }

    public function commonUpdate(Article $article)
    {
        $tag = new Tag();
        $article->title = $this->input('title');
        $article->user_id = Auth::id();
        $article->category_id = $this->input('category_id');
        $article->tagged = $this->Taghandle($tag, $this->input('tagged'));
        $article->summary = $this->input('summary');
        $article->content = $this->input('content');
        $article->is_posted = $this->input('is_posted');
        if ($this->hasFile('cover')) {
            $article->cover = app('App\Jy\Handler\ImageHandler')->uploadImages($this->file('cover'), self::$img_dir, self::$img_type);
        }
        if ($this->method() == 'POST') $article->created_at = time();

        $article->save();
        $this->updateTaggedArticle($article->tagged, $article->id);
    }

    private function updateTaggedArticle($tagged_id, $article_id)
    {
        if ($this->method() != 'POST') TaggedArticle::where(['article_id' => $article_id])->delete();

        $new_tags = explode(',', $tagged_id);
        $tagged_arr = array();
        foreach ($new_tags as $key => $new_tag_id) {
            $tagged_arr[$key]['tag_id'] = $new_tag_id;
            $tagged_arr[$key]['article_id'] = $article_id;
            $tagged_arr[$key]['created_at'] = Carbon::now();
        }
        \DB::table('tagged_articles')->insert($tagged_arr);
    }
}
