<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{

    public function model()
    {
        return Category::class;
    }

    public function getCategoryList()
    {
        return $this->model->all();
    }
}
