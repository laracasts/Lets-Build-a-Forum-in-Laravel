<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;

class Channel extends Model
{
    /**
     *  Boot the model.
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($channel) {
            Artisan::call('cache:clear');
        });

        static::deleted(function ($channel) {
            Artisan::call('cache:clear');
        });
    }
    
    /**
     * Get the route key name for Laravel.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * A channel consists of threads.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}
