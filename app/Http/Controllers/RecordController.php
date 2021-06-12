<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use App\Models\Employed;
use Illuminate\Support\Carbon;

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
        $records = Record::paginate();

        return view('record.index', compact('records'))
            ->with('i', (request()->input('page', 1) - 1) * $records->perPage());
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
        //dd($request->all()['id_employed']);

        $record = new Record;
        $record->date = Carbon::now();
        $employed=Employed::where('id_employed', $request->all()['id_employed'])->get()->first();

         
//dd(($employed)? true : false);
        if ($employed){
            if($employed->room_access){

                $record->success = true;
                $record->message = "Employed access";
            }
            else{
                $record->success = false;
                $record->message = "Access denied";
                

            }
            $record->id_employed = $employed->id;

        }else{
            $record->success = false;
            $record->message = "Employed don't exist";
            $record->id_employed = 8;

        }
        //request()->validate(Record::$rules);
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
