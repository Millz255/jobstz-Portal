<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use Illuminate\Support\Str; // Import the Str class

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
        'pdf_path',
        'slug',
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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($job) {
            $job->slug = Str::slug($job->title) . '-' . uniqid(); // Generate slug on creating
        });

        static::updating(function ($job) {
            $job->slug = Str::slug($job->title) . '-' . $job->id; // Regenerate slug on updating
        });
    }
}