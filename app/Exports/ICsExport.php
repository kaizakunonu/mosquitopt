<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ICsExport implements FromCollection, WithHeadings
{

    /**
     * @var array
     */
    protected $ic_attributes;
    protected $values;

    public function __construct(array $ic_attributes, array $values)
    {
        $this->ic_attributes = $ic_attributes;
        $this->values = $values;
    }

    /**
     * @return Collection
     */
    public function collection(): Collection
    {

        return new Collection( [ $this->values ]);
    }


    /**
     * Process header row
     * @return array
     */
    public function headings(): array
    {
        return $this->ic_attributes;
    }
}
