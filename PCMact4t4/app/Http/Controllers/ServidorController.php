<?php

namespace App\Http\Controllers;

use App\Models\Servidor;
use App\Http\Resources\ServidorResource;
use Illuminate\Http\Request;

class ServidorController extends Controller
{
    
    public function index()
    {
        $servidores = Servidor::paginate(10);
        return ServidorResource::collection($servidores);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'hostname'    => 'required|string|max:255',
            'ip_address'  => 'required|ip',
            'so'          => 'required|string|max:255',
            'data_center' => 'required|string|max:255',
            'estado'      => 'required|in:Activo,Inactivo',
        ]);

        $servidor = Servidor::create($validated);

        return response()->json([
            'message' => 'Servidor creado exitosamente',
            'data'    => new ServidorResource($servidor)
        ], 201);
    }

    
    public function show($id)
    {
        $servidor = Servidor::find($id);

        if (!$servidor) {
            return response()->json(['message' => 'Servidor no encontrado'], 404);
        }

        return new ServidorResource($servidor);
    }

    
    public function update(Request $request, $id)
    {
        $servidor = Servidor::find($id);

        if (!$servidor) {
            return response()->json(['message' => 'Servidor no encontrado'], 404);
        }

        $validated = $request->validate([
            'hostname'    => 'sometimes|required|string|max:255',
            'ip_address'  => 'sometimes|required|ip',
            'so'          => 'sometimes|required|string|max:255',
            'data_center' => 'sometimes|required|string|max:255',
            'estado'      => 'sometimes|required|in:Activo,Inactivo',
        ]);

        $servidor->update($validated);

        return response()->json([
            'message' => 'Servidor actualizado exitosamente',
            'data'    => new ServidorResource($servidor)
        ], 200);
    }

    
    public function destroy($id)
    {
        $servidor = Servidor::find($id);

        if (!$servidor) {
            return response()->json(['message' => 'Servidor no encontrado'], 404);
        }

        $servidor->delete();

        return response()->json([
            'message' => 'Servidor eliminado correctamente'
        ], 200);
    }
}