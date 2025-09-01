<?php

namespace App\Http\Controllers;
use App\Models\Artical; 
use Illuminate\Http\Request;

class ArticalController extends Controller
{
       
public function show()
{
    $articals=Artical::all();
    return view('articals' , compact('articals'));

}
public function store(Request $request)
{
    $request->validate([
        'tittle' => 'required|string|max:255',   
        'dics' => 'required|string',                
    ]);

    Artical::create([
        'tittle' => $request->tittle,
        'dics' => $request->dics,
    ]);

    return redirect()->back()->with('success', 'تم نشر المقالة');
}


public function add_artical()
{
    $articals=Artical::all();
    return view('add_artical' , compact('articals'));

}
 
public function destroy($id)
{
    Artical::find($id)->delete();
    return redirect()->back()->with('success', 'تم الحذف بنجاح');


} 
}
