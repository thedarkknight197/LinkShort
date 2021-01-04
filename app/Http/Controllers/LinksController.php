<?php

namespace App\Http\Controllers;

use App\Models\Link as UserLink;
use App\Models\User;
use Illuminate\Http\Request;

class LinksController extends Controller
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
        $data = $request->all();
        $link = new UserLink($data);

        $link->save();

        return response()->json(["msg" => "E'stato creato il link ".$link->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $link = UserLink::findOrFail($id);

        return response()->json(["link" => $link]);
    }

    public static function getByEmail($email)
    {
        $link = User::where('email', '=', $email)->get();

        return response()->json(["user" => $link]);
    }


    public function all()
    {
        $link = UserLink::get();

        return response()->json(["links" => $link]);
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
    public function update(Request $request, $id)
    {
        $data = request()->all();
        $link =  UserLink::findOrFail($id);

        $link->fill($data);

        $link->save();

        return response()->json(["link" => UserLink::findOrFail($link->id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = UserLink::findOrFail($id)->delete();
        response()->json($status? ["msg"=>"Cancellato con successo ".$id] : ["msg" => "C'è stato un problema con la tua richiesta!"]);
    }
}
