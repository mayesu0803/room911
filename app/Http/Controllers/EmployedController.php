<?php

namespace App\Http\Controllers;

use App\Models\Employed;
use Illuminate\Http\Request;
use App\Models\Department;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployedsImport;
use Illuminate\Support\Carbon;
use PDF;

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
    
    public function index(Request $request)
    {
        //$employeds= Employed::where('date_deleted',' is ', 'null')->paginate();
        $employeds = Employed::paginate(5);

        if($request->has('download'))
        {
            $pdf = PDF::loadView('employed.index',compact('employeds'));
            return $pdf->download('pdfview.pdf');
        }
        //$datos['employed']=Empleado::paginate(5);
        //return view ('empleado.index', $datos);
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

        return view('employed.show', compact('employed'));
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

        //if($existingItem){
        $employed['date_deleted']=Carbon::now();
        $employed['room_access']=false;
        $employed->save();


        //Employed::where('id','=',$id)->update($employed);

        //$empleado=Empleado::findOrFail($id);

        
        return redirect()->route('employeds.index')
            ->with('success', 'Employed deleted successfully');
    }

    public function fileImport(Request $request) 
    {
        Excel::import(new EmployedsImport, $request->file('file')->store('temp'));
        return redirect()->route('employeds.index')
            ->with('success', 'Employeds created successfully.');
    }
}
