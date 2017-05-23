<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ArticleStoreRequest extends FormRequest
{
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
        $article->title = $this->input('title');
        $article->user_id = Auth::id();
        $article->summary = $this->input('summary');
        $article->content = $this->input('content');
        $article->is_posted = $this->input('is_posted');
        $article->cover = app('App\Jy\Handler\ImageHandler')->uploadImages($this->file('cover'), self::$img_dir, self::$img_type);
        $article->created_at = time();
        $article->save();
    }
}
