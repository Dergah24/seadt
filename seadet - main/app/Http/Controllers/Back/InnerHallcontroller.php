<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\InnerHallCreate;
use App\Http\Requests\InnerHallUpdate;
use App\Models\innerHall;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InnerHallcontroller extends Controller
{
    public function get_hall(InnerHallCreate $request)
    {
        $response = innerHall::where('halls_id', $request->hall_id)
            ->where('deleted', 0)
            ->get();
        return $response;
    }
    public function add_hall(InnerHallCreate $request)
    {
        //return $request->all();
        $file = $request->file('fileToUpload')->getClientOriginalName();
        $path = "inner-hall/" . $file;
        $request->fileToUpload->move(public_path('inner-hall'), $file);
        innerHall::insert([
            'halls_id' => $request->hall_id,
            'title_az' => $request->title_az,
            'title_en' => $request->title_en,
            'title_ru' => $request->title_ru,
            'content_ru' => $request->content_ru,
            'content_az' => $request->content_az,
            'content_en' => $request->content_en,
            'slug_az' => Str::slug($request->title_az),
            'slug_en' => Str::slug($request->title_en),
            'slug_ru' => Str::slug($request->title_ru),
            'photo' => $path,
        ]);
        return redirect()->back()->with('hall_id', $request->hall_id);
    }
    public function delete_hall(Request $request)
    {
        innerHall::where('id', $request->id)->update(['deleted' => '1']);
    }
    public function set_status_hall(Request $request)
    {
        innerHall::where('id', $request->id)->update(['status' => $request->status]);
        return $request->status;
    }

    public function edit_hall(Request $request)
    {

        $response = innerHall::where('id', $request->id)->get();
        return $response;
    }

    public function edit_save(InnerHallUpdate $request)
    {
        if (isset($request->fileToUpload)) {
            $file = $request->file('fileToUpload')->getClientOriginalExtension();
            $filename = time() . '.' . $file;
            $path = "inner-hall/" . $filename;
            $request->fileToUpload->move(public_path('inner-hall'), $filename);
        } else {
            $filename = innerHall::find($request->id)->photo;
        }
        $response = innerHall::where('id', $request->id)->update([
            'photo' => isset($path) ? $path : $filename,
            'title_az' => $request->title_az,
            'title_en' => $request->title_en,
            'title_ru' => $request->title_ru,
            'content_ru' => $request->content_ru,
            'content_az' => $request->content_az,
            'content_en' => $request->content_en,
            'slug_az' => Str::slug($request->title_az),
            'slug_en' => Str::slug($request->title_en),
            'slug_en' => Str::slug($request->title_en),
            'halls_id' => $request->hall_id,
        ]);
        return redirect()->back()->with('halls_id', $request->hall_id);
    }

    public function edit(Request $request)
    {

        // return $request->id;

        $response = innerHall::whereId($request->id)->get();
        return view('Back.InnerEvent.edit', compact('response'));
    }
}
