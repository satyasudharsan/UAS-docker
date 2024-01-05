<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plant extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_tanaman',
        'deskripsi',
        'suhu_min',
        'suhu_max',
        'category_id',
        'plant_img',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Ambil tanaman berdasarkan rentang suhu.
     *
     * @param float $minTemperature
     * @param float $maxTemperature
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getPlantsByTemperatureRange($minTemperature, $maxTemperature)
    {
        return static::where(function (Builder $query) use ($minTemperature, $maxTemperature) {
            $query->where('suhu_min', '<=', $maxTemperature)
                  ->where('suhu_max', '>=', $minTemperature);
        })->get();
    }
}
