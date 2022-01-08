<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    /**
     * 可以被批量賦值的屬性。
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'sort'
    ];
    /**
     * 取得類別的動物
     */
    public function animals()
    {
        return $this->hasMany(Animal::class, 'type_id', 'id');
    }
}
