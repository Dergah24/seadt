<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\HallCreateRequest;
use App\Http\Requests\HallUpdateRequest;
use App\Models\Halls;
use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Halls::whereDeleted(0)->get();
        return view('Back.Hall.index', compact("response"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Back.Hall.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HallCreateRequest $request)
    {
//return $request->image;
        if (isset($request->image)) {
            $file = $request->file("image")->getClientOriginalExtension();
            $filename = time() . '.' . $file;
            $path = "halls/" . $filename;
            $request->image->move(public_path("halls"), $filename);
        }
        $id = Halls::insertGetId([
            'title_az' => $request->title_az,
            'title_en' => $request->title_en,
            'title_ru' => $request->title_ru,
            'content_ru' => $request->content_ru,
            'content_az' => $request->content_az,
            'content_en' => $request->content_en,
            'slug_az' => Str::slug($request->title_az),
            'slug_en' => Str::slug($request->title_en),
            'slug_ru' => Str::slug($request->title_en),
            'image' => $path,
            "user_id" => Auth::id(),
        ]);

        $log = new Logs();
        $log->content = 'Hall #' . $id;
        $log->log_type_id = 3;
        $log->user_id = Auth::id();
        $log->save();
        return redirect()->route('hall.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Halls::whereId($id)->first();
        return view('Back.Hall.edit', compact('response'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HallUpdateRequest $request, $id)
    {
        $halls = Halls::find($id);
        if (isset($request->image)) {
            $file = $request->file("image")->getClientOriginalExtension();
            $filename = time() . '.' . $file;
            $path = "halls/" . $filename;
            $request->image->move(public_path("halls"), $filename);
            $halls->image = $path;
        }
        foreach (config('app.available_locales') as $locale => $value) {
            $halls->{'title_' . $locale} = $request->{'title_' . $locale};
            $halls->{'content_' . $locale} = $request->{'content_' . $locale};
            $halls->{'slug_' . $locale} = Str::slug($request->{'title_' . $locale});
        }
        $halls->save();

        $log = new Logs();
        $log->content = 'Hall #' . $id;
        $log->log_type_id = 1;
        $log->user_id = Auth::id();
        $log->save();
        return redirect()->route('hall.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = Halls::whereId($id)->value("image");

        unlink($img);

        Halls::whereId($id)->delete();

        $log = new Logs();
        $log->content = 'Hall #' . $id;
        $log->log_type_id = 2;
        $log->user_id = Auth::id();
        $log->save();

        return redirect()->route("hall.index");

    }
}
