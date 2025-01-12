<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\Chip;
use Illuminate\Http\Request;
// mine
use Illuminate\Http\Response;
use Illuminate\View\View;

class ChipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //render blade view
        return view('chips.index');
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
    public function store(Request $request): RedirectResponse
    {
        //validate request
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->chips()->create($validated);  

        return redirect(route('chips.index'));
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Chip $chip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chip $chip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chip $chip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chip $chip)
    {
        //
    }
}
