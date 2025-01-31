<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\Chip;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class ChipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // //render blade view
        // return view('chips.index');

        //pass chips from every user to our index page
        return view('chips.index',[
            //use Eloquent's 'with' method to eager-load every chip's associated user
            //have also used 'latest' scope to return the records in reverse-chronological order
            'chips' => Chip::with('user')->latest()->get(),
        ]);
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
    public function edit(Chip $chip): View
    {
        //
        Gate::authorize('update', $chip);

        return view('chips.edit', [
            'chip' => $chip,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chip $chip): RedirectResponse
    {
        //
        Gate::authorize('update', $chip);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chip->update($validated);


        return redirect(route('chips.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chip $chip)
    {
        //
    }
}
