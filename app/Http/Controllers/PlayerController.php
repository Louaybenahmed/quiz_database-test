<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlayerController extends Controller
{
    /**
     * Remove the specified player from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    // Delete the player by idPlayer column
    DB::table('Player')->where('id', $id)->delete();
    
    // Set a success message
    Session::flash('success', 'Player deleted successfully!');

    // Redirect back to the previous page
    return back();
}


    
    /**
     * Show the form for creating a new player.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('welcome');
    }

    public function index()
    {
        // Fetch all players
        $players = Player::all();
        return view('welcome', compact('players'));
    }
    /**
     * Store a newly created player in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'userName' => 'required|string|max:255|unique:player,userName',//"uniqueyou" : can't create a player with the same userName 
            'email' => 'required|string|email|max:255|unique:player,email',//"uniqueyou" : can't create a player with the same email 
            'password' => 'required|string|min:1',
            'score' => 'required|integer',
            'gold' => 'required|integer',
        ]);

        Player::create([
            'userName' => $request->userName,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encrypt the password
            'score' => $request->score,
            'gold' => $request->gold,
        ]);

        return redirect()->route('player.create')->with('success', 'Player added successfully!');
    }
}
