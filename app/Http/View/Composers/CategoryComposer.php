<?php

namespace App\Http\View\Composers;

use App\Models\V2\Categories\Category;
use Illuminate\View\View;

class CategoryComposer{

    protected $categories;

    /**
     * Create a new profile composer.
     *
     */
    public function __construct()
    {
        $categories = Category::latest()->get();

        // Dependencies automatically resolved by service container...
        $this->categories = $categories;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}
