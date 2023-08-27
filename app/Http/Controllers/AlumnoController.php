<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Error;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class AlumnoController extends Controller
{
    public function index()
    {
        $listaAlumnos = Alumno::all();
        $listaFiltrada = array();
        foreach($listaAlumnos as $a){
            $matriculas = $a->matriculas;
            if($a->estado == true){
                $listaFiltrada[] = $a;
            }
        }
        return $listaFiltrada;
    }
    public function getById($id)
    {
        try{
            $alumno =  Alumno::find($id);
            $matriculas = $alumno->matriculas;
            return $alumno;
        }catch(Exception $e){
            return "Bad Request";
        }
            
    }
    public function create(Request $post)
    {
        if($post->nombre!=null && $post->apellido!=null && $post->edad!=null && $post->estado!=null){

            try{
                $nuevoAlumno = new Alumno();
                $nuevoAlumno->nombre = $post->nombre;
                $nuevoAlumno->apellido = $post->apellido;
                $nuevoAlumno->edad = $post->edad;
                $nuevoAlumno->estado = $post->estado;

                $nuevoAlumno->save();

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
            $alumno = Alumno::find($id);

            if(isset($alumno) && $body->nombre!=null && $body->apellido!=null && $body->edad!=null && $body->estado!=null){
                $alumno->nombre= $body->nombre;
                $alumno->apellido= $body->apellido;
                $alumno->edad= $body->edad;
                $alumno->estado= $body->estado;
                $alumno->save();
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
            $alumno = Alumno::find($id);

            if(isset($alumno)){
                $alumno->estado= false;
                $alumno->save();
                return "El registro se elimino correctamente";
            }else{
                return "El registro no existe";
            }
        }catch(Exception $e){
            return "Bad request";
        }
    }
}
