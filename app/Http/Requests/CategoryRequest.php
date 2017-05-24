<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
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
        switch ($this->method())
        {
            case 'POST':
                return [
                    'name' => 'required|unique:categories,name',
                    'slug' => 'required|unique:categories,slug'
                ];
            case 'PUT':
            case 'PATCH':
                $category = Category::findOrFail($this->route('category'));
                return [
                    'name' => 'required|unique:categories,name,'.$category->id,
                    'slug' => 'required|unique:categories,slug,'.$category->id,
                ];

            default: break;
        }
    }

    public function commonUpdate(Category $category)
    {
        $category->name = $this->input('name');
        $category->slug = $this->input('slug');
        $category->icon = $this->input('icon');
        $category->description = $this->input('description');
        $category->is_show = $this->input('is_show');
        $category->created_at = time();
        return $category->save();
    }
}
