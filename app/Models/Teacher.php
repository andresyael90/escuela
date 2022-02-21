<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evaluation;
class Teacher extends Model
{
    protected $fillable = [
        'nombre',
        'materia',
        'grado_y_grupo_asignado',
    ];
    public $timestamps = false;

    public function evaluation(){
        return $this->belongsTo(Evaluation::class);
    }
}
