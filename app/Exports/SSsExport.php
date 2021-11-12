<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SSsExport implements FromCollection, WithHeadings
{

    /**
     * @var array
     */
    protected $sss_attributes;
    protected $values;

    public function __construct(array $sss_attributes, array $values)
    {
        $this->sss_attributes = $sss_attributes;
        $this->values = $values;
    }

    /**
     * Create an export instance
     * @return Collection
     */
    public function collection(): Collection
    {
        return new Collection( [$this->values] );
    }


    /**
     * Process header row
     * @return array
     */

    public function headings(): array
    {
        return $this->sss_attributes;
    }


}
