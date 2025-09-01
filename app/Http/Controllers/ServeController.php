<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serve; 


class ServeController extends Controller
{
    public function serves()
    {
        $serves=Serve::all();
        return view('serves' , compact('serves'));

    }
    
public function serves_controll()
{
    $serves=Serve::all();
    return view('serves_controll' , compact('serves'));

}
public function store(Request $request)
{
    $request->validate([
        'tittle' => 'required|string|max:255',  
        'dics' => 'required|string',            
        'price' => 'required|numeric|min:0',   
    ]);

    Serve::create([
        'tittle' => $request->tittle,
        'dics' => $request->dics,
        'price' => $request->price,
    ]);

    return view('sucss_serve', ['message' => 'تم حجز الموعد بنجاح']);
}


public function destroy($id)
    {
        Serve::find($id)->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');


    }

}

