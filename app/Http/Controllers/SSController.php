<?php

namespace App\Http\Controllers;

use App\Exports\SSsExport;
use App\Imports\SSsImport;
use App\Models\Project;
use App\Models\SS;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use function request;
use function response;

class SSController extends Controller
{
    /**
     * The database name for Sample Sorting data
     * @var string
     */
    protected $table_name = 's_s';

    /**
     * Export a listing of the selected SS attributes.
     *
     * @param Request $request
     * @return BinaryFileResponse
     */

    public function export(Request $request): BinaryFileResponse
    {

        // get the selected attributes for an experiment from an incoming Request
        $ss_keys = array_keys($request->except(['_token',]));


        /**
         * create an array for holding all Sample Sorting fields
         *
         * @var array $ss_attributes
         */

        $ss_attributes = ['pc', 'en', 'sen', 'dt', 'ft', 'fr', 'ssen', 'sfr', 'tx', 'sas', 'me', 'n',
            'notes', 'slc', 'bf', 'st', 'si', 'sc', 'ni', 'nb', 'sid', 'sid=01', 'sid=02', 'sid=03',
            'sid=04', 'sid=05', 'sid=06', 'sid=07', 'nd',];

        /**
         * An array to hold column headings
         *
         */
        $headers = array();

        //Check whether a Sample Sorting attribute is present in the Excel sheet,
        // If it is, place in $headers array

        foreach ($ss_attributes as $ss_attribute) {
            if (in_array($ss_attribute, $ss_keys, true)) {
                $headers[$ss_attribute] = $ss_attribute;
            }
        }

        /**
         * An array to hold data
         *
         */

        $values = array();

        // Populate the first data row with empty values except for pc

        foreach ($headers as $header) {
            $values [$header] = '';

            if ($header == 'pc') {
                $values[$header] = session('pc', 'default');

            }

        }

        // prepend project code to file name
        $file_name = session('fname') . '_SS_for_' . session('pc') . '_project_' . date('s') . '.xlsx';

        $export = new SSsExport($headers, $values);
        return Excel::download($export, $file_name);
    }

    /**
     * Import a listing of the selected SS attributes.
     *
     * @return Application|RedirectResponse|Redirector
     */

    public function import()
    {
        // import data from uploaded file
        Excel::import(new SSsImport(), request()->file('sss'));

        return redirect(route('sss.index', ['pc'=>request('pc'),
            'pt'=>request('pt'), 'en'=>request('en'),] ))
            ->with('success', 'All good! SS Data uploaded successfully!');

    }


    /**
     * Display a listing of the SS resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        /**
         * Sample Sorting experiments per project code
         * @var string $ss_en_per_pc
         */

        $ss_en_per_pc = DB::table($this->table_name)
            ->select('en')
            ->distinct()
            ->where('pc', '=', session('pc'))
            ->get();
        return response()->view('sss.index', [
            'sepp' => $ss_en_per_pc,
            'pc' => request('pc'),
            'pt' => request('pt'),]); // sepp = sss experiments per project code
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        // get the project to create the experiment for
        $project = Project::find(request('pc'));


        return response()->view('sss.create',
            [
                'user' => session('user_id'),
                'pc' => request('pc'),
                'pt' => request('pt'),
                'project' => $project,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(): Response
    {
        return response();
    }

    /**
     * Display the specified resource.
     *
     * Fetch all form rows of a given ED experiment
     * @return Response
     */
    public function show(): Response
    {
        $ss = DB::table(SS::getSsTableName())
            ->where('pc', '=', request('pc'))
            ->where('en', '=', request('en'))
            ->orderBy('fr')
            ->paginate()
            ->fragment('frs');

        return response()->view('sss.show', ['ss'=>$ss, request(), ]);
    }

    /**
     * Show the HTML form for editing the specified SS form row.
     *
     * @return Response
     */
    public function edit(): Response
    {
        $ss = DB::table(SS::getSsTableName())
            ->where('pc', '=', request('pc'))
            ->where('en', '=', request('en'))
            ->where('fr', '=', request('fr'))
            ->get();

        return response()->view('sss.edit', ['ss'=>$ss, request()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return RedirectResponse
     */
    public function update(): RedirectResponse
    {
        $table_name = DB::table(SS::getSsTableName());// Get table name
        if (isset($table_name)) {


            // Update it with new values
            $table_name->upsert(
                [   'pc' => request('pc'),
                    'en' => request('en'),
                    'sen' => request('sen'),
                    'dt' => request('dt'),
                    'ft' => request('ft'),
                    'ssen' => request('ssen'),
                    'sfr' => request('sfr'),
                    'fr' => request('fr'),
                    'tx' => request('tx'),
                    'sas' => request('sas'),
                    'me' => request('me'),
                    'n' => request('n'),
                    'bf' => request('bf'),
                    'slc' => request('slc'),
                    'st' => request('st'),
                    'si' => request('si'),
                    'sc' => request('sc'),
                    'notes' => request('notes'),
                    'sid' => request('sid'),
                    'ni' => request('ni'),
                    'nb' => request('nb'),
                    'sid=01' => request('sid=01'),
                    'sid=02' => request('sid=02'),
                    'sid=03' => request('sid=03'),
                    'sid=04' => request('sid=04'),
                    'sid=05' => request('sid=05'),
                    'sid=06' => request('sid=06'),
                    'sid=07' => request('sid=07'),
                    'nd' => request('nd'),
                    'updated_at'=> now(),
                ],
                ['fr'], // uniqueBy array
                ['pc', 'en', 'sen', 'dt', 'ft', 'ssen', 'sfr', 'tx', 'sas', 'me', 'n',
                    'notes', 'slc', 'bf', 'st', 'si', 'sc', 'ni', 'nb', 'sid', 'sid=01', 'sid=02', 'sid=03',
                    'sid=04', 'sid=05', 'sid=06', 'sid=07', 'nd', 'updated_at']); // updatable columns

        }

        else
        {
            //return response()->view('errors.db');
            return back()->withInput()->with('status', 'Update failed! A table with that name is probably undefined');
        }

       // return response()->view('sss.index',request());
        return back()->withInput()->with('status','Update successful');
    }

    /**
     * Remove the specified SS row from storage.
     *
     * Delete the form row record in the database
     * @return Response
     */
    public function destroy(): Response
    {
        DB::table(SS::getSsTableName())
            ->where('pc', '=', request('pc'))
            ->where('en', '=', request('en'))
            ->where('fr', '=', request('fr'))->delete();

        $ss_en_per_pc = DB::table($this->table_name)
            ->select('en')
            ->distinct()
            ->where('pc', '=', session('pc'))
            ->get();
        return response()->view('sss.index',[request(),'sepp' => $ss_en_per_pc,]);
    }
}
