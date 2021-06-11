<?php

namespace App\Imports;

use App\Models\Employed;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployedsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employed([
            'id_employed'    => $row[0],
            'first_name'     => $row[1],
            'middle_name'    => $row[2],
            'last_name'      => $row[3],
            'room_access'    => false,
            'date_deleted'   => null,
            'id_department'  => $row[4]

        ]);
    }
}
