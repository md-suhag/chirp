<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChirpController extends Controller
{
    public function index()
    {

        $chirps = Chirp::with('user')->latest()->take(50)->get();

        return view('home', ['chirps' => $chirps]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'message' => 'required|string|max:225',
        ], [

            'message.required' => 'Please write something to chrip!',
            'message.max' => 'Chirps must be 255 characters or less',
        ]);

        auth()->user()->chirps()->create($validated);

        return redirect('/')->with('success', 'Chirp Created Successfully !');

    }

    public function edit(Chirp $chirp)
    {
        Gate::authorize('update', $chirp);

        return view('chirps.edit', compact('chirp'));

    }

    public function update(Request $request, Chirp $chirp)
    {

        Gate::authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update($validated);

        return redirect('/')->with('success', 'Chirp updated');

    }

    public function destroy(Chirp $chirp)
    {

        Gate::authorize('delete', $chirp);

        $chirp->delete();

        return redirect('/')->with('success', 'Chirp deleted');
    }
}
