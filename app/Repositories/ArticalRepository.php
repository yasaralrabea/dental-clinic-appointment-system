<?php

namespace App\Repositories;

use App\Models\Artical;

class ArticalRepository
{
    public function getAll()
    {
        return Artical::all();
    }

    public function create(array $data)
    {
        return Artical::create($data);
    }

    public function deleteById($id)
    {
        return Artical::find($id)->delete();
    }
}
