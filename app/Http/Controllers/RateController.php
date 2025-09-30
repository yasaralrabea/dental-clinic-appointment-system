<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RateService;

class RateController extends Controller
{
    protected $rateService;

    public function __construct(RateService $rateService)
    {
        $this->rateService = $rateService;
    }

    public function some_rate()
    {
        $rates = $this->rateService->getSomeRates();
        return view('rates', $rates);
    }

    public function rates()
    {
        $rates = $this->rateService->getAllRates();
        return view('rates', compact('rates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string|max:500',
        ]);

        $this->rateService->storeRate($request);

        return redirect()->back()->with('success', 'تم الحفظ بنجاح');
    }
}
