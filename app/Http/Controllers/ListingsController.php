<?php

namespace App\Http\Controllers;

use App\Models\listing;
use CreateListingsTable;
use Dom\Text;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use PharIo\Manifest\Email;
use Symfony\Contracts\Service\Attribute\Required;

class ListingsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   // showing all records ordered by newest first
    public function index()
    {
        $files = listing::latest()
    ->filter(request(['tag', 'search', 'district', 'job_type']))
    ->paginate(6)
    ->withQueryString();
        return view('listings.index', compact('files'));
    }

    //Creating a List
       public function create(){

        return view('listings.create');
       }
       // showing single record/list depending on its id
   public function show(Listing $Listing)
{

    return view('listings.show', compact('Listing'));
}
//Store a List
       public function store(Request $request)
{    $formFields = $request->validate([
        'company' => ['required',],
        'title' => 'required',
        'location' => 'required',
        'email' => 'required|email',
        'website' => ['nullable','url',],
        'tags' => 'required',
        'logo'=>['nullable','image','max:2048',],
        'description' => 'required',
        'district' => ['required','string',Rule::in(config('gigs.districts')),],
        'job_type' =>['required','string',Rule::in(config('gigs.job_types')),],
        'salary_ugx' => ['nullable','integer','min:0',],
        'whatsapp_number' => ['nullable','regex:/^(?:\+256|0)7[0-9]{8}$/',],
    ]);
    $formFields['website'] = $formFields['website'] ?? '';

    if ($request->hasFile('logo')) {
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

    // Save the listing under the currently logged-in user
  /** @var \App\Models\User $user */
$user = Auth::user();

$listing = $user->listings()->create($formFields);

//dd($listing->toArray());
    return redirect('/')->with(
        'successMessage',
        'The Gig is successfully Posted!'
    );
}



// Show Edit form
public function edit(int $id)
{
    $Listing = Listing::findOrFail($id);

    // Only the owner can edit their listing
    if ((int) $Listing->user_id !== (int) auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    return view('listings.edit', ['Listing' => $Listing]);
}

// Update a listing
public function update(Request $request, Listing $Listing)
{
    // Make sure the logged-in user owns the listing
    if ((int) $Listing->user_id !== (int) auth()->id()) {
        abort(403, 'Unauthorised Action');
    }

    $formFields = $request->validate([
        'company' => ['required'],
        'title' => ['required'],
        'location' => ['required'],
        'email' => ['required', 'email'],
        'website' => ['nullable', 'url',],
        'tags' => ['required'],
        'logo' => ['nullable', 'image', 'max:2048',],
        'description' => ['required'],
        'district' => [
            'required',
            'string',
            Rule::in(config('gigs.districts')),
        ],
        'job_type' => [
            'required',
            'string',
            Rule::in(config('gigs.job_types')),
        ],
        'salary_ugx' => ['nullable', 'integer', 'min:0'],
        'whatsapp_number' => [
            'nullable',
            'regex:/^(?:\+256|0)7[0-9]{8}$/',
        ],
    ]);
    // Store an empty string when no website is provided
$formFields['website'] = $formFields['website'] ?? '';

    // Only replace the logo if a new one was uploaded
    if ($request->hasFile('logo')) {
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

    $Listing->update($formFields);

    return redirect('/')
        ->with('successMessage', 'The listing is successfully Updated!');
}


                  //Delete a List
    public function destroy(Listing $Listing)
{
    if($Listing->user_id != auth()->id()){
        abort(403,'Unauthorised Action');
    }
    $Listing->delete();
    return Redirect('/')->with('successMessage','Listing Deleted Successfully');
}

                //Manage Listings
                public function manage(){

                    return view('listings.manage',['listings'=>auth()->user()->listings()->get()]);
                }
        }