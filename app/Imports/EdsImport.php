<?php

namespace App\Imports;

use App\Models\ED;
use App\Models\SS;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class EdsImport implements ToModel, WithHeadingRow,WithUpserts
{
    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row): ?Model
    {

        /**
         * get Excel sheet heading cells
         *
         * @var array $columns
         */
        $columns = array_keys($row);


        /**
         * create an empty array for holding non-heading cells' data
         *
         */
        $data = array();

        /**
         *  populate the created array with non-heading cell data, using heading cells as keys
         */

        // Check if Project Code (PC) column is present in the Excel sheet
        if( in_array('pc', $columns,true ) )
        {
            $data[ 'pc' ] = $row[ 'pc' ];
        }

        // Check if Activity Code (AC) column is present in the Excel sheet
        if( in_array('ac', $columns,true ) )
        {
            $data[ 'ac' ] = $row[ 'ac' ];
        }

        // Check if Experiment Number(EN) column is present in the Excel sheet
        if ( in_array('en', $columns,true) )
        {

            $data[ 'en' ] = $row[ 'en' ];
        }

        // Check if Serial No (SEN) column is present in the Excel sheet
        if ( in_array('sen', $columns,true) )
        {

            $data[ 'sen' ] = $row[ 'sen' ];
        }

        // Check if Site (SI) column is present in the Excel sheet
        if ( in_array('si', $columns,true ) )
        {

            $data[ 'si' ] = $row[ 'si' ];
        }

        // Check if Form Row (FR) column is present in the Excel sheet
        if ( in_array('fr', $columns,true ) )
        {

            $data[ 'fr' ] = $row[ 'fr' ];
        }

        // Check if Date of Collection (DT) column is present in the Excel sheet
        if ( in_array('dt', $columns,true ) )
        {

            $data[ 'dt' ] = $row[ 'dt' ];
        }

        // Check if ED Form Serial No. (SSEN) column is present in the Excel sheet
        if ( in_array('ssen', $columns,true) )
        {

            $data[ 'ssen' ] = $row[ 'ssen' ];
        }

        // Check if ED Form Row(SFR) column is present in the Excel sheet
        if ( in_array('sfr', $columns,true ) )
        {

            $data[ 'sfr' ] = $row[ 'sfr' ];
        }

        // Check if Taxon (TX) column is present in the Excel sheet
        if ( in_array('tx', $columns,true) )
        {

            $data[ 'tx' ] = $row[ 'tx' ];
        }

        // Check if Sex and Abdominal Status (SAS) column is present in the Excel sheet
        if ( in_array('sas', $columns,true) )
        {

            $data[ 'sas' ] = $row[ 'sas' ];
        }

        // Check if Enumeration Area (EA) column is present in the Excel sheet
        if ( in_array('ea', $columns,true) )
        {

            $data[ 'ea' ] = $row[ 'ea' ];
        }

        // Check if Cluster (CR) column is present in the Excel sheet
        if ( in_array('cr', $columns,true ) )
        {

            $data[ 'cr' ] = $row[ 'cr' ];
        }

        // Check if Compound or Plot(CP) column is present in the Excel sheet
        if ( in_array('cp', $columns,true ) )
        {

            $data[ 'cp' ] = $row[ 'cp' ];
        }

        // Check if Number Caught (N) column is present in the Excel sheet
        if ( in_array('n', $columns,true ) )
        {

            $data[ 'n' ] = $row[ 'n' ];
        }


        // Check if Household (HH) column is present in the Excel sheet
        if ( in_array('hh', $columns,true ) )
        {

            $data[ 'hh' ] = $row[ 'hh' ];
        }

        // Check if Structure/Habitat ID (SID) column is present in the Excel sheet
        if ( in_array('sid', $columns,true ) )
        {

            $data[ 'sid' ] = $row[ 'sid' ];
        }

        // Check if Body Form (BF) column is present in the Excel sheet
        if ( in_array('bf', $columns,true ) )
        {

            $data[ 'bf' ] = $row[ 'bf' ];
        }

        // Check if Method(ME) column is present in the Excel sheet
        if ( in_array('me', $columns,true ) )
        {

            $data[ 'me' ] = $row[ 'me' ];
        }

        // Check if Number of individuals (NI) column is present in the Excel sheet
        if ( in_array('ni', $columns,true ) )
        {

            $data[ 'ni' ] = $row[ 'ni' ];
        }

        // Check if Number of Batches (NB) column is present in the Excel sheet
        if ( in_array('nb', $columns,true ) )
        {

            $data[ 'nb' ] = $row[ 'nb' ];
        }


        // Check if Indoor/Outdoor (IN) column is present in the Excel sheet
        if ( in_array('in', $columns,true ) )
        {

            $data[ 'in' ] = $row[ 'in' ];
        }

        // Check if Habitat Type (HT) column is present in the Excel sheet
        if ( in_array('ht', $columns,true ) )
        {

            $data[ 'ht' ] = $row[ 'ht' ];
        }

        // Check if Sample Discarded (sd) column is present in the Excel sheet
        if ( in_array('sd', $columns,true ) )
        {

            $data[ 'sd' ] = $row[ 'sd' ];
        }

        // Check if Sample Type (stp) column is present in the Excel sheet
        if ( in_array('stp', $columns,true ) )
        {

            $data[ 'stp' ] = $row[ 'stp' ];
        }

        // Check if Start Time (ST) column is present in the Excel sheet
        if ( in_array('st', $columns,true ) )
        {

            $data[ 'st' ] = $row[ 'st' ];
        }



        // Check if Finish Time (FT) column is present in the Excel sheet
        if (in_array('ft',$columns,true)){

            $data['ft'] = $row['ft'];
        }


        // Check if Holding Period (HP) column is present in the Excel sheet
        if (in_array('hp',$columns,true)){

            $data['hp'] = $row['hp'];
        }

        // Check if Round (RND) column is present in the Excel sheet
        if (in_array('rnd',$columns,true)){

            $data['rnd'] = $row['rnd'];
        }

        // Check if Block (BLK) columns is present in the Excel sheet
        if (in_array('blk',$columns,true)){

            $data['blk'] = $row['blk'];
        }

        // Check if House/Hat (SHH) column is present in the Excel sheet
        if (in_array('shh',$columns,true)){

            $data['shh'] = $row['shh'];
        }

        // Check if Station (STN) column is present in the Excel sheet
        if (in_array('stn',$columns,true)){

            $data['stn'] = $row['stn'];
        }

        // Check if Volunteer Name (VN) column is present in the Excel sheet
        if (in_array('vn',$columns,true)){

            $data['vn'] = $row['vn'];
        }

        // Check if Volunteer Initials (VI) column is present in the Excel sheet
        if (in_array('vi',$columns,true)){

            $data['vi'] = $row['vi'];
        }


        // Check if TREATMENT (TR) column is present in the Excel sheet
        if (in_array('tr',$columns,true)){

            $data['tr'] = $row['tr'];
        }

        // Check if EXPERIMENT DAY (DY) column is present in the Excel sheet
        if (in_array('dy',$columns,true)){

            $data['dy'] = $row['dy'];
        }

        // Check if NUMBER OF HOUSEHOLD SAMPLED (HS) column is present in the Excel sheet
        if (in_array('hs',$columns,true)){

            $data['hs'] = $row['hs'];
        }

        // Check if Valid Catch (VC) column is present in the Excel sheet
        if (in_array('vc',$columns,true)){

            $data['vc'] = $row['vc'];
        }

        // Check if SS Form Serial No. (DSEN) column is present in the Excel sheet
        if (in_array('dsen',$columns,true)){

            $data['dsen'] = $row['dsen'];
        }

        // Check if Notes column is present in the Excel sheet
        if (in_array('notes',$columns,true)){

            $data['notes'] = $row['notes'];
        }

        // Check if EXPERIMENT SUPERVISOR\'S INITIALS(ESI) column is present in the Excel sheet
        if (in_array('esi',$columns,true)){

            $data['esi'] = $row['esi'];
        }

        // Check if RESPONSIBLE SCIENTIST'S INITIALS(RSI) column is present in the Excel sheet
        if (in_array('rsi',$columns,true)){

            $data['rsi'] = $row['rsi'];
        }

        return new ED( $data );
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
