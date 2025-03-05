<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'company',
        'company_logo',
        'location_id',
        'category_id',
        'deadline',
        'date_posted',
        'is_expired',
        'application_link',
    ];

    /**
     * Relationship with Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship with Location
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Accessor for checking expired jobs
     */
    public function getExpiredAttribute()
    {
        return $this->is_expired || now()->greaterThan($this->deadline);
    }

    /**
     * Accessor for jobs expiring soon (within 3 days)
     */
    public function getSoonExpiringAttribute()
    {
        return now()->diffInDays($this->deadline, false) <= 3 && !$this->expired;
    }

    // Remove the duplicate location() method 
    // Remove the jobs() method (it should be in the Location model)
}