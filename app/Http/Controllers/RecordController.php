<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use App\Models\Employed;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use DataTables;

/**
 * Class RecordController
 * @package App\Http\Controllers
 */
class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::all();
        return view('record.index', compact('records'));

    }

    public function ajax()
    {
        return view('records.ajax');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $record = new Record();
        return view('record.create', compact('record'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Record::$rules);
        $record = new Record;
        $record->date = Carbon::now()->timezone('America/Bogota');

        $employed=Employed::where('id_employed', $request->all()['id_employed'])->get()->first();

//dd(($employed)? true : false);
        if ($employed){
            
            if($employed->room_access){

                $record->success = true;
                $record->message = "Employed access";
            }
            else{
                if($employed->date_deleted){

                    $record->message = "Employed deleted";

                }else{
                    $record->message = "Access denied";
                }

                $record->success = false;
                
                
            }
            $record->id_employed = $employed->id_employed;

        }else{

            $record->success = false;
            $record->message = "Employed don't exist";
            $record->id_employed = $request->all()['id_employed'];

        }
        
        $record->save();

        //$record = Record::create($request->all());

        return redirect()->route('records.index')
            ->with('success', 'Record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Record::find($id);

        return view('record.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Record::find($id);

        return view('record.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Record $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        request()->validate(Record::$rules);

        $record->update($request->all());
        

        return redirect()->route('records.index')
            ->with('success', 'Record updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $record = Record::find($id)->delete();

        return redirect()->route('records.index')
            ->with('success', 'Record deleted successfully');
    }
}
