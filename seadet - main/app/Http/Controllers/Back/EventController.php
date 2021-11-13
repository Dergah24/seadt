<?php

namespace App\Http\Controllers\Back;

use App\Models\Event;
use Illuminate\Http\Requests\Request;
use App\Http\Controllers\Controller;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EventUpdateRequest;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $response  = Event::whereDeleted(0)->get();
        return view('Back.Event.index',compact("response"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('Back.Event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        if (isset($request->image)) {
            $file = $request->file("image")->getClientOriginalExtension();
            $filename =  time() . '.' . $file;
            $path = "events/".$filename;
            $request->image->move(public_path("events"), $filename);
        }
      $id =  Event::insertGetId([
            'title_az' => $request->title_az,
            'title_en' => $request->title_en,
            'title_ru' => $request->title_ru,
            'content_ru' => $request->content_ru,
            'content_az' => $request->content_az,
            'content_en' => $request->content_en,
            'slug_az'=>Str::slug($request->title_az),
            'slug_en'=>Str::slug($request->title_en),
            'slug_ru'=>Str::slug($request->title_en),
            'image' =>  $path,
            "user_id" => Auth::id()
        ]);
        $log = new Logs;
        $log->content = 'Event #' . $id;
        $log->log_type_id = 3;
        $log->user_id = Auth::id();
        $log->save();
        return redirect()->route('event.index');
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
         $response = Event::whereId($id)->first();
        return view('Back.Event.edit', compact('response'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, $id)
    {
         $events = Event::find($id);
        if (isset($request->image)) {
            $file = $request->file("image")->getClientOriginalExtension();
            $filename =  time() . '.' . $file;
            $path = "events/".$filename;
            $request->image->move(public_path("events"), $filename);
            $events->image = $path;
        }
        foreach (config('app.available_locales') as $locale=>$value) {
            $events->{'title_' . $locale} = $request->{'title_' . $locale};
            $events->{'content_' . $locale} = $request->{'content_' . $locale};
            $events->{'slug_' . $locale} =Str::slug( $request->{'title_' . $locale});

        }
        $events->save();

        $log = new Logs;
        $log->content = 'Event #' . $id;
        $log->log_type_id = 1;
        $log->user_id = Auth::id();
        $log->save();
        return redirect()->route('event.index');
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::whereid($id)->update(['deleted'=>1]);

        $log = new Logs;
        $log->content = 'Event #' . $id;
        $log->log_type_id = 2;
        $log->user_id = Auth::id();
        $log->save();
        return redirect()->route('event.index');

        return redirect()->back();
    }
}
