<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\innerEvent;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {

        return view("Front.evants");
    }

    public function single(Request $request)
    {
        $slug = 'slug_' . app()->getlocale();
        $title = 'title_' . app()->getlocale();
        $content = 'content_' . app()->getlocale();

        if ($request->slug == 'all') {

            $events = innerEvent::selectRaw($title . ' as title , ' . $content . ' as content , photo , id')->get();
        } else {
            $id = Event::where($slug, $request->slug)->value('id');
            $events = innerEvent::selectRaw($title . ' as title , ' . $content . ' as content , photo , id')->whereEventId($id)->get();

        }

        return view("Front.evants", compact('events'));
    }
}
