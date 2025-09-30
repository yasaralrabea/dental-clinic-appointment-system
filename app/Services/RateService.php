<?php

namespace App\Services;

use App\Repositories\RateRepository;

class RateService
{
    protected $rateRepo;

    public function __construct(RateRepository $rateRepo)
    {
        $this->rateRepo = $rateRepo;
    }

    public function getSomeRates()
    {
        $rate_one = $this->rateRepo->findRate(1);
        $rate_two = $this->rateRepo->findRate(2);

        return compact('rate_one', 'rate_two');
    }

    public function getAllRates()
    {
        return $this->rateRepo->getAll();
    }

    public function storeRate($request)
    {
        $data = [
            'name' => $request->name,
            'comment' => $request->comment,
        ];

        return $this->rateRepo->create($data);
    }
}
