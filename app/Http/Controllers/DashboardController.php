<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showDashboard()
    {
      //  session_start();
        session(['uid'=>Auth::User()->getAuthIdentifier(), 'fname'=>Auth::User()->fname]);
        // Forget a single key...
        session()->forget('pc');


        // get all projects
        $readable_projects = DB::table('projects')->get();

        // get all project readers
        $project_readers = DB::table('project_readers')->get();


        /**
         * Create an empty array
         **/
        $projects = array();

        foreach ($readable_projects as $project) {

            foreach ($project_readers as $reader) {
                if ($reader->user_id == session('uid') and $project->uuid == $reader->project_id) {
                    $projects [] = $project;
                }
            }
        }


        return view('dashboard', ['projects' => $projects,]);
    }
}
