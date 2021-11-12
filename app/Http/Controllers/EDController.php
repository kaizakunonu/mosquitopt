<?php

namespace App\Http\Controllers;

use App\Exports\EdsExport;
use App\Imports\EdsImport;
use App\Models\ED;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use function response;
use function request;

class EDController extends Controller
{
    /**
     * The database name for ED class
     * @var string
     */
    protected $table_name = 'e_d_s';

    /**
     * Export a listing of the selected ED variables.
     *
     * @param Request $request
     * @return BinaryFileResponse
     */
    public function export(Request $request): BinaryFileResponse
    {
        // get the selected attributes for an experiment from an incoming Request
        $ed_keys = array_keys($request->except(['_token',]));

        /**
         * create an array for holding all Sample Sorting fields
         *
         * @var array $ed_attributes
         */

        $ed_attributes = [
            'pc',
            'en',
            'sen',
            'si',
            'fr',
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
        ];

        /**
         * An array to hold column headings
         *
         */
        $headers = array();

        //Check whether a Sample Sorting attribute is present in the Excel sheet,
        // If it is, place in $headers array

        foreach ($ed_attributes as $ed_attribute) {
            if (in_array($ed_attribute, $ed_keys, true)) {
                $headers[$ed_attribute] = $ed_attribute;
            }
        }

        /**
         * An array to hold data
         *
         */

        $values = array();

        // Populate the first data row with empty values except for pc, aid

        foreach ($headers as $header) {
            $values [$header] = '';
            if ($header == 'pc') {
                $values[$header] = session('pc', 'empty');

            }


        }

        // get current user first name
        $fname = session('fname');

        // prepend activity code (ac) to file name
        $file_name = $fname . '_ED_for_' . session('pc') . '_project_' . date('s') . '.xlsx';

        $export = new EdsExport([$ed_keys], $values);
        return Excel::download($export, $file_name);
    }

    /**
     * Import a listing of the selected ED variables.
     *
     * @return Application|RedirectResponse|Redirector
     */

    public function import()
    {
        // import data from uploaded file
        Excel::import(new EdsImport(), request()->file('eds'));

        return redirect(route('eds.index', ['pc'=>request('pc'),
            'pt'=>request('pt'), 'en'=>request('en')]))->with('success', 'All good! Data successfully uploaded! ');
    }

    /**
     * Display a listing of the ED.
     *
     * @return Response
     */
    public function index(): Response
    {
        $eds_per_pc = DB::table($this->table_name)
            ->select('en')
            ->distinct()
            ->where('pc', '=', session('pc'))
            ->paginate(10);
        return response()->view('eds.index',
            [   'eppc' => $eds_per_pc,
                request()
            ]); // eppc = eds per project code
    }

    /**
     * Show the form for creating a new ED.
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


        return response()->view('eds.create',
            [
                'pc' => request('pc'),
                'pt' => request('pt'),
                'project' => $project,
            ]);
    }

    /**
     * Store a newly created ED in storage.
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
        $ed = DB::table(ED::getEdTableName())
            ->where('pc', '=', request('pc'))
            ->where('en', '=', request('en'))
            ->orderBy('fr')
            ->paginate()->fragment('frs');


            return response()->view('eds.show', ['ed'=>$ed, request(), ]);

    }

    /**
     * Show the HTML form for editing the specified form row.
     *
     * Edit the form row of a given ED experiment
     * @return Response
     */
    public function edit(): Response
    {
        $ed = DB::table(ED::getEdTableName())
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
        $table_name = DB::table(ED::getEdTableName());// Get table name
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
        DB::table(ED::getEdTableName())
            ->where('pc', '=', request('pc'))
            ->where('en', '=', request('en'))
            ->where('fr', '=', request('fr'))->delete();
        return response()->view('eds.index',request());
    }
}
