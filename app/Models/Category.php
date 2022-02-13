<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        'title',
        'description'
    ];

    public function getCategoryByID(int $id)
    {
        return \DB::table($this->table)->find($id);
    }

}
