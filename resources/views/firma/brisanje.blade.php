@extends('layouts.app')

@section('title', 'Brisanje firme')

@section('content')
  <div class="row" style="margin-top: 10%">
      <h4>Brisanje firme: {{ $firma->naziv }}</h4>
  </div> <!-- row -->

  <form method="POST" action="/firma/{{ $firma->id }}">
    <input type="hidden" name="_method" value="DELETE">
    {{ csrf_field() }}

    <div class="row">
      Da li ste sigurni da zelite da obrisete sve podatke o firmi <strong>{{ $firma->naziv }}</strong>?
    </div> <!-- row -->

    <div class="row" style="margin-top: 15px">
      <a class="button" href="/firma">Otkazi</a>
      <input class="button-primary" value="Obrisi" type="submit">
    </div> <!-- row -->
  </form>
@endsection
