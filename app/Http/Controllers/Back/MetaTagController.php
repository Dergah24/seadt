<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Meta_tags_title_description;
use Illuminate\Http\Request;

class MetaTagController extends Controller
{
    public function index()
    {
        $data = Meta_tags_title_description::get();
        return view('Back/meta_tags', compact('data'));
    }
    public function get_meta($id)
    {
        $data = Meta_tags_title_description::where('id', $id)->get();
        return $data;
    }
    public function update(Request $request)
    {

        if ($request->ajax()) {
            $name = $request->input('name');
            $Meta_tags_title_description = Meta_tags_title_description::find($request->input('pk'));
            $Meta_tags_title_description->$name = $request->input('value');
            $Meta_tags_title_description->save();
            return response()->json(['success' => true]);
        }
    }
}
