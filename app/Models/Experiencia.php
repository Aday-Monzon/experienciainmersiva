<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SplFileInfo;

class Experiencia extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'experiencias';
    protected $fillable=['titulo','archivo_id','visibilidad','categoria_id','tipoExperiencia_id','user_id'];

    public function tipoExperiencia(){

        return $this->belongsTo('App\Models\TipoExperiencia');
    }
    public function categoria(){

        return $this->belongsTo('App\Models\Categoria');
    }
    public function archivo(){

        return $this->belongsTo('App\Models\Archivo');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');

    }
    public function comentarios()
    {
        return $this->hasMany('App\Models\Comentario');
    }

    public function extencionArchivo()
    {
        $extencion=new SplFileInfo($this->archivo->ruta_archivo);
        $ext=$extencion->getExtension();
        return $ext;
    }

}
