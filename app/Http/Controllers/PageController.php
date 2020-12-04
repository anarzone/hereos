<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('back.pages.customPages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.customPages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = $request->validate([
            'title' => 'required|string|min:2',
            'slug' => 'required|string|min:2',
            'body'  => 'required|string|min:10',
            'seo_title' => 'required|string|min:2|max:35',
            'seo_description' => 'required|string|min:5|max:155',
            'seo_keywords' => 'required|string|min: 2',
            'status' => 'required|string',
            'cover_image' => 'file|nullable|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        $page['user_id'] = auth()->user()->id;

        if(!strpos($page['slug'], '-')){
            $slug = implode('-', explode(' ',$page['slug']));
            $page['slug'] = $slug;
        }


        if($request->hasFile('cover_image')){
            $image = $request->file('cover_image');

            $filename = time().'.'.$image->getClientOriginalExtension();

            $image->storeAs('public/coverimages', $filename);
            $page['cover_image'] = $filename;
        }
        Page::create($page);

        return redirect('/admin/pages')->with('success', 'Page created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('back.pages.customPages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|min:2',
            'slug' => 'required|string|min:2',
            'body'  => 'required|string|min:10',
            'seo_title' => 'required|string|min:2|max:35',
            'seo_description' => 'required|string|min:5|max:155',
            'seo_keywords' => 'required|string|min: 2',
            'status' => 'required|string',
            'cover_image' => 'file|nullable|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);
        $data = $request->all();
        if(!strpos($data['slug'], '-')){
            $slug = implode('-', explode(' ', $data['slug']));
            $data['slug'] = $slug;
        }

        if($request->hasFile('cover_image')){
            $image = $request->file('cover_image');

            $filename = time().'.'.$image->getClientOriginalExtension();

            $image->storeAs('public/coverimages', $filename);
            $page['cover_image'] = $filename;
        }

        $page->update($data);


        return redirect('/admin/pages')->with('success', 'Pages updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return  redirect('/admin/pages');
    }
}
