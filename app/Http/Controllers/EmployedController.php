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
class EmployedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeds = DB::table('employeds')
            ->leftJoin('records', 'employeds.id_employed', '=', 'records.id_employed')
            ->Join('departments', 'employeds.id_department', '=', 'departments.id')
            ->select('employeds.*',
                    'departments.name',
                    DB::raw('MAX(records.date) as last_date'), 
                    DB::raw('count(records.id_employed) as total_access'))
            ->whereNull('date_deleted')
            ->groupBy('employeds.id_employed','departments.name')
            ->get();
        /*$employeds = DB::select('call all_employees()');*/

        return view('employed.index', compact('employeds'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::pluck('name', 'id');

        $employed = new Employed();
        return view('employed.create', compact('employed', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'id_employed'=>'unique:employeds'
        ];
        $this->validate($request, $campos);
        request()->validate(Employed::$rules);

        $employed = Employed::create($request->all());

        return redirect()->route('employeds.index')
            ->with('success', 'Employed created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $employed = Employed::find($id);
        $records = Record::where('id_employed', $employed['id_employed'])->get();

        return view('employed.show', compact('employed', 'records'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employed = Employed::find($id);
        $departments = Department::pluck('name', 'id');

        return view('employed.edit', compact('employed','departments'));
    }

    //public function editromm($id, $room_access)
    public function editroom($id)
    {
        $employed = Employed::find($id);

        if($employed['room_access']){
            $employed['room_access']=false;
        }else {
            $employed['room_access']=true;

        }
        $employed->save();

        return redirect()->route('employeds.index')
            ->with('success', 'Employed access update successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Employed $employed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employed $employed)
    {
        request()->validate(Employed::$rules);        
               
        $employed->update($request->all());
            return redirect()->route('employeds.index')
            ->with('success', 'Employed updated successfully');
        
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employed = Employed::find($id);

        $employed['date_deleted']=Carbon::now();
        $employed['room_access']=false;
        $employed->save();
        
        return redirect()->route('employeds.index')
            ->with('success', 'Employed deleted successfully');
    }

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
     
        return redirect()->route('employeds.index')
        ->with('success', 'Employeds created successfully.');
    
    }

    public function downloadPdf()
    {
        $employeds = Employed::all();
        // share data to view
        view()->share('employeds-pdf',$employeds);
        $pdf = PDF::loadView('employed.employeds-pdf', ['employeds' => $employeds]);
        return $pdf->download('employeds.pdf');
    }

    public function downloadPdfRecords($id)
    {
        $employed = Employed::where('id_employed', $id)->first();
        $records = Record::where('id_employed', $id)->get();

        view()->share('employeds-pdf',$employed, $records);
        $pdf = PDF::loadView('employeds-pdf', ['employed' => $employed] , ['records' => $records]);
        return $pdf->download('employed-history.pdf');
    }
}
