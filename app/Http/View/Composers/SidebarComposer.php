<?php

namespace App\Http\View\Composers;

use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SidebarComposer
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::all();
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}
