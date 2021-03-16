<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Experiencia;
use App\Models\TipoExperiencia;
use Illuminate\Http\Request;
use SplFileInfo;
use Illuminate\Support\Facades\Storage;
class ExperienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Experiencia::query();

        if ($q = $request->get('q')) {
            $query->where('titulo', 'like', "%$q%");
        }

        $experiencias = $query->where('visibilidad','=',0)->orderBy('id', 'desc')->paginate(3);
        $comentarios = Comentario::all();


        return view('experiencia/index', compact('experiencias','comentarios', 'request'));





    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::select('id','nombre')->get();
        $categories=array();
        foreach ($categorias as $categoria){
            $categories[$categoria->id]=$categoria->nombre;}
        $tiposexperiencia=TipoExperiencia::select('id','tipo')->get();
        $tipos=array();
        foreach ($tiposexperiencia as $tipoexperiencia){
            $tipos[]=$tipoexperiencia->tipo;}
        return view('experiencia/create',compact('tipos','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sms = "Experiencia creada con éxito";
        $this->validate($request,[
            'titulo'=>'required',
            'tipoExperiencia_id'=>'required',
            'archivo_id'=>'required|mimes:jpg,jpeg,png,glb,gltf,zip',
            'visibilidad'=>'required',
            'categoria_id'=>'required',
        ]);
        /*return $request->all();*/
       $entrada=$request->all();
       if($archivo=$request->file('archivo_id')){
           $nombre=$archivo->getClientOriginalName();
           //$extencion=new SplFileInfo($nombre);
           //$ext=$extencion->getExtension();
          // if (($ext=="jpg")||($ext=="png")||($ext=="jpeg")||($ext=="glb")||($ext=="gltf")) {
               $archivo->move('images', $nombre);
               $experiencia = Archivo::create(['ruta_archivo' => $nombre]);
               $entrada['archivo_id'] = $experiencia->id;
           //} else{
               //$zip = new \ZipArchive;
               //$zip->open($archivo);
               //echo "<br>numFicheros: " . $zip->numFiles . "\n";
               //echo "<br>estado: " . $zip->status  . "\n";
               //echo "<br>estadosSis: " . $zip->statusSys . "\n";
               //echo "<br>nombreFichero: " . $zip->filename . "\n";
               //echo "<br>comentario: " . $zip->comment . "\n";
               //echo "numFichero:" . $zip->numFiles . "\n";
               //for ($i=0; $i<$zip->numFiles;$i++) {
                 //  echo "index: $i\n";
                 //  $nombreArchivo=$zip->getNameIndex($i);

                   //print_r($nombreArchivo);
               //}

               //$zip->extractTo('images/'.$nombre);
               //$zip->close();
              // $experiencia = Archivo::create(['ruta_archivo' => $nombre]);
               //$entrada['archivo_id'] = $experiencia->id;
               //return var_dump($ext);}
       }
        Experiencia::create($entrada);



           return redirect('experiencia')->with('success',$sms);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $experiencia=Experiencia::find($id);
        $archivo=Archivo::find($experiencia->archivo_id);
        $extencion=new SplFileInfo($archivo->ruta_archivo);
        $ext=$extencion->getExtension();
        if (($ext=="jpg")||($ext=="png")||($ext=="jpeg")){
            return view('experiencia.show', compact('experiencia'));

        }
        else{
            return view('experiencia.visorModelo',compact('experiencia'));
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Experiencia $experiencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experiencia $experiencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experiencia=Experiencia::find($id);
        $experiencia->delete();
        return back();
    }

    public function downloadFile($id)
    {
        $experiencia=Experiencia::find($id);
        $archivo=Archivo::find($experiencia->archivo_id);
        $pathtoFile = public_path().'/images/'.$archivo->ruta_archivo;
        return response()->download($pathtoFile);

    }


}
