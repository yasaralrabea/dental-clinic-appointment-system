<?php

namespace App\Services;

use App\Repositories\ServeRepository;

class ServeService
{
    protected $serveRepo;

    public function __construct(ServeRepository $serveRepo)
    {
        $this->serveRepo = $serveRepo;
    }

    public function getAllServes()
    {
        return $this->serveRepo->getAll();
    }

    public function storeServe($request)
    {
        $data = [
            'tittle' => $request->tittle,
            'dics' => $request->dics,
            'price' => $request->price,
        ];

        return $this->serveRepo->create($data);
    }

    public function deleteServe($id)
    {
        return $this->serveRepo->deleteById($id);
    }
}
