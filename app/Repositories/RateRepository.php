<?php

namespace App\Repositories;

use App\Models\Rate;

class RateRepository
{
    public function findRate($id)
    {
        return Rate::find($id);
    }

    public function getAll()
    {
        return Rate::all();
    }

    public function create(array $data)
    {
        return Rate::create($data);
    }
}
