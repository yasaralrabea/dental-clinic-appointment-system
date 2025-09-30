<?php

namespace App\Http\Controllers;

use App\Services\ArticalService;
use Illuminate\Http\Request;

class ArticalController extends Controller
{
    protected $articalService;

    public function __construct(ArticalService $articalService)
    {
        $this->articalService = $articalService;
    }

    public function show()
    {
        $articals = $this->articalService->getAllArticals();
        return view('articals', compact('articals'));
    }

    public function add_artical()
    {
        $articals = $this->articalService->getAllArticals();
        return view('add_artical', compact('articals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tittle' => 'required|string|max:255',
            'dics' => 'required|string',
        ]);

        $this->articalService->storeArtical($request);

        return redirect()->back()->with('success', 'تم نشر المقالة');
    }

    public function destroy($id)
    {
        $this->articalService->deleteArtical($id);
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
