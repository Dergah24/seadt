<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class FormController extends Controller
{
    public function contactForm(Request $request)
    {
        $response = new ContactForm;
        $response->fullname = $request->fullname;
        $response->email = $request->email;
        $response->phone = $request->phone;
        $response->content = $request->content;
        $is_saved = $response->save();

        if ($is_saved) {
            return response()->json(['success' => 'Mesajiniz gonderildi']);
        } else {
            return response()->json(['error' => 'Xeta basverdi']);
        }
    }
    public function newsletter(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'email'=>'email'
        ]);
        $validator1 = FacadesValidator::make($request->all(), [
            'email'=>'required'
        ]);

        if ($validator1->fails()) {
            return response()->json(['error' => 'Bos ola bilmez']);
        }
        if ($validator->fails()) {
            return response()->json(['error' => 'Mail  momatı uyğun deyil']);
        }

        $response = new Newsletter;
        $response->email = $request->email;
        $is_saved = $response->save();

        if ($is_saved) {
            return response()->json(['success' => 'Abune oldunuz']);
        } else {
            return response()->json(['error' => 'Xata bsa verdi']);
        }
    }
    public function getForm()
    {
        $response = ContactForm::OrderBy('created_at','desc')->get();
        return view('Back.contact.index', compact('response'));
    }
    public function getNewsletter()
    {
        $response = Newsletter::get();
        return view('Back.newsletter.index', compact('response'));
    }
}
