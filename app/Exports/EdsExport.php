<?php

namespace App\Exports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EdsExport implements FromCollection, WithHeadings
{
    /**
     * @var array
     */
    protected $ed_attributes;
    protected $values;

    public function __construct(array $ed_attributes, array $values)
    {
        $this->ed_attributes = $ed_attributes;
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
        return $this->ed_attributes;
    }
}
