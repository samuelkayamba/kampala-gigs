
<form action="/" method="GET" class="mx-4 my-6">
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-4">

        {{-- Keyword search --}}
        <div class="relative mb-4">
            <div class="absolute inset-y-0 left-3 flex items-center">
                <i class="fa fa-search text-gray-400"></i>
            </div>

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="h-12 w-full pl-10 pr-4 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#123B32]"
                placeholder="Search jobs, skills or companies..."
            />
        </div>

        {{-- Filters --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

            {{-- Category --}}
            <select
                name="tag"
                id="tag"
                class="h-12 w-full border border-gray-200 rounded-lg px-3 focus:outline-none focus:ring-2 focus:ring-[#123B32]"
            >
                <option value="">All Categories</option>

                @foreach(config('gigs.categories') as $category)
                    <option value="{{ $category }}"
                        {{ request('tag') == $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
            </select>

            {{-- Job type --}}
            <select
                name="job_type"
                id="job_type"
                class="h-12 w-full border border-gray-200 rounded-lg px-3 focus:outline-none focus:ring-2 focus:ring-[#123B32]"
            >
                <option value="">All Job Types</option>

                @foreach(config('gigs.job_types') as $job_type)
                    <option value="{{ $job_type }}"
                        {{ request('job_type') == $job_type ? 'selected' : '' }}>
                        {{ $job_type }}
                    </option>
                @endforeach
            </select>

            {{-- District --}}
            <select
                name="district"
                id="district"
                class="h-12 w-full border border-gray-200 rounded-lg px-3 focus:outline-none focus:ring-2 focus:ring-[#123B32]"
            >
                <option value="">All Districts</option>

                @foreach(config('gigs.districts') as $district)
                    <option value="{{ $district }}"
                        {{ request('district') == $district ? 'selected' : '' }}>
                        {{ $district }}
                    </option>
                @endforeach
            </select>

        </div>

        {{-- Search button --}}
        <div class="mt-4 flex justify-end">
            <button
                type="submit"
                class="bg-[#123B32] text-white font-semibold px-8 py-3 rounded-lg hover:bg-[#1D594B] transition"
            >
                <i class="fa fa-search mr-1"></i>
                Search Opportunities
            </button>
        </div>

    </div>
</form>
