<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\InnerEventRequet;
use App\Http\Requests\InnerEventUpdate;
use App\Models\innerEvent;
use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InnerEventController extends Controller
{
    public function get_event(Request $request)
    {
        $response = innerEvent::where('event_id', $request->event_id)
            ->where('deleted', 0)
            ->get();
        return $response;
    }
    public function add_event(InnerEventRequet $request)
    {
        //  return $request->all();
        $file = $request->file('fileToUpload')->getClientOriginalName();
        $path = "inner-event/" . $file;
        $request->fileToUpload->move(public_path('inner-event'), $file);
        $id = innerEvent::insertGetId([
            'event_id' => $request->event_id,
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

        $log = new Logs();
        $log->content = 'Inner event # ' . $id;
        $log->log_type_id = 1;
        $log->user_id = Auth::id();
        $log->save();
        return redirect()->back()->with('evvent_id', $request->evvent_id);
    }
    public function delete_evvent(Request $request)
    {
        innerEvent::where('id', $request->id)->update(['deleted' => '1']);

    }
    public function set_status_evvent(Request $request)
    {
        innerEvent::where('id', $request->id)->update(['status' => $request->status]);
        return $request->status;
    }
    public function edit_event(Request $request)
    {
        $response = innerEvent::where('id', $request->id)->get();
        return $response;
    }
    public function edit_save(InnerEventUpdate $request)
    {
        if (isset($request->fileToUpload)) {
            $file = $request->file('fileToUpload')->getClientOriginalExtension();
            $filename = time() . '.' . $file;
            $path = "inner-event/" . $filename;
            $request->fileToUpload->move(public_path('inner-event'), $filename);
        } else {
            $filename = innerEvent::find($request->id)->photo;
        }

        $response = innerEvent::where('id', $request->id)->update([
            'photo' => isset($path) ? $path : $filename,
            'title_az' => $request->title_az,
            'title_en' => $request->title_en,
            'title_ru' => $request->title_ru,
            'content_ru' => $request->content_ru,
            'content_az' => $request->content_az,
            'content_en' => $request->content_en,
            'slug_az' => Str::slug($request->title_az),
            'slug_en' => Str::slug($request->title_en),
            'slug_ru' => Str::slug($request->title_en),
            'event_id' => $request->event_id,
        ]);

        $log = new Logs();
        $log->content = 'Inner event # ' . $request->evvent_id;
        $log->log_type_id = 1;
        $log->user_id = Auth::id();
        $log->save();
        return redirect()->back()->with('evvent_id', $request->evvent_id);
    }
}
