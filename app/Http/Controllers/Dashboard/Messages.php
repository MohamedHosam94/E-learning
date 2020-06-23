<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\ReplayContact;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Messages extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moduleName = $this->getNameFromController();
        $messages = Message::paginate(10);
        return view('Dashboard.messages.index' , 
        compact('messages' , 'moduleName' ) );
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        $moduleName = $this->getNameFromController() ;
        return view('Dashboard.messages.edit' , compact('message' , 'moduleName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();

        alert()->success('Message is Deleted' , 'Done');
        return redirect()->back();
    }



     public function replay($id)
     { 
        // dd(request()->message);
       $message = Message::findOrFail($id);
       $replay  =  request()->validate(['message' => ['required' , 'min:5' , 'max:500']]);
       $replay = $replay['message'];
    //    dd($replay);
       Mail::send(new ReplayContact($message , $replay));

       alert()->success('Replay Sent' , 'Done');
       return redirect()->route('messages.edit' , $message->id);
    //    dd($message->message);

     } 
}
