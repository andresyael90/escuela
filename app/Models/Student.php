<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evaluation;
class Student extends Model
{
    protected $fillable = [
        'name',
        'grado_y_grupo',
        'email',
    ];
    public $timestamps = false;

    public function evaluation(){
        return $this->belongsTo(Evaluation::class);
    }
}
