<?php

namespace App\Http\View\Composers;

use App\Page;
use Illuminate\View\View;

class PageComposer{

    protected $page;

    /**
     * Create a new profile composer.
     */
    public function __construct()
    {
        $page = Page::where('status', 1)->get();
        // Dependencies automatically resolved by service container...
        $this->page = $page;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('pages', $this->page);
    }
}
