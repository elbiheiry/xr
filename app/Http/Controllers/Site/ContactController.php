<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('site.pages.contact.index');
    }

    /**
     * store new message
     *
     * @param ContactRequest $request
     * @return Response
     */
    public function store(ContactRequest $request)
    {
        try {
            Message::create($request->all());

            return response()->json(
                app()->getLocale() == 'en' ? 'Your message has been sent , we will contact you ASAP': 'تم إرسال رسالتك وسيتم التواصل معكم في أقرب وقت ممكن'
                , 200);
        } catch (\Throwable $th) {
            return error_response();
        }
    }
}
