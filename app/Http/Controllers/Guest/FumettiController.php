<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FumettiController extends Controller
{
    // Metodo per visualizzare tutti i fumetti
    public function index()
    {
        // Recupera tutti i fumetti dal database
        $comics = Comic::all(); 
        // Carica la vista index e passa i fumetti recuperati come parametro
        return view('comics.index', compact('comics'));
    }

    // Metodo per visualizzare il form per aggiungere un nuovo fumetto
    public function create()
    {
        // Carica la vista create per aggiungere un nuovo fumetto
        return view('comics.create');
    }

    // Metodo per salvare un nuovo fumetto nel database
    public function store(Request $request)
    {
        // Validazione dei dati inseriti nel form per aggiungere un nuovo fumetto
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumb' => 'required|url',
            'price' => 'required|numeric',
            'series' => 'required|string',
            'sale_date' => 'required|date',
            'type' => 'required|string',
            'artists' => 'required|string',
            'writers' => 'required|string',
        ]);

        // Se la validazione fallisce, reindirizza all'azione precedente con gli errori e i dati inseriti
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Creazione di una nuova istanza di Comic con i dati inseriti nel form
        $comic = new Comic();
        $comic->fill($request->all());
        $comic->save();

        // Reindirizza all'indice dei fumetti con un messaggio di successo
        return redirect()->route('guest.comics.index')->with('success', 'Fumetto aggiunto con successo!');
    }

    // Metodo per visualizzare i dettagli di un fumetto
    public function show(string $id)
    {
        // Recupera il fumetto corrispondente all'id fornito
        $comic = Comic::findOrFail($id);
        // Carica la vista show per visualizzare i dettagli del fumetto
        return view('comics.show', compact('comic'));
    }

    // Metodo per visualizzare il form per modificare un fumetto
    public function edit(string $id)
    {
        // Recupera il fumetto corrispondente all'id fornito
        $comic = Comic::findOrFail($id);
        // Carica la vista edit per modificare il fumetto
        return view('comics.edit', compact('comic'));
    }

    // Metodo per salvare le modifiche di un fumetto nel database
    public function update(Request $request, string $id)
    {
        // Validazione dei dati inseriti nel form per modificare il fumetto
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumb' => 'required|url',
            'price' => 'required|numeric',
            'series' => 'required|string',
            'sale_date' => 'required|date',
            'type' => 'required|string',
            'artists' => 'required|string',
            'writers' => 'required|string',
        ]);
    
        // Se la validazione fallisce, reindirizza all'azione precedente con gli errori e i dati inseriti
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Recupera il fumetto corrispondente all'id fornito e aggiorna i suoi dati con quelli inseriti nel form
        $comic = Comic::findOrFail($id);
        $comic->update($request->all());
    
        // Reindirizza alla visualizzazione dei dettagli del fumetto appena aggiornato con un messaggio di successo
        return redirect()->route('guest.comics.show', $comic->id)->with('success', 'Fumetto aggiornato con successo!');
    }

    // Metodo per eliminare un fumetto dal database (non implementato)
    public function destroy(string $id)
    {
        // Implementa la logica per eliminare un fumetto
    }
}
