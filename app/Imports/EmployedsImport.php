<?php

namespace App\Imports;

use App\Models\Employed;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;


class EmployedsImport implements ToModel, SkipsOnError, 
    WithHeadingRow,
    WithValidation, 
    SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Employed([

            'id_employed'    => $row['id_employed'],
            'first_name'     => $row['first_name'],
            'middle_name'    => $row['middle_name'],
            'last_name'      => $row['last_name'],
            'room_access'    => $row['room_access'],
            'date_deleted'   => null,
            'id_department'  => $row['id_department']

        ]);
    }

    public function rules(): array
    {
        return [
            'id_employed' => 'required|numeric|unique:employeds',
            'first_name' => 'required',
            'last_name' => 'required',
            'room_access'   => 'boolean',
            'id_department'  => 'required|numeric',
        ];
    } 
    
}
