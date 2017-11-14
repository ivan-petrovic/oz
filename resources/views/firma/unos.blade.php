@extends('layouts.app')

@section('title', 'Unos nove firme')

@section('content')
  <div class="row">
    <div class="one-half column" style="margin-top: 10%">
      <h4>Unos nove firme</h4>
      <a class="button" href="/firma">Nazad</a>
    </div> <!-- one-half column -->
  </div> <!-- row -->

  @if ($errors->any())
      <div class="row">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form method="POST" action="/firma">
    {{ csrf_field() }}

    <div class="row">

      <div class="six columns">
        <label for="naziv">Naziv:
          @if ($errors->has('naziv'))
            Obavezno polje
          @endif
        </label>
        <input class="u-full-width" type="text" id="naziv" name="naziv">

        <label for="adresa">Adresa:</label>
        <input class="u-full-width" type="text" id="adresa" name="adresa">

        <label for="mesto">Mesto:</label>
        <input class="u-full-width" type="text" id="mesto" name="mesto">

        <label for="telefon">Telefon:</label>
        <input class="u-full-width" type="text" id="telefon" name="telefon">

        <label for="tip">Tip:</label>
        <select class="u-full-width" id="tip" name="tip">
          <option value="1">Javno preduzece</option>
          <option value="2">Privatna firma</option>
          <option value="3">Fabrika</option>
        </select>

        <label for="status">Status:</label>
        <select class="u-full-width" id="status" name="status">
          <option value="Aktivan">Aktivan</option>
          <option value="Pasivan">Pasivan</option>
        </select>
      </div> <!-- six columns -->

      <div class="six columns">
        <label for="matbr">Maticni broj:</label>
        <input class="u-full-width" type="text" id="matbr" name="matbr">

        <label for="pib">PIB:</label>
        <input class="u-full-width" type="text" id="pib" name="pib">

        <label for="sifdel">Sifra delatnosti:</label>
        <input class="u-full-width" type="text" id="sifdel" name="sifdel">

        <label for="ziroracun">Ziro racun:</label>
        <input class="u-full-width" type="text" id="ziroracun" name="ziro_racun">

        <label for="banka">Naziv banke:</label>
        <input class="u-full-width" type="text" id="banka" name="naziv_banke">
      </div> <!-- six columns -->

    </div> <!-- row -->
    <input class="button-primary" value="Snimi" type="submit">
  </form>
@endsection
