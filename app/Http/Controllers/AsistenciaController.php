<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Opcion;
use Exception;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index()
    {
        $asistencias = Asistencia::all();
        $listaFiltrada = array();

        foreach($asistencias as $a){
            $alumno = $a->matricula->alumno;
            $curso = $a->matricula->curso;
            
            $opcion = Opcion::find($a->opcion_id);
            $a->opcion_id = $opcion->status;
            //if($m->estado == true){
                $listaFiltrada[]=$a;
            //}
        }
        return $listaFiltrada;
    }

    public function getById($id)
    {
        try{
            $asistencia = Asistencia::find($id);

            $alumno = $asistencia->matricula->alumno;
            $curso = $asistencia->matricula->curso;
            
            $opcion = Opcion::find($asistencia->opcion_id);
            $asistencia->opcion_id = $opcion->status;

            return $asistencia;
        }catch(Exception $e){
            return "Bad Request";
        }
    }
    public function create(Request $post)
    {
        if($post->matricula_id!=null && $post->fecha!=null && $post->opcion_id!=null){

            try{
                $nuevaAsistencia = new Asistencia();
                $nuevaAsistencia->matricula_id = $post->matricula_id;
                $nuevaAsistencia->fecha = $post->fecha;
                $nuevaAsistencia->opcion_id = $post->opcion_id;

                $nuevaAsistencia->save();

                return "El registro se creo correctamente";
            }catch(Exception $e){
                return "Bad Request";
            }
            
        }else{
            return "All fields are required";
        }
        
    }
    public function update(Request $body, $id )
    {
        try{
            $asistencia = Asistencia::find($id);

            if(isset($asistencia) && $body->matricula_id!=null && $body->fecha!=null && $body->opcion_id!=null){
                $asistencia->matricula_id = $body->matricula_id;
                $asistencia->fecha = $body->fecha;
                $asistencia->opcion_id = $body->opcion_id;

                $asistencia->save();
                return "El registro $id se actualizo correctamente";
            }else{
                return "Bad Request";
            }
        }catch(Exception $e){
            return "Error al intentar actualizar el registro";
        }
        
    }
}
