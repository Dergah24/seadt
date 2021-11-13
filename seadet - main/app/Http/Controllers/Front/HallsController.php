<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Halls;
use App\Models\innerHall;
use Illuminate\Http\Request;

class HallsController extends Controller
{
   public function index(){
       return view('Front.halls');
   }

   public function single(Request $request){
    $slug = 'slug_' . app()->getlocale();
    $title = 'title_' . app()->getlocale();
    $content = 'content_' . app()->getlocale();
    if($request->slug == 'all'){

        $halls = InnerHall::selectRaw( $title .' as title , ' .$content.' as content , photo , id')->get();
    }else{
        $id = Halls::where($slug,$request->slug)->value('id');
        $halls = innerHall::selectRaw( $title .' as title , ' .$content.' as content , photo , id')->where('halls_id', $id)->get();

    }

     return view("Front.halls",compact('halls'));
}
}
