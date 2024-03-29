<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqPair extends Model
{
    use HasFactory;

    protected $fillable = ['faq_categories_id', 'question', 'answer'];
}
