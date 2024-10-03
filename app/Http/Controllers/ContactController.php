<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Auth::user()->contacts;
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactStoreRequest $request):RedirectResponse
    {
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_id' => Auth::id(),
        ]);
        return to_route('contacts.show', $contact);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        if (! Gate::allows('view', $contact)) {
            abort(403);
        }
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        if (! Gate::allows('view', $contact)) {
            abort(403);
        }
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactStoreRequest $request, Contact $contact):RedirectResponse
    {
        if (! Gate::allows('view', $contact)) {
            abort(403);
        }
        $contact->update($request->validated());
        return to_route('contacts.show', $contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return to_route('contacts.index');
    }
}

