<?php

namespace App\Http\Controllers;

use App\Http\Requests\JiriStoreRequest;
use App\Models\Jiri;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use App\Policies\JiriPolicy;
class JiriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {

        $upcomingJiris = Auth::user()->upcomingJiris;
        $pastJiris = Auth::user()->pastJiris;

        return view('jiris.index', compact('pastJiris', 'upcomingJiris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jiris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JiriStoreRequest $request):RedirectResponse
    {
        $jiri = Jiri::create($request->validated());
        return to_route('jiris.show', $jiri);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jiri $jiri)
    {
        if (! Gate::allows('view', $jiri)) {
            abort(403);
        }
        return view('jiris.show', compact('jiri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jiri $jiri)
    {
        if (! Gate::allows('view', $jiri)) {
            abort(403);
        }
        return view('jiris.edit', compact('jiri'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JiriStoreRequest $request, Jiri $jiri):RedirectResponse
    {
        if (! Gate::allows('update', $jiri)) {
            abort(403);
        }
        $jiri->update($request->validated());
        return to_route('jiris.show', $jiri);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jiri $jiri)
    {
        $jiri->delete();
        return to_route('jiris.index');

    }
}
