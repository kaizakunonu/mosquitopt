<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use function response;
use function request;

class UploadFileController extends Controller {

    /**
     * Upload an Excel sheet containing data for a given IC.
     *
     * @param Request $request
     * @return Response
     */
    public function getIcUploadForm( Request $request ): Response
    {

        return response()->view('ics.upload', ['pc'=>request('pc'),
            'pt'=>request('pt'), 'en'=>request('en'),] );
    }

    /**
     * Upload an Excel sheet containing data for a given ED.
     *
     * @return Response
     */
    public function getEdUploadForm( ): Response
    {

        return response()->view('eds.upload', ['pc'=>request('pc'),
            'pt'=>request('pt'),'en'=>request('en'), ]);
    }


    /**
     * Upload an Excel sheet containing data for a given SS.
     *
     * @param Request $request
     * @return Response
     */
    public function getSsUploadForm( Request $request ): Response
    {

        return response()->view('sss.upload', ['pc'=>request('pc'),
            'pt'=>request('pt'), 'en'=>request('en'),] );
    }

    public function showUploadFile(Request $request) {
        $file = $request->file('eds');

        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
       return redirect('ed_import');
    }
}
