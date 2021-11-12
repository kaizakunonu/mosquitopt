<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectReader;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    /**
     * The database name for Project class
     * @var string $table_name
     */
    protected $table_name = 'projects';

    /**
     * Display a listing of the Project models.
     *
     * @return Response
     */
    public function index(): Response
    {

        $own_projects = DB::table($this->table_name)
            ->where('pi', '=', \session('uid'))
            ->orderBy('title')
            ->latest()
            ->paginate(10)->fragment('projects');
        return \response()->view('projects.index', ['own_projects' => $own_projects]);
    }

    /**
     * Show the HTML form for creating a new project.
     *
     * @return Response
     */
    public function create(): Response
    {
        return \response()->view('projects.create', ['uid' => \session('uid')]);
    }

    /**
     * Store a newly created project in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'pi' => 'bail|required|string|max:255',
            'pc' => 'bail|required|string|max:255|unique:projects',
            'pl' => 'bail|required|string|max:255',
            'pa' => 'bail|required|string|max:255',
            'title' => 'bail|required|string|max:255|unique:projects',
            'sd' => 'bail|required|date|after_or_equal:today|',
            'ed' => 'bail|required|date|after:today|',
            'description' => 'bail|required|string|max:1000000|',
            'funder' => 'bail|required|string|max:255|',
            'department' => 'bail|required|string|max:255|',
        ]);

        Project::create(
        [
            'pi' => \request('pi'),
            'pc' => \request('pc'),
            'pl' => \request('pl'),
            'pa' => \request('pa'),
            'title' => \request('title'),
            'sd' => \request('sd'),
            'ed' => \request('ed'),
            'description' => \request('description'),
            'funder' => \request('funder'),
            'department' => \request('department'),
        ]);


        $project_id = DB::table('projects')
            ->where('title', \request('title'))
            ->value('uuid');

        ProjectReader::create(
        [
            'user_id' => \request('pi'),
            'project_id' => $project_id,
        ]);


        $own_projects = Project::wherePi(\session('uid'))
           ->orderBy('title')
           ->latest()
           ->paginate(10);

        return \response()->view('projects.index', ['own_projects' => $own_projects]);
    }

    /**
     * Display the specified project.
     *
     * @param Project $project
     * @return Response
     */
    public function show(Project $project): Response
    {
        // Start the session
        session_start();

        session(['pc' => $project->pc,]);

        // get the project
        $project = Project::find($project->uuid);


        // show the view and pass the project to it
        return \response()->view('projects.show', ['project' => $project]);
    }

    /**
     * Show the HTML form for editing the specified project.
     *
     * @param Project $project
     * @return Response
     */
    public function edit(Project $project): Response
    {
        // get the project
        $project = Project::find($project->uuid);

        // show the edit form and pass the project
        return \response()->view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified project in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return Response
     */
    public function update(Request $request, Project $project): Response
    {
        $request->validate([
            'pi' => 'bail|required|string|max:255',
            'pc' => 'bail|required|string|max:255',
            'pl' => 'bail|required|string|max:255',
            'pa' => 'bail|required|string|max:255',
            'title' => 'bail|required|string|max:255|',
            'sd' => 'bail|required|date',
            'ed' => 'bail|required|date|after:today|',
            'description' => 'bail|required|string|max:1000000|',
            'funder' => 'bail|required|string|max:255|',
            'department' => 'bail|required|string|max:255|',
        ]);

        $puuid = $project->uuid; // Get project UUID
        if (isset($puuid)) {
            // Fetch the project with the given UUID from the database
            $project = Project::whereUuid($puuid);

            // Update it with new values
            $project->update(
                [   'uuid' => $puuid,
                    'pi' => \request('pi'),
                    'pc' => \request('pc'),
                    'title' => \request('title'),
                    'pl' => \request('pl'),
                    'pa' => \request('pa'),
                    'description' => \request('description'),
                    'funder' => \request('funder'),
                    'sd' => \request('sd'),
                    'ed' => \request('ed'),
                    'department' => \request('department'),
                ]);

        } else {
            echo 'No project with that id';
        }


        // redirect
        Session::flash('message', 'Successfully updated project!');

        $own_projects = DB::table($this->table_name)
            ->where('pi', '=', \session('uid'))
            ->orderBy('title')
            ->latest()
            ->paginate(10)->fragment('projects');

        return \response()->view('projects.index', ['own_projects' => $own_projects]);


    }

    /**
     * Remove the specified project from storage.
     *
     * @param Project $project
     * @return RedirectResponse
     */
    public function destroy(Project $project): RedirectResponse
    {

        // delete
        $project = DB::table($this->table_name)->find($project);
        $project->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the project!');
        return Redirect::to('projects');
    }
}
