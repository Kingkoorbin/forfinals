<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bookmonitor;
use Carbon\Carbon;

class bookMonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bookmonitor = bookmonitor::all();
        return view ('bookmonitor.index', compact('bookmonitor'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'xdate' => ['required', 'date'],
            'xparticulars' => ['required', 'max:100'],
            'xstatus' => ['required', 'max:50'],
            'xdepartment' => ['required', 'max:50'],
            'xremarks' => ['nullable','max:50'],
        ]);
        $bookmonitor = new bookmonitor();

        $bookmonitor->date = $request->xdate;
        $bookmonitor->particulars = $request->xparticulars;
        $bookmonitor->status = $request->xstatus;
        $bookmonitor->department = $request->xdepartment;
        $bookmonitor->remarks = $request->xremarks;

        $bookmonitor->save();
        return redirect()->route('bookmonitor');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $bookmonitor = bookmonitor::where('bno', $id)->get();
        return view('bookmonitor.show', compact('bookmonitor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $bookmonitor = bookmonitor::where('bno', $id)->get();
        return view('bookmonitor.edit', compact('bookmonitor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate([
            'xdate' => ['required', 'max:12'],
            'xparticulars' =>['required', 'max:100'],
            'xstatus'=>['required'],
            'xdepartment' =>['required', 'max:30'],
            'xremarks' =>['nullable','max:100'],
        ]);


        $bookmonitor = bookmonitor::where('bno', $id)->update([
            'date' => $request->xdate,
            'particulars' => $request->xparticulars,
            'status' => $request->xstatus,
            'department' => $request->xdepartment,
            'remarks' => $request->xremarks,
        ]);
        return redirect()->route('bookmonitor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $bookmonitor = bookmonitor::where('bno', $id);
        $bookmonitor->delete();
        return redirect()->route('bookmonitor');
    }
}
