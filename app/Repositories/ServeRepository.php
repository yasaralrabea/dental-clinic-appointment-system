<?php

namespace App\Repositories;

use App\Models\Serve;

class ServeRepository
{
    public function getAll()
    {
        return Serve::all();
    }

    public function create(array $data)
    {
        return Serve::create($data);
    }

    public function deleteById($id)
    {
        return Serve::find($id)->delete();
    }
}
