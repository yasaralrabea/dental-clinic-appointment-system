<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServeService;

class ServeController extends Controller
{
    protected $serveService;

    public function __construct(ServeService $serveService)
    {
        $this->serveService = $serveService;
    }

    public function serves()
    {
        $serves = $this->serveService->getAllServes();
        return view('serves', compact('serves'));
    }

    public function serves_controll()
    {
        $serves = $this->serveService->getAllServes();
        return view('serves_controll', compact('serves'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tittle' => 'required|string|max:255',
            'dics' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $this->serveService->storeServe($request);

        return view('sucss_serve', ['message' => 'تم حجز الموعد بنجاح']);
    }

    public function destroy($id)
    {
        $this->serveService->deleteServe($id);
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
