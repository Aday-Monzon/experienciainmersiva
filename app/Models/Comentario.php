<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comentarios';
    protected $fillable=['contenido','experiencia_id','user_id'];

    public function experiencia(){
        return $this->belongsTo('App\Models\Experiencia');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
