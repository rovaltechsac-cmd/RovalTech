<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Validación de la interfaz del formulario de contacto.
     * Por ahora no envía correos ni guarda información: solo confirma en pantalla.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'email', 'max:150'],
            'empresa' => ['nullable', 'string', 'max:120'],
            'asunto' => ['required', 'string', 'max:80'],
            'mensaje' => ['required', 'string', 'min:10', 'max:2000'],
        ]);

        return back()->with('success', '¡Gracias, '.$datos['nombre'].'! Hemos recibido tu mensaje. Pronto nos pondremos en contacto contigo.');
    }
}
