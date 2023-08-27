<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Exception;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::all();
        $listaFiltrada = array();

        foreach($matriculas as $m){
            $alumno = $m->alumno;
            $curso = $m->curso;
            $maestro = $m->curso->maestro;
            if($m->estado == true){
                $listaFiltrada[]=$m;
            }
        }
        return $listaFiltrada;
    }
    public function getById($id)
    {
        try{
            $matricula = Matricula::find($id);
            $alumno = $matricula->alumno;
            $curso = $matricula->curso;
            $maestro = $matricula->curso->maestro;
            return $matricula;
        }catch(Exception $e){
            return "Bad Request";
        }
    }

    public function create(Request $post)
    {
        if($post->alumno_id!=null && $post->curso_id!=null && $post->estado!=null){

            try{
                $nuevaMatricula = new Matricula();
                $nuevaMatricula->alumno_id = $post->alumno_id;
                $nuevaMatricula->curso_id = $post->curso_id;
                $nuevaMatricula->estado = $post->estado;

                $nuevaMatricula->save();

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
            $matricula = Matricula::find($id);

            if(isset($matricula) && $body->alumno_id!=null && $body->curso_id!=null && $body->estado!=null){
                $matricula->alumno_id = $body->alumno_id;
                $matricula->curso_id = $body->curso_id;
                $matricula->estado = $body->estado;

                $matricula->save();
                return "El registro $id se actualizo correctamente";
            }else{
                return "Bad Request";
            }
        }catch(Exception $e){
            return "Error al intentar actualizar el registro";
        }
        
    }

    public function delete($id)
    {
        try{
            $matricula = Matricula::find($id);

            if(isset($matricula)){
                $matricula->estado= false;
                $matricula->save();
                return "El registro se elimino correctamente";
            }else{
                return "El registro no existe";
            }
        }catch(Exception $e){
            return "Bad request";
        }
    }
}
