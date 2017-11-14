@extends('layouts.app')

@section('title', 'Izmena podataka o firmi')

@section('content')
  <div class="row">
    <div class="one-half column" style="margin-top: 10%">
      <h4>Izmena podataka o firmi</h4>
      <a class="button" href="/firma">Nazad</a>
    </div> <!-- one-half column -->
  </div> <!-- row -->

  <form method="POST" action="/firma/{{ $firma->id }}">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}

    <div class="row">

      <div class="six columns">
        <label for="naziv">Naziv:</label>
        <input class="u-full-width" type="text" id="naziv" name="naziv"
          value="{{ $firma->naziv ? $firma->naziv : '' }}">

        <label for="adresa">Adresa:</label>
        <input class="u-full-width" type="text" id="adresa" name="adresa"
          value="{{ $firma->adresa ? $firma->adresa : '' }}">

        <label for="mesto">Mesto:</label>
        <input class="u-full-width" type="text" id="mesto" name="mesto"
          value="{{ $firma->mesto ? $firma->mesto : '' }}">

        <label for="telefon">Telefon:</label>
        <input class="u-full-width" type="text" id="telefon" name="telefon"
          value="{{ $firma->telefon ? $firma->telefon : '' }}">

        <label for="tip">Tip:</label>
        <select class="u-full-width" id="tip" name="tip">
          <option value="1" {{ $firma->tip === 1 ? 'selected' : '' }}>Javno preduzece</option>
          <option value="2" {{ $firma->tip === 2 ? 'selected' : '' }}>Privatna firma</option>
          <option value="3" {{ $firma->tip === 3 ? 'selected' : '' }}>Fabrika</option>
          <option value="4" {{ $firma->tip === 4 ? 'selected' : '' }}>Agencija</option>
          <option value="5" {{ $firma->tip === 5 ? 'selected' : '' }}>Ministarstvo</option>
        </select>

        <label for="status">Status:</label>
        <select class="u-full-width" id="status" name="status">
          <option value="Aktivan" {{ $firma->status === "Aktivan" ? 'selected' : '' }}>Aktivan</option>
          <option value="Pasivan" {{ $firma->status === "Pasivan" ? 'selected' : '' }}>Pasivan</option>
        </select>
      </div> <!-- six columns -->

      <div class="six columns">
        <label for="matbr">Maticni broj:</label>
        <input class="u-full-width" type="text" id="matbr" name="matbr"
          value="{{ $firma->matbr ? $firma->matbr : '' }}">

        <label for="pib">PIB:</label>
        <input class="u-full-width" type="text" id="pib" name="pib"
          value="{{ $firma->pib ? $firma->pib : '' }}">

        <label for="sifdel">Sifra delatnosti:</label>
        <input class="u-full-width" type="text" id="sifdel" name="sifdel"
          value="{{ $firma->sifdel ? $firma->sifdel : '' }}">

        <label for="ziroracun">Ziro racun:</label>
        <input class="u-full-width" type="text" id="ziroracun" name="ziro_racun"
          value="{{ $firma->ziro_racun ? $firma->ziro_racun : '' }}">

        <label for="banka">Naziv banke:</label>
        <input class="u-full-width" type="text" id="banka" name="naziv_banke"
          value="{{ $firma->naziv_banke ? $firma->naziv_banke : '' }}">
      </div> <!-- six columns -->

    </div> <!-- row -->
    <input class="button-primary" value="Snimi" type="submit">
  </form>
@endsection
