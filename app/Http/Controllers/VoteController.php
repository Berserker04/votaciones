<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get("name");
        $email = $request->get("email");
        if (isset($name) and isset($email)) {

            $name = $request->get("name");

            $users = User::where("email", $email)
                ->get();

            $id = 0;

            if (count($users) > 0) {

                if ($users[0]["voto"] == "si") {
                    dd("Nuestro sistema ya registra un boto con este correo.");
                    return redirect("/");
                }
                $id = $users[0]["id"];
            } else {
                $user = User::created([
                    "name" => $name,
                    "email" => $email,
                    "voto" => "no"
                ]);

                $id = $user["id"];
            }
            return view("home", [
                "user_id" =>  $id
            ]);
        }
        return redirect("/");
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
        // dd($request->get("user_id"));
        // dd($request->get("user_id"));
        $user = User::find($request->get("user_id"));

        if($user->voto == "si"){
            dd("Nuestro sistema ya registra un boto con este correo.");
            return redirect("/");
        }

        $vote = new Vote();

        $vote->vote = $request->get("voto");
        $vote->user_id = $request->get("user_id");
        $vote->save();

        
        $user->voto = "si";
        $user->save();

        return redirect("/");
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
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
