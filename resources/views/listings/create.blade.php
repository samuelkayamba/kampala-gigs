<x-layout>
<x-card class=" p-10 max-w-lg mx-auto mt-24">
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Create a Gig
                        </h2>
                        <p class="mb-4">Post a gig to find a developer</p>
                    </header>

                    <form method="POST" action="/List" enctype="multipart/form-data">
                       @csrf
                        <div class="mb-6">
                            <label
                                for="company"
                                class="inline-block text-lg mb-2"
                                >Company Name</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="company" value="{{old('company')}}"
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
                                placeholder="Example: Senior Laravel Developer" value="{{old('title')}}"
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
                               placeholder="Example: Ntinda, Kampala..." value="{{old('location')}}"
                            />
                            @error('location')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
    <label for="job_type" class="inline-block text-lg mb-2">
        Opportunity Type
    </label>

    <select name="job_type" id="job_type"
        class="border border-gray-200 rounded p-2 w-full">

        <option value="">Opportunity Type</option>

        @foreach(config('gigs.job_types') as $job_type)
            <option value="{{ $job_type }}"
                {{ old('job_type') == $job_type ? 'selected' : '' }}>
                {{ $job_type }}
            </option>
        @endforeach

    </select>

    @error('job_type')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="district" class="inline-block text-lg mb-2">
        District / Kampala Division
    </label>

    <select name="district" id="district"
        class="border border-gray-200 rounded p-2 w-full">

        <option value="">Select location</option>

        @foreach(config('gigs.districts') as $district)
            <option value="{{ $district }}"
                {{ old('district') == $district ? 'selected' : '' }}>
                {{ $district }}
            </option>
        @endforeach

    </select>

    @error('district')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
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
        value="{{ old('salary_ugx') }}"
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
        value="{{ old('whatsapp_number') }}"
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
                                name="email" value="{{old('email')}}"
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
    type="url"
    class="border border-gray-200 rounded p-2 w-full"
    name="website"
    placeholder="https://example.com"
    value="{{ old('website') }}"
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
                                placeholder="Example: Laravel, Backend, Postgres, etc" value="{{old('tags')}}"
                            />
                            @error('tags')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="logo" class="inline-block text-lg mb-2">
                                Company Logo
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="logo"
                            />

                            @error('logo')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror

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
                            >{{old('description')}}</textarea>
                             @error('description')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror

                        </div>

                        <div class="mb-6">
                            <button
                                class="bg-[#123B32] text-white rounded-lg py-2 px-4 hover:bg-[#1D594B]"
                            >
                                Create Gig
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
                </x-card>
</x-layout>