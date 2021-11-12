<?php

namespace App\Http\Controllers;

use App\Exports\ICsExport;
use App\Imports\IcsImport;
use App\Models\Consent;
use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use function response;
use function request;


class ConsentController extends Controller
{
    /**
     * The database name for Consent class
     *
     * This variable holds the name of database table for Consent model.
     *
     * @var string the table name should follow snake-case naming convention
     */
    protected $table_name = 'consents';

    /**
     * Export a listing of the selected Consent variables
     *
     *The method will use Laravel Excel export logic.
     * @param Request $request Get an instance of incoming request
     * @return BinaryFileResponse Download an empty spreadsheet
     */
    public function export(Request $request): BinaryFileResponse
    {
        // get the selected attributes for a consent from an incoming Request
        $ic_keys = array_keys($request->except(['_token',]));

        /**
         * create an array for holding all Informed Consent fields
         *
         * @var array $ic_attributes
         */

        $ic_attributes = [
            'pc',
            'en',
            'sen',
            'si',
            'irb',
            'fr',
            'ict',
            'dt',
            'dsen',
            'ea',
            'cr',
            'cp',
            'hh',
            'stid',
            'shh',
            'st',
            'vi',
            'vn',
            'notes',
            'esi',
            'rsi',
        ];

        /**
         * An array to hold column headings
         *
         */
        $headers = array();

        //Check whether an Informed Consent attribute is present in the Excel sheet,
        // If it is, place in $headers array

        foreach ($ic_attributes as $ic_attribute) {
            if (in_array($ic_attribute, $ic_keys, true)) {
                $headers[$ic_attribute] = $ic_attribute;
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
                $values[$header] = session('pc', 'empty');

            }


        }

        // get current user first name
        $fname = session('fname');

        // prepend project code (pc) to file name
        $file_name = $fname . '_IC_for_' . session('pc') . '_project_' . date('s') . '.xlsx';

        $export = new ICsExport([$ic_keys], $values);
        return Excel::download($export, $file_name);
    }

    /**
     * Import a listing of the selected IC variables.
     *
     * @return Application|RedirectResponse|Redirector
     */

    public function import()
    {
        // import data from uploaded file
        Excel::import(new IcsImport(), request()->file('ics'));

        return redirect(route('ics.index', ['pc'=>request('pc'),
            'pt'=>request('pt'), 'en'=>request('en'),]))
            ->with('success', 'All good! IC Data successfully uploaded! ');
    }

    /**
     * Display a listing of the IC.
     *
     * Creates an instance of Illuminate\Pagination\LengthAwarePaginator
     * @return Response
     */
    public function index(): Response
    {
        $ics_per_pc = DB::table($this->table_name)
            ->select('en')
            ->distinct()
            ->where('pc', '=', session('pc'))
            ->paginate(10);
        return response()->view('ics.index',
            [   'ippc' => $ics_per_pc,
                request()
            ]); // ippc = ics per project code
    }

    /**
     * Show the form for creating a new IC.
     *
     * @return Response
     */
    public function create(): Response
    {
        try {
            // get the project
            $project = Project::find(request('pc'));

        } catch (ModelNotFoundException $modelNotFoundException) {

            return response()->$modelNotFoundException->getMessage();
        }


        return response()->view('ics.create',
            [
                'pc' => request('pc'),
                'pt' => request('pt'),
                'project' => $project,
            ]);
    }

    /**
     * Store a newly created IC in storage.
     *
     * @return Response
     */
    public function store(): Response
    {
        return response();
    }

    /**
     * Display the specified ED form row.
     *
     * Will display ED form row database record in tabular format
     * @return Response
     */
    public static function show(): Response
    {
        // Creates an instance of Illuminate\Pagination\LengthAwarePaginator
        $ic = DB::table(Consent::getEdTableName())
            ->where('pc', '=', request('pc'))
            ->where('en', '=', request('en'))
            ->orderBy('fr')
            ->paginate(1)->fragment('frs');
        // Fetch ED record
        $fr='0';
        foreach ( $ic as $record)
        {
            $fr= $record->fr;
            break;
        }

        return response()->view('ics.show', ['ic'=>$ic, request(),'fr'=>$fr ]);

    }

    /**
     * Show the HTML form for editing the specified form row.
     *
     * Edit the form row of a given ED experiment
     * @return Response
     */
    public function edit(): Response
    {
        $ed = DB::table(Consent::getEdTableName())
            ->where('pc', '=', request('pc'))
            ->where('en', '=', request('en'))
            ->where('fr', '=', request('fr'))
            ->get();
        return response()->view('eds.edit', ['ed'=>$ed, request()]);
    }

    /**
     * Update the specified form row in storage.
     *
     * Accept $_POST data, and permanently store in database
     * @return RedirectResponse
     */
    public function update(): RedirectResponse
    {
        $table_name = DB::table(Consent::getEdTableName());// Get table name
        if (isset($table_name)) {


            // Update it with new values
            $table_name->upsert(
                [   'pc' => request('pc'),
                    'en' => request('en'),
                    'sen' => request('sen'),
                    'si' => request('si'),
                    'fr' => request('fr'),
                    'dt' => request('dt'),
                    'ea' => request('ea'),
                    'cr' => request('cr'),
                    'cp' => request('cp'),
                    'hh' => request('hh'),
                    'sid' => request('sid'),
                    'me' => request('me'),
                    'in' => request('in'),
                    'ht' => request('ht'),
                    'st' => request('st'),
                    'ft' => request('ft'),
                    'hp' => request('hp'),
                    'rnd' => request('rnd'),
                    'blk' => request('blk'),
                    'shh' => request('shh'),
                    'stn' => request('stn'),
                    'vn' => request('vn'),
                    'vi' => request('vi'),
                    'tr' => request('tr'),
                    'dy' => request('dy'),
                    'hs' => request('hs'),
                    'vc' => request('vc'),
                    'dsen' => request('dsen'),
                    'notes' => request('notes'),
                    'esi' => request('esi'),
                    'rsi' => request('rsi'),
                    'updated_at'=> now(),
                ],
                ['fr'], // uniqueBy
                [  'pc',
                    'en',
                    'sen',
                    'si',
                    'dt',
                    'ea',
                    'cr',
                    'cp',
                    'hh',
                    'sid',
                    'me',
                    'in',
                    'ht',
                    'st',
                    'ft',
                    'hp',
                    'rnd',
                    'blk',
                    'shh',
                    'stn',
                    'vi',
                    'tr',
                    'dy',
                    'hs',
                    'vc',
                    'dsen',
                    'notes',
                    'esi',
                    'rsi',
                    'updated_at']); // updatable columns

        }

        else
        {
            return back()->withInput()->with('status', 'Update failed! A table with that name is probably undefined');
        }

        return back()->withInput()->with('status','Update successful');
    }

    /**
     * Remove the specified ED form row  from storage.
     *
     * @return Response
     */
    public function destroy(): Response
    {
        DB::table(Consent::getEdTableName())
            ->where('pc', '=', request('pc'))
            ->where('en', '=', request('en'))
            ->where('fr', '=', request('fr'))->delete();
        return response()->view('eds.index',request());
    }
}
