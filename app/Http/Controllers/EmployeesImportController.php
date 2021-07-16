<?php

namespace App\Http\Controllers;

use App\Models\Employed;
use App\Models\Record;
use Illuminate\Http\Request;
use App\Models\Department;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployedsImport;
use Maatwebsite\Excel\Validators\ValidationException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;
use DataTables;

/**
 * Class EmployedController
 * @package App\Http\Controllers
 */
class EmployeesImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function import()
    {
        return view('employed.import');
    }

    public function fileImport(Request $request) 
    {
        $campos=[
            'file'=>'required|mimes:csv,xlsx'
        ];
        
        $this->validate($request, $campos);

        $file = $request->file('file')->store('temp');
        $imports= new EmployedsImport();        
        $imports->import($file);


        if ($imports->failures()->isNotEmpty()) {
            return back()->withFailures($imports->failures());
        }
        if ($imports->errors()->isNotEmpty()) {
            return back()->withErrors("Error. Review data in your file and try again");
        }
     
        return redirect()->route('employeds.index')
        ->with('success', 'Employeds created successfully.');
    
    }
}
