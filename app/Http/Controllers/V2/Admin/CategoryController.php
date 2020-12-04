<?php

namespace App\Http\Controllers\V2\Admin;

use App\Helpers\ActionHelper;
use App\Http\Controllers\Controller;
use App\Models\V2\Categories\Category;
use App\Http\Requests\V2\Admin\StoreCategoryRequest;
use App\Models\V2\Locale;

class CategoryController extends Controller
{
    use ActionHelper;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('back.V2.categories.index');
    }

    public function get(Category $category)
    {
        return response()->json([
            'message' => 'success',
            'data' => $category->load('translation')
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->except(['_token', 'cover', 'name']);
        $data['position'] = Category::latest()->first()->position + 1;


        if ($request->has('cover')) {
            $data['cover'] = $this->uploadImage($request->file('cover'), Category::COVER_PATH);
        }

        $category = Category::updateOrCreate(
            ['id' => $request->get('category_id')],
            $data
        );

        $category->translation()->updateOrCreate(
            ['category_id' => $category->id],
            [
                'locale_id' => Locale::where('name', app()->getLocale())->first()->id,
                'name' => $request->name,
            ]
        );

        $message = $request->get('category_id') ? __('messages.categoryUpdate') : __('messages.categoryCreate');
        return back()->with('success', $message);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'message' => 'success',
            'data' => [],
        ]);
    }
}
