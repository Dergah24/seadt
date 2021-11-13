<?php

namespace App\Http\Controllers\Back;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\AboutRequest;



class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $about= About::first();
        return view("Back.About.list",compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return 23234;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRequest $request, $id)
    {

   // return  $request->all();
       $request->validate([
            'photo'=>"mimes:jpeg,jpg"
        ]);
        $about = About::find($id);
        if (isset($request->image)) {
            $file = $request->file('image')->getClientOriginalExtension();
            $filename = time() . '.' . $file;
            $request->image->move(public_path("abouts"), $filename);
            if ($about) {
                $about->image = $filename;
            }
        } else {
            foreach (config('app.available_locales') as $locale=>$value) {
                $about->{'title_' . $locale} = $request->{'title_' . $locale};
                $about->{'content_' . $locale} = $request->{'content_' . $locale};
                $about->{'slug_' . $locale} = Str::slug($request->{'title_' . $locale});
            }
        }
        $about->save();

        $log = new Logs();
        $log->content = 'About' ;
        $log->log_type_id = 1;
        $log->user_id = Auth::id();
        $log->save();
        return  redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
