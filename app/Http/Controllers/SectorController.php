<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectorRequest;
use App\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function create(SectorRequest $request) {
        try {
            $sector = Sector::create($request->all());
        } catch (\Exception $e) {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 19){ // houston, we have a duplicate entry problem
                return response()->json([
                    'error' => [
                        'code' => $errorCode,
                        'message' => 'CHAVE DUPLICADA',
                    ]
                ], 400);
            }

            // TODO: Enviar e-mail para administrador e devolver o código do "chamado" para o usuário.
            return response()->json([
                'error' => [
                    'code' => $errorCode,
                    'message' => 'Erro no banco de dados.',
                    'message_raw' => $e->getMessage(),
                    ]
            ], 400);
        }
        return response()->json($sector, 201);
    }

    public function destroy(Sector $sector) {
        if($sector->devices->count() > 0) {
            return response()->json([
                'error' => [
                    'code' => 90,
                    'message' => 'Não se pode remover um setor com dispositivos vinculados.',
                ]
            ], 400);
        }

        $sector->delete();
        return response()->json(['message' => 'Setor removido com sucesso.'], 200);
    }

    public function show(Sector $sector) {
        $sector->devices;
        return response()->json($sector, 200);
    }
}
