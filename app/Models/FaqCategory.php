<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function faqPairs()
    {
        return $this->hasMany(FaqPair::class, 'faq_categories_id');
    }
}
