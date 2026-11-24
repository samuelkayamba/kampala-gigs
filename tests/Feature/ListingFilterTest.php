<?php

namespace Tests\Feature;

use App\Models\listing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListingFilterTest extends TestCase
{
    use RefreshDatabase;

    public function test_listings_can_be_filtered_by_district_and_job_type()
    {
        $matchingListing = listing::factory()->create([
            'district' => 'Wakiso',
            'job_type' => 'Short Gig',
        ]);

        listing::factory()->create([
            'district' => 'Mukono',
            'job_type' => 'Full-time',
        ]);

        $results = listing::query()
            ->filter([
                'district' => 'Wakiso',
                'job_type' => 'Short Gig',
            ])
            ->get();

        $this->assertCount(1, $results);
        $this->assertTrue($results->contains('id', $matchingListing->id));
    }
}
