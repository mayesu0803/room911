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
        $record->date = Carbon::now();

        $employed=Employed::where('id_employed', $request->all()['id_employed'])->get()->first();

        if ($employed){
            
            if($employed->room_access){

                $record->success = true;
                $record->message = "Employee have access";
            }
            else{
                if($employed->date_deleted){

                    $record->message = "Employee deleted";

                }else{
                    $record->message = "Employee don't have access now";
                }

                $record->success = false;
                
                
            }
            $record->id_employed = $employed->id_employed;

        }else{

            $record->success = false;
            $record->message = "Employee don't exist yet";
            $record->id_employed = $request->all()['id_employed'];

        }
        
        $record->save();

        return redirect()->route('records.index')
            ->with('success', 'Record created successfully.');
    }

    
}
