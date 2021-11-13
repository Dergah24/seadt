<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Halls;

class MainController extends Controller
{
    public function index()
    {

        $title = 'title_' . app()->getLocale();
        $slug = 'slug_' . app()->getLocale();
        $content = 'content_' . app()->getLocale();
        $events = Event::selectRaw($title . ' as title , ' . $slug . ' as slug ,' . $content . ' as content , image , id ,deleted')->where('deleted', 0)->withCount(['innerEven'])->get();
        $halls = Halls::selectRaw($title . ' as title , ' . $slug . ' as slug ,' . $content . ' as content , image , id')->where('deleted', 0)->withCount('innerHall')->get();

        return view('Front.index', compact('events', 'halls'));
    }
}
