<?php

namespace App\Imports;

use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KelasImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new Kelas([
    //         'kelas' => $row['kelas'],
    //         'wali_kelas' => $row['wali_kelas'],
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        foreach($rows as $row){

            $tagihan = '4';

        if (substr($row['kelas'], 0, strpos($row['kelas'], '-')) == 'X')
            $tagihan = '1';
        else if (substr($row['kelas'], 0, strpos($row['kelas'], '-')) == 'XI')
            $tagihan = '2';
        else if (substr($row['kelas'], 0, strpos($row['kelas'], '-')) == 'XII')
            $tagihan = '3';

            Kelas::updateOrCreate(
                [
                    'kelas' => $row['kelas'],
                ],
                [
                    'wali_kelas' => ucwords(strtolower($row['wali_kelas'])),
                    'id_tagihan' => $tagihan
                ]
                );
        }
    }
}
