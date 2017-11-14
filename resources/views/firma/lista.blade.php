@extends('layouts.app')

@section('title', 'Izbor firme')

@section('content')
  <div class="row">
    <div class="one-half column" style="margin-top: 10%">
      <h4>Izbor firme</h4>

      @if ($count === 0)
        <!-- Ovo nikad ne bi smelo da se prikaze: controller ne dopusta -->
        <p>Nije uneta ni jedna firma.</p>
      @else
        <p>Izaberite firmu za koju se vrsi obracun zarada ili unesite podatke o novoj firmi.</p>
        <p><a class="button" href="/firma/nova">Nova firma</a></p>
        <table class="u-full-width">
          <tbody>
            @foreach ($firmas as $firma)
              <tr>
                <td>{{ $firma->naziv }}</td>
                <td>
                  <a href="/firma/izbor/{{ $firma->id }}">
                    <img src="{{ URL::asset('images/Button-Ok-icon.png') }}" alt="Izbor" title="Izaberi" height="32" width="32"/>
                  </a>
                </td>
                <td>
                  <a href="/firma/{{ $firma->id }}">
                    <img src="{{ URL::asset('images/Button-Info-icon.png') }}" alt="Detalji" title="Detalji" height="32" width="32"/>
                  </a>
                </td>
                <td>
                  <a href="/firma/izmena/{{ $firma->id }}">
                    <img src="{{ URL::asset('images/Button-Play-icon.png') }}" alt="Izmena" title="Izmena" height="32" width="32"/>
                  </a>
                </td>
                <td>
                  <a href="/firma/brisanje/{{ $firma->id }}">
                    <img src="{{ URL::asset('images/Button-Delete-icon.png') }}" alt="Brisanje" title="Obrisi" height="32" width="32"/>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div> <!-- one-half column -->
  </div> <!-- row -->
@endsection
