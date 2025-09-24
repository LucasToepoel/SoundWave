<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource with eager loading.
     */
    public function index()
    {
        // Eager load related data for efficiency
        $records = Record::with(['album', 'publisher', 'artists'])->get();

        return view('records.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     * In a real app, this would show a form to upload a song.
     */
    public function create()
    {
        // For a real app, you would pass albums and publishers to the view
        return view('records.create');
    }

    /**
     * Store a newly created resource in storage.
     * This method is now "slim" and delegates the core logic to the model.
     */
    public function store(Request $request)
    {
        // The model handles all validation and creation logic.
        $record = Record::createWithFileAndMetadata($request);

        return redirect()->route('records.index')
            ->with('success', 'Record created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        return view('records.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        return view('records.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        // You would apply a similar pattern here:
        // $record->updateWithFileAndMetadata($request);
        // return redirect()->route(...);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        // Delegate deletion logic to the model
        $record->deleteWithFile();

        return redirect()->route('records.index')
            ->with('success', 'Record deleted successfully!');
    }
}
