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

    public function scopeFilter($query, array $filters )
    {
       if( $filters['tag'] ?? false){
            $query->where('tags','like','%'. request('tag') .'%');
       }
        ;

        if( $filters['search'] ?? false){
            $query->where('title','like','%'. request('search') .'%')
                  ->orWhere('tags','like','%'. request('search') .'%')
                  ->orWhere('location','like','%'. request('search') .'%')
                  ->orWhere('description','like','%'. request('search') .'%')
                  ->orWhere('website','like','%'. request('search') .'%')
                  ->orWhere('company','like','%'. request('search') .'%');
       }
        ;

    }

    // A listing belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
