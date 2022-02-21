<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Evaluation extends Model
{
    protected $fillable = [
        'nota_final',
        'observaciones',
    ];
    public $timestamps = false;

    public function teachers(){
        return $this->hasMany(Evaluation::class);
    }
    public function students(){
        return $this->hasMany(Evaluation::class);
    }
}
