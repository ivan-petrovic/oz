<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Firma;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FirmasController extends Controller
{
  /**
   * Prikazi listu firmi
   * GET /firma
   *
   * @return View
   */
  public function index()
  {
    $firmas = Firma::all();
    $count = count($firmas);

    if ($count == 0) {
      // jos nema unetih firmi: preusmeri na formular za unos
      return view('firma.unos');
    }
    if ($count == 1) {
      // postavi jedinu firmu kao izabranu u Session
    }
    return view('firma.lista', ['firmas' => $firmas, 'count' => $count]);
  }

  /**
   * Prikazi izabranu firmu
   * GET /firma/{id}
   * @param integer $id
   *
   * @return View
   */
  public function show($id)
  {
    try {
      $firma = Firma::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return view('firma.404');
    }

    return view('firma.detalji', ['firma' => $firma]);
  }

  /**
   * Prikazi formu za unos nove firme
   *
   * @return Response
   */
  public function newform()
  {
     return view('firma.unos');
  }

  /**
   * Snimi firmu u bazu podataka
   * POST /firma
   * @param Request $request
   * @return Response
   */
  public function store(Request $request)
  {
     // validacija
     $this->validate($request, [
       'naziv' => 'required'
     ]);

     // snimanje
     $firma = Firma::create($request->all());

     // obavestenje korisniku
     return view('firma.detalji', compact('firma'));
  }

  /**
   * Prikazi formu za izmenu podataka o firmi
   *
   * @return Response
   */
  public function editform($id)
  {
    try {
      $firma = Firma::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return view('firma.404');
    }

    return view('firma.izmena', compact('firma'));
  }

  /**
   * Izmeni podatke o firmi u bazu podataka
   * PUT /firma/{id}
   * @param Request $request
   * @param integer $id
   * @return View
   */
  public function update(Request $request, $id)
  {
     try {
       $firma = Firma::findOrFail($id);
     } catch (ModelNotFoundException $e) {
       return view('firma.404');
     }

     // validacija
     $this->validate($request, [
       'naziv' => 'required'
     ]);

     // snimanje
     $firma->fill($request->all());
     $firma->save();

     // obavestenje korisniku
     return view('firma.detalji', compact('firma'));
  }

  /**
   * Prikazi formu za potvrdu brisanja firme
   *
   * @return Response
   */
  public function deleteform($id)
  {
    try {
      $firma = Firma::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return view('firma.404');
    }

    return view('firma.brisanje', compact('firma'));
  }

  /**
   * Obrisi podatke o firmi iz baze podataka
   * DELETE /firma/{id}
   * @param integer $id
   *
   * @return Response
   */
  public function destroy($id)
  {
    try {
      $firma = Firma::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return view('firma.404');
    }

    $firma->delete();

    return redirect()->route('lista_firmi');
  }

  /**
   * Upisi izabranu firmu u session variablu
   *
   * @param integer $id
   *
   * @return Response
   */
  public function choose($id)
  {
    try {
      $firma = Firma::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return view('firma.404');
    }

    session(['izabranaFirma' => $firma]);

    return redirect()->route('lista_firmi');
  }
}
