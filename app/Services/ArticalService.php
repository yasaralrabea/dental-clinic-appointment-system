<?php

namespace App\Services;

use App\Repositories\ArticalRepository;

class ArticalService
{
    protected $articalRepo;

    public function __construct(ArticalRepository $articalRepo)
    {
        $this->articalRepo = $articalRepo;
    }

    public function getAllArticals()
    {
        return $this->articalRepo->getAll();
    }

    public function storeArtical($request)
    {
        $data = [
            'tittle' => $request->tittle,
            'dics' => $request->dics,
        ];

        return $this->articalRepo->create($data);
    }

    public function deleteArtical($id)
    {
        return $this->articalRepo->deleteById($id);
    }
}
