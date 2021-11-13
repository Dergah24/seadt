<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Seting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Seting::whereId(1)->first();
        return view('Back.settings', compact('settings'));
    }

    public function update(Request $request,$id)
    {
        Seting::whereId($id)->update([
            'adress' => $request->adress,
            'phone' => $request->phone,
            'telefon' => $request->telefon,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
        ]);

        return redirect()->back();
    }
}
