<x-layout>
<x-card class=" p-10 max-w-lg mx-auto mt-24">
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Edit a Gig
                        </h2>
                        <p class="mb-4">Edit This Gig</p>
                    </header>

                    <form method="POST" action="/List/{{$Listing->id}}" enctype="multipart/form-data">
                       @csrf
                       @method('PUT')
                        <div class="mb-6">
                            <label
                                for="company"
                                class="inline-block text-lg mb-2"
                                >Company Name</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="company" value="{{ old('company', $Listing->company) }}"
                            />
                            @error('company')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror

                        </div>

                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >Job Title</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                placeholder="Example: Senior Laravel Developer" value="{{ old('title', $Listing->title) }}"
                            />
                            @error('title')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="location"
                                class="inline-block text-lg mb-2"
                                >Job Location</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="location"
                                placeholder="Example: Nsambya, Nansana , etc" value="{{ old('location', $Listing->location) }}"
                            />
                            @error('location')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                   <div class="mb-6">
                            <label for="district" class="inline-block text-lg mb-2">
        District / Kampala Division
    </label>
        <select name="district" id="district">
    <option value="">Select District</option>

    @foreach (config('gigs.districts') as $district)
        <option value="{{ $district }}"
            {{ old('district', $Listing->district) == $district ? 'selected' : '' }}>
            {{ $district }}
        </option>
    @endforeach
</select>
                            @error('district')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
     <div class="mb-6">
                            <label for="job_type" class="inline-block text-lg mb-2">
        Job_type
    </label>
        <select name="job_type" id="job_type">
    <option value="">Job_type</option>

    @foreach (config('gigs.job_types') as $job_type)
        <option value="{{ $job_type }}"
            {{ old('job_type', $Listing->job_type) == $job_type ? 'selected' : '' }}>
            {{ $job_type }}
        </option>
    @endforeach
</select>
                            @error('job_type')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

 <div class="mb-6">
    <label for="salary_ugx" class="inline-block text-lg mb-2">
        Salary / Pay (UGX)
    </label>

    <input
        type="number"
        id="salary_ugx"
        name="salary_ugx"
        min="0"
        step="1"
        value="{{ old('salary_ugx', $Listing->salary_ugx) }}"
        placeholder="Example: 800000"
        class="border border-gray-200 rounded p-2 w-full"
    />

    @error('salary_ugx')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror

    <p class="text-gray-500 text-sm mt-1">
        Enter monthly salary for full-time roles or total pay for a short gig.
    </p>
</div>
 <div class="mb-6">
    <label for="whatsapp_number" class="inline-block text-lg mb-2">
        WhatsApp Number
    </label>

    <input
        type="tel"
        id="whatsapp_number"
        name="whatsapp_number"
        value="{{ old('whatsapp_number', $Listing->whatsapp_number) }}"
        placeholder="Example: +256771234567"
        class="border border-gray-200 rounded p-2 w-full"
    />

    @error('whatsapp_number')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Contact Email</label
                            >
                            <input
                                type="email"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email" value="{{ old('email', $Listing->email) }}"
                            />
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="website"
                                class="inline-block text-lg mb-2"
                            >
                                Website/Application URL
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="website" value="{{ old('website', $Listing->website) }}"
                            />
                            @error('website')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="tags" class="inline-block text-lg mb-2">
                                Tags (Comma Separated)
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="tags"
                                placeholder="Example: Laravel, Backend, Postgres, etc" value="{{ old('tags', $Listing->tags) }}"
                            />
                            @error('tags')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
    <label for="logo" class="inline-block text-lg mb-2">
        Change Company Logo (Optional)
    </label>
    @if ($Listing->logo)
    <img
        class="w-48 h-40 object-contain rounded-lg border mb-4"
        src="{{ asset('storage/' . $Listing->logo) }}"
        alt="Current company logo"
        onerror="this.style.display='none';"
    />
@else
    <p class="text-gray-500 mb-4">No company logo uploaded.</p>
@endif

    <input
        type="file"
        class="border border-gray-200 rounded p-2 w-full mb-2"
        name="logo"
        id="logo"
    />
</div>
                        <div class="mb-6">
                            <label
                                for="description"
                                class="inline-block text-lg mb-2"
                            >
                                Job Description
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                rows="10"
                                placeholder="Include tasks, requirements, salary, etc"
                            >{{ old('description', $Listing->description) }}</textarea></textarea>
                             @error('description')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror

                        </div>

                        <div class="mb-6 flex items-center gap-4">
    <button
        type="submit"
        class="bg-[#123B32] text-white font-bold rounded-lg py-3 px-6 hover:bg-[#1D594B] transition"
    >
        <i class="fa-solid fa-floppy-disk mr-2"></i>
        Save Changes
    </button>

    <a href="/listings/manage"
       class="text-gray-700 hover:text-[#123B32] font-semibold">
        Back
    </a>
</div>
                    </form>
                </x-card>
</x-layout>