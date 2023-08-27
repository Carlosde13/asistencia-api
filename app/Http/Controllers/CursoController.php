<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Exception;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        $listaFiltrada = array();

        foreach($cursos as $c){
            $maestro = $c->maestro;
            if($c->estado == true){
                $listaFiltrada[]=$c;
            }
        }
        return $listaFiltrada;
    }

    public function getById($id)
    {
        try{
            $curso = Curso::find($id);
            $maestro = $curso->maestro;
            return $curso;
        }catch(Exception $e){
            return "Bad Request";
        }
    }

    public function create(Request $post)
    {
        if($post->nombre!=null && $post->descripcion!=null && $post->estado!=null){

            try{
                $nuevoCurso = new Curso();
                $nuevoCurso->nombre = $post->nombre;
                $nuevoCurso->descripcion = $post->descripcion;
                $nuevoCurso->estado = $post->estado;
                $nuevoCurso->maestro_id = $post->maestro_id;

                $nuevoCurso->save();

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
            $curso = Curso::find($id);

            if(isset($curso) && $body->nombre!=null && $body->descripcion!=null && $body->estado!=null){
                $curso->nombre = $body->nombre;
                $curso->descripcion = $body->descripcion;
                $curso->estado = $body->estado;
                $curso->maestro_id = $body->maestro_id;

                $curso->save();
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
            $curso = Curso::find($id);

            if(isset($curso)){
                $curso->estado= false;
                $curso->save();
                return "El registro se elimino correctamente";
            }else{
                return "El registro no existe";
            }
        }catch(Exception $e){
            return "Bad request";
        }
    }
}
