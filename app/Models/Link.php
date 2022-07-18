<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    /* Casting the `open_in_new_tab` column to a boolean. */
    protected $casts = [
      'open_in_new_tab' => 'boolean'
    ];
    
    protected $fillable = [
      'title',
      'link',
      'open_in_new_tab'
    ];
}
