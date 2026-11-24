
<x-layout>

    <div class="max-w-6xl mx-auto px-4 py-8">

        <x-card>

            {{-- Page heading --}}
            <header class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">

                <div>
                    <h1 class="text-3xl font-extrabold text-[#123B32]">
                        Manage Your Gigs
                    </h1>

                    <p class="text-gray-500 mt-2">
                        View, edit and manage your posted opportunities.
                    </p>
                </div>

                <a href="/List/create"
                    class="bg-[#123B32] text-white font-semibold px-5 py-3 rounded-lg hover:bg-[#1D594B] transition">
                    <i class="fa-solid fa-plus"></i>
                    Post New Opportunity
                </a>

            </header>

            {{-- Listings table --}}
            @unless ($listings->isEmpty())

                <div class="overflow-x-auto">

                    <table class="w-full text-left border-collapse">

                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="p-4 rounded-l-lg">Opportunity</th>
                                <th class="p-4">Company</th>
                                <th class="p-4">District</th>
                                <th class="p-4">Job Type</th>
                                <th class="p-4 text-center rounded-r-lg">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($listings as $listing)

                                <tr class="border-b border-gray-200 hover:bg-gray-50">

                                    {{-- Title --}}
                                    <td class="p-4 font-semibold text-[#123B32]">
                                        <a href="/List/{{ $listing->id }}"
                                            class="hover:text-[#E8B45A]">
                                            {{ $listing->title }}
                                        </a>
                                    </td>

                                    {{-- Company --}}
                                    <td class="p-4 text-gray-600">
                                        {{ $listing->company }}
                                    </td>

                                    {{-- District --}}
                                    <td class="p-4 text-gray-600">
                                        {{ $listing->district ?? 'Not specified' }}
                                    </td>

                                    {{-- Job type --}}
                                    <td class="p-4">
                                        @if($listing->job_type)
                                            <span class="bg-[#E8B45A] text-[#123B32] px-3 py-1 rounded-full text-sm font-semibold">
                                                {{ $listing->job_type }}
                                            </span>
                                        @else
                                            <span class="text-gray-400 text-sm">
                                                Not specified
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Actions --}}
                                    <td class="p-4">

                                        <div class="flex justify-center items-center gap-4">

                                            <a href="/List/{{ $listing->id }}/edit"
                                                class="text-[#123B32] hover:text-[#E8B45A] font-semibold">
                                                <i class="fa-solid fa-pencil"></i>
                                                Edit
                                            </a>

                                            <form method="POST"
                                                action="/List/{{ $listing->id }}"
                                                onsubmit="return confirm('Are you sure you want to delete this opportunity?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-800 font-semibold">
                                                    <i class="fa-solid fa-trash"></i>
                                                    Delete
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                {{-- Empty state --}}
                <div class="text-center py-12">

                    <i class="fa-solid fa-briefcase text-5xl text-gray-300 mb-4"></i>

                    <h2 class="text-xl font-bold text-gray-700">
                        No opportunities yet
                    </h2>

                    <p class="text-gray-500 mt-2">
                        You haven't posted any gigs. Start by creating your first opportunity.
                    </p>

                    <a href="/List/create"
                        class="inline-block mt-5 bg-[#123B32] text-white px-6 py-3 rounded-lg hover:bg-[#1D594B] transition">
                        Post Your First Opportunity
                    </a>

                </div>

            @endunless

        </x-card>

    </div>

</x-layout>
