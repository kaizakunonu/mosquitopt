<?php

namespace App\Http\Controllers;

use App\Models\Consent;
use App\Models\ED;
use App\Models\Project;
use App\Models\SS;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use function request;
use function response;

class DBExportController extends Controller
{
    public function eddbexportview(): Response
    {
        try {
            // get the project
            $project = Project::find(request('pc'));

        } catch (ModelNotFoundException $modelNotFoundException) {

            return response()->$modelNotFoundException->getMessage();
        }


        return response()->view('eds.download',
            [
                'pc' => request('pc'),
                'pt' => request('pt'),
                'project' => $project,
            ]);

    }


    /**
     * @param $db_data
     */

    public function ExportExcel($db_data)
    {

        ini_set('max_execution_time', 0);

        ini_set('memory_limit', '4000M');


        try {

            $spreadSheet = new Spreadsheet();

            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);

            $spreadSheet->getActiveSheet()->fromArray($db_data);


            $Excel_writer = new Xls($spreadSheet);
            $file_name = 'filename="' . session('fname') . '_' . request('pc') . '_en_' . request('en') . '.xls"';

            header('Content-Type: application/vnd.ms-excel');

            header('Content-Disposition: attachment;' . $file_name);

            header('Cache-Control: max-age=0');

            ob_end_clean();

            $Excel_writer->save('php://output');

            exit();

        } catch (Exception $e) {

            return;

        }


    }

    /**
     *This function loads Informed Consent (IC) data from the database then converts it
     * into an array that will be exported to Excel workbook
     */


    public function exportIcData()
    {
        $records = DB::table(Consent::getEdTableName())
            ->where('pc', '=', request('pc'))
            ->where('en', '=', request('en'))
            ->orderBy('fr', 'ASC')->get();
        /**
         * create an array for holding all Sample Sorting fields
         *
         *
         */

        $ic_attributes[] = [
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


        foreach ($records as $record) {


            $ic_attributes[] = [

                'pc' => $record->pc,
                'en' => $record->en,
                'sen' => $record->sen,
                'si' => $record->si,
                'irb' => $record->irb,
                'fr' => $record->fr,
                'ict' => $record->ict,
                'dt' => $record->dt,
                'dsen' => $record->dsen,
                'ea' => $record->ea,
                'cr' => $record->cr,
                'cp' => $record->cp,
                'hh' => $record->hh,
                'stid' => $record->stid,
                'shh' => $record->shh,
                'st' => $record->st, // station
                'vi' => $record->vi,
                'vn' => $record->vn,
                'notes' => $record->notes,
                'esi' => $record->esi,
                'rsi' => $record->rsi,

            ];
        }

        $this->ExportExcel($ic_attributes);


    }


    /**
     *This function loads the Experiment Design(ED) data from the database then converts it
     * into an array that will be exported to Excel workbook
     */


    public function exportEdData()
    {
        $records = DB::table(ED::getEdTableName())
            ->where('pc', '=', request('pc'))
            ->where('en', '=', request('en'))
            ->orderBy('fr', 'ASC')->get();
        /**
         * create an array for holding all Sample Sorting fields
         *
         *
         */

        $ed_attributes[] = [
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


        foreach ($records as $record) {


            $ed_attributes[] = [

                'pc' => $record->pc,
                'en' => $record->en,
                'sen' => $record->sen,
                'si' => $record->si,
                'fr' => $record->fr,
                'dt' => $record->dt,
                'ea' => $record->ea,
                'cr' => $record->cr,
                'cp' => $record->cp,
                'hh' => $record->hh,
                'sid' => $record->sid,
                'me' => $record->me,
                'in' => $record->in,
                'ht' => $record->ht,
                'st' => $record->st,
                'ft' => $record->ft,
                'hp' => $record->hp,
                'rnd' => $record->rnd,
                'blk' => $record->blk,
                'shh' => $record->shh,
                'stn' => $record->stn,
                'vi' => $record->vi,
                'tr' => $record->tr,
                'dy' => $record->dy,
                'hs' => $record->hs,
                'vc' => $record->vc,
                'dsen' => $record->dsen,
                'notes' => $record->notes,
                'esi' => $record->esi,
                'rsi' => $record->rsi,

            ];
        }

        $this->ExportExcel($ed_attributes);


    }

    /**
     *This function loads the Sample Sorting (SS) data from the database then converts it
     * into an array that will be exported to Excel workbook
     * @return void|Response
     */


    public function exportSsData(): Response
    {
        $records = DB::table(SS::getSsTableName())
            ->where('pc', '=', request('pc'))
            ->where('en', '=', request('en'))
            ->orderBy('fr', 'ASC')
            ->get();
        if (isset($records))
        {

        /**
         * create an array for holding all Sample Sorting (SS) fields
         *
         *
         */

        $ss_attributes[] = [
            'pc',
            'en',
            'sen',
            'dt',
            'ft',
            'ssen',
            'sfr',
            'fr',
            'tx',
            'sas',
            'n',
            'me',
            'notes',
            'slc',
            'bf',
            'ni',
            'nb',
            'st',
            'sid',
            'sid=01',
            'sid=02',
            'sid=03',
            'sid=04',
            'sid=05',
            'sid=06',
            'sid=07',
            'nd',
            'sc',
            'si',
        ];


        foreach ($records as $record) {


            $ss_attributes[] = [

                'pc' => $record->pc,
                'en' => $record->en,
                'sen' => $record->sen,
                'dt' => $record->dt,
                'ft' => $record->ft,
                'ssen' => $record->ssen,
                'sfr' => $record->sfr,
                'fr' => $record->fr,
                'tx' => $record->tx,
                'sas' => $record->sas,
                'n' => $record->n,
                'me' => $record->me,
                'notes' => $record->notes,
                'slc' => $record->slc,
                'bf' => $record->bf,
                'ni' => $record->ni,
                'nb' => $record->nb,
                'st' => $record->st,
                'sid' => $record->sid,
                'sid=01' => $record->sid=01,
                'sid=02' => $record->sid=02,
                'sid=03' => $record->sid=03,
                'sid=04' => $record->sid=04,
                'sid=05' => $record->sid=05,
                'sid=06' => $record->sid=06,
                'sid=07' => $record->sid=07,
                'nd' => $record->nd,
                'sc' => $record->sc,
                'si' => $record->si,

            ];
        }

        $this->ExportExcel($ss_attributes);
        }

        else
        {
          return response()->view('errors.db');
        }


    }
}
