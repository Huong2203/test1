<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'title',
        'image',
        'banner',
        'slug',
        'content',
        'status',
        'is_hot',
        'user_id',
        'tag_id',
        'category_id',
    ];

    public static $status = [
        [
            'status' => 'draft',
            'name'   => 'Thử nghiệm',
        ],
        [
            'status' => 'published',
            'name'   => 'Công khai',
        ],
        [
            'status' => 'archived',
            'name'   => 'Lưu trữ',
        ]
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tag(){
        return $this->belongsTo(Tag::class);
    }
}
