<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends \Illuminate\Routing\Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index(): Response
    {
        $users = DB::table('users')->get();

        return \response()->view('user.index', ['users' => $users]);
    }

}
