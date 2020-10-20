<?php

namespace App\Exports;

use App\NewRanger;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class NewRangersExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NewRanger::all();
    }

    public function map($NewRanger): array{
        return[
            $NewRanger->namalengkap,
            $NewRanger->nim,
            $NewRanger->semester,
            $NewRanger->jurusan,
            $NewRanger->prodi,
            $NewRanger->email,
            $NewRanger->nohandphone,
            Date::dateTimeToExcel($NewRanger->created_at),
            
        ];
    }

    public function headings(): array{
        return[
            'Name',
            'NIM',
            'Semester',
            'Jurusan',
            'Prodi',
            'Email',
            'No Handphone',
            'Created At',
            
        ];
    }

    public function columnFormats(): array{
        return[
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
