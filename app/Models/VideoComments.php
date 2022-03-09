<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoComments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'video_id',
        'comment'
    ];
}
