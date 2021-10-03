<?php

namespace App\Http\Controllers;
use Mail;
use App\Models\Mailenv;
use Illuminate\Http\Request;
use App\Mail\NotifyMai;
class MailenvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function basic_email(Request $request) {
        
        $data["contenido"] = $request->comentario;
        $data["estado"] = $request->estado;
        
        Mail::send('mail.Test_mail',$data , function($message) use ($request) {

           $message->to($request->mail, 'Tutorials Point')->subject
              ('Laravel Basic Testing Mail');
           $message->from('xyz@gmail.com','Piensa mas alla');
        });
        return "se envio bien".$data["contenido"];
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
     * @param  \App\Models\Mailenv  $mailenv
     * @return \Illuminate\Http\Response
     */
    public function show(Mailenv $mailenv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mailenv  $mailenv
     * @return \Illuminate\Http\Response
     */
    public function edit(Mailenv $mailenv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mailenv  $mailenv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mailenv $mailenv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mailenv  $mailenv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mailenv $mailenv)
    {
        //
    }
}
