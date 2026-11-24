<?php

namespace App\Models;

use Database\Factories\ListFactory;
use Database\Factories\ListingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listing extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id',
    'company',
    'title',
    'location',
    'district',
    'job_type',
    'salary_ugx',
    'whatsapp_number',
    'email',
    'website',
    'tags',
    'description',
    'logo',
];
    // Telling Laravel to use ListingFactory regardless of lowercase model nam
    protected static function newFactory()
    {
        return ListingFactory::new();
    }

    public function scopeFilter($query, array $filters)
{
    // Filter by category or skill tag
    if (!empty($filters['tag'])) {
        $query->where(
            'tags',
            'like',
            '%' . $filters['tag'] . '%'
        );
    }

    // Filter by district
    if (!empty($filters['district'])) {
        $query->where(
            'district',
            $filters['district']
        );
    }

    // Filter by opportunity type
    if (!empty($filters['job_type'])) {
        $query->where(
            'job_type',
            $filters['job_type']
        );
    }

    // Search across multiple listing fields
    if (!empty($filters['search'])) {

        $search = $filters['search'];

        $query->where(function ($query) use ($search) {

            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('tags', 'like', '%' . $search . '%')
                ->orWhere('location', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('company', 'like', '%' . $search . '%')
                ->orWhere('district', 'like', '%' . $search . '%');

        });
    }

    return $query;
}

    // A listing belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
