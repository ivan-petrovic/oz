@extends('layouts.app')

@section('title', 'Prikaz firme')

@section('content')
  <div class="row" style="margin-top: 10%">
    <h4>Detalji firme: {{ $firma->naziv }}</h4>
    <a class="button" href="/firma/izbor/{{ $firma->id }}">Izaberi</a>
    <a class="button" href="/firma/izmena/{{ $firma->id }}">Izmeni</a>
    <a class="button" href="/firma/brisanje/{{ $firma->id }}">Izbrisi</a>
    <a class="button" href="/firma">Nazad</a>
  </div> <!-- row -->

  <div class="row">
    <div class="one-half column">
      <table class="u-full-width">
        <tbody>
          <tr>
            <th>Naziv</th><td>{{ $firma->naziv }}</td>
          </tr>
          <tr>
            <th>Adresa</th><td>{{ $firma->adresa }}</td>
          </tr>
          <tr>
            <th>Mesto</th><td>{{ $firma->mesto }}</td>
          </tr>
          <tr>
            <th>Telefon</th><td>{{ $firma->telefon }}</td>
          </tr>
          <tr>
            <th>Tip</th><td>{{ $firma->tip }}</td>
          </tr>
          <tr>
            <th>Status</th><td>{{ $firma->status }}</td>
          </tr>
        </tbody>
      </table>
    </div> <!-- one-half column -->

    <div class="one-half column">
      <table class="u-full-width">
        <tbody>
          <tr>
            <th>Maticni broj</th><td>{{ $firma->matbr }}</td>
          </tr>
          <tr>
            <th>PIB</th><td>{{ $firma->pib }}</td>
          </tr>
          <tr>
            <th>Sifra delatnosti</th><td>{{ $firma->sifdel }}</td>
          </tr>
          <tr>
            <th>Ziro racun</th><td>{{ $firma->ziro_racun }}</td>
          </tr>
          <tr>
            <th>Naziv banke</th><td>{{ $firma->naziv_banke }}</td>
          </tr>
        </tbody>
      </table>
    </div> <!-- one-half column -->
  </div> <!-- row -->
@endsection
