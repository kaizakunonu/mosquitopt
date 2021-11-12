<?php

namespace App\Imports;

use App\Models\SS;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class SSsImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
     * @param array $row
     *
     * @return SS
     */
    public function model(array $row): SS
    {

        /**
         * get Excel sheet heading cells
         * @var
         *
         * array $columns
         */
        $columns = array_keys( $row );

        /**
         * create an empty array for holding non-heading cells' data
         *
         * @var array
         */
        $data = array();

        /**
         * create an array for holding all Sample Sorting attributes
         *
         * @var array $ss_attributes
         */
        $ss_attributes = array( 'pc', 'ac', 'en', 'sen', 'dt', 'ft', 'fr', 'ssen', 'sfr', 'tx', 'sas', 'me', 'sid', 'n',
                             'notes', 'slc', 'bf', 'st', 'si', 'sc', 'ni', 'nb', 'sid=01', 'sid=02', 'sid=03',
                             'sid=04', 'sid=05', 'sid=06', 'sid=07', 'nd', );


        //Check whether a Sample Sorting attribute is present in the Excel sheet

        foreach ($ss_attributes as $ss_attribute)
        {
            if( in_array( $ss_attribute, $columns,true ) )
            {
                $data[ $ss_attribute ] = $row[ $ss_attribute ];
            }
        }

        return new SS( $data );
    }

    /**
     * @return array
     *
     *
     */

    public function uniqueBy(): array
    {

        return ['fr',];
    }


}
