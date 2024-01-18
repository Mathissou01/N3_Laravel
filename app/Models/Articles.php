<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articles extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'title',
        'category_id',
        'unit_id',
        'slug',
        'buying_price',
    ];

    public $sortable = [
        'title',
        'category_id',
        'unit_id',
        'slug',
        'buying_price',
    ];

    protected $guarded = [
        'id',
    ];

    protected $with = [
        'category',
        'unit'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }

}
