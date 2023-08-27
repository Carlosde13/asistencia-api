<?php

namespace App\Http\Controllers;

use App\Models\Maestro;
use Exception;
use Illuminate\Http\Request;

class MaestroController extends Controller
{
    public function index()
    {
        $maestros = Maestro::all();
        $listaFiltrada = array();

        foreach($maestros as $m){
            $cursos = $m->cursos;
            if($m->estado == true){
                $listaFiltrada[]=$m;
            }
        }
        return $listaFiltrada;
    }


    public function getById($id)
    {
        try{
            $maestro = Maestro::find($id);
            $cursos = $maestro->cursos;
            return $maestro;
        }catch(Exception $e){
            return "Bad Request";
        }
    }
    public function create(Request $post)
    {
        if($post->nombre!=null && $post->apellido!=null && $post->direccion!=null && $post->telefono!=null && $post->estado!=null){

            try{
                $nuevoMaestro = new Maestro();
                $nuevoMaestro->nombre = $post->nombre;
                $nuevoMaestro->apellido = $post->apellido;
                $nuevoMaestro->direccion = $post->direccion;
                $nuevoMaestro->telefono = $post->telefono;
                $nuevoMaestro->estado = $post->estado;

                $nuevoMaestro->save();

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
            $maestro = Maestro::find($id);

            if(isset($maestro) && $body->nombre!=null && $body->apellido!=null && $body->direccion!=null && $body->telefono!=null && $body->estado!=null){
                $maestro->nombre = $body->nombre;
                $maestro->apellido = $body->apellido;
                $maestro->direccion = $body->direccion;
                $maestro->telefono = $body->telefono;
                $maestro->estado = $body->estado;
                $maestro->save();
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
            $maestro = Maestro::find($id);

            if(isset($maestro)){
                $maestro->estado= false;
                $maestro->save();
                return "El registro se elimino correctamente";
            }else{
                return "El registro no existe";
            }
        }catch(Exception $e){
            return "Bad request";
        }
    }
}
