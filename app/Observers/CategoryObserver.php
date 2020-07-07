<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Category;

class CategoryObserver
{
    /**
     * Handle the Category "creating" event.
     *
     * @param  \App\Models\\Category  $category
     * @return void
     */
    public function creating(Category $category)
    {
        $category->url = Str::kebab($category->name);
    }

    /**
     * Handle the Category "updating" event.
     *
     * @param  \App\Models\\Category  $Category
     * @return void
     */
    public function updating(Category $category)
    {
        $category->url = Str::kebab($category->name);
    }
}
