<?php

namespace App\Imports;

use App\Models\Consent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class IcsImport implements ToModel, WithUpserts, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Consent
     */
    public function model(array $row):Consent
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



        //Check whether a Sample Sorting attribute is present in the Excel sheet

        foreach ($ic_attributes as $ic_attribute)
        {
            if( in_array( $ic_attribute, $columns,true ) )
            {
                $data[ $ic_attribute ] = $row[ $ic_attribute ];
            }
        }

        return new Consent( $data );
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
