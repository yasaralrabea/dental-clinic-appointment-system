<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate; 

class RateController extends Controller
{
    public function some_rate()
{
    $rate_one = Rate::find(1);
    $rate_two = Rate::find(2); 

    return view('rates', compact('rate_one', 'rate_two'));
}

public function rates()
{
    $rates= Rate::all();
    return view('rates' , compact('rates'));
}
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',  
        'comment' => 'required|string|max:500', 
    ]);

    $new_rate = Rate::create([
        'name' => $request->name,
        'comment' => $request->comment,
    ]);

    return redirect()->back()->with('success', 'تم الحفظ بنجاح');
}

}
