<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //Show all Listings
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //Show single Listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing'=> $listing
        ]);
    }

    //Show create Form
    public function create() {
        return view('listings.create');
    }

    //Store new Listing
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        
        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();
        
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully');
    }

    //Update Listing
    public function update(Request $request, Listing $listing) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        
        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back() ->with('message', 'Listing updated successfully');
    }

    //Show Edit Form
    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    //Delete Listing
    public function destroy(Listing $listing) {
        $listing->delete();
        return redirect('/')->with('message', 'Listing updated successfully');
    }

    // Manage Function
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings->get()]);
    }
}
