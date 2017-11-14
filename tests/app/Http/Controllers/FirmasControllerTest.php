<?php

namespace Tests\App\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Firma;

class FirmasControllerTest extends TestCase
{
  use RefreshDatabase;

  //-------------------------
  // Testiranje index route
  //-------------------------

  /** @test **/
  public function index_status_code_should_be_200()
  {
    $this->get('/firma')->assertStatus(200);
  }

  /** @test **/
  public function index_should_return_a_collection_of_records()
  {
    $firmas = factory(Firma::class, 2)->create();

    $response = $this->get('/firma');

    $response->assertViewIs('firma.lista');
    foreach ($firmas as $firma) {
      $response->assertSee($firma->naziv);
    }
  }

  /** @test **/
  public function index_should_redirect_to_view_for_new_firm_when_no_firms_exist()
  {
    $response = $this->get('/firma');

    $response->assertViewIs('firma.unos');
    $response->assertDontSee("Nije uneta ni jedna firma.");
  }

  //-------------------------
  // Testiranje show route
  //-------------------------

  /** @test **/
  public function show_should_return_a_valid_firma()
  {
    $firma = factory(Firma::class)->create();
    $this
      ->get("firma/{$firma->id}")
      ->assertStatus(200)
      ->assertSee($firma->naziv)
      ->assertSee($firma->adresa)
      ->assertViewIs('firma.detalji');
  }

  /** @test **/
  public function show_should_fail_when_firma_id_does_not_exist()
  {
    $this
      ->get("firma/9999")
      ->assertViewIs('firma.404');
      // ->assertStatus(404);
  }


  /** @test **/
  public function show_route_should_not_match_an_invalid_route()
  {
    $this
      ->get("firma/invalid-id")
      ->assertStatus(404);
/*
    $this->assertNotRegExp(
      'Firma nije pronadjena',
      $this->getOriginalContent(),
      'FirmasController@show route matching when it should not.'
    );
    */
  }

  //--------------------------------------
  // Testiranje route za unos nove firme
  //--------------------------------------

  /** @test **/
  public function store_should_save_new_firma_in_the_database()
  {
    $firma = factory(Firma::class)->make();
    $this->post('/firma', [
      'naziv' => $firma->naziv,
      'adresa' => $firma->adresa,
      'mesto' => $firma->mesto,
      'telefon' => $firma->telefon,
      'tip' => $firma->tip,
      'status' => $firma->status,
      'matbr' => $firma->matbr,
      'pib' => $firma->pib,
      'sifdel' => $firma->sifdel,
      'ziro_racun' => $firma->ziro_racun,
      'naziv_banke' => $firma->naziv_banke
    ]);
    $this->assertDatabaseHas('firmas', [
      'naziv' => $firma->naziv,
      'adresa' => $firma->adresa
    ]);
  }

  /** @test **/
  public function store_should_redirect_to_detalji_view_with_new_firma_data()
  {
    $firma = factory(Firma::class)->make();
    $response = $this->post('/firma', [
      'naziv' => $firma->naziv,
      'adresa' => $firma->adresa,
      'mesto' => $firma->mesto,
      'telefon' => $firma->telefon,
      'tip' => $firma->tip,
      'status' => $firma->status,
      'matbr' => $firma->matbr,
      'pib' => $firma->pib,
      'sifdel' => $firma->sifdel,
      'ziro_racun' => $firma->ziro_racun,
      'naziv_banke' => $firma->naziv_banke
    ]);
    $response
      ->assertStatus(200)
      ->assertViewIs('firma.detalji')
      ->assertSee($firma->naziv);
  }

  //----------------------------------------------
  // Testiranje route za izmenu podataka o firmi
  //----------------------------------------------

  /** @test **/
  public function update_should_only_change_fillable_fields()
  {
    $firma = factory(Firma::class)->create();
    $response = $this->put("/firma/{$firma->id}", [
      'id' => 5,
      'naziv' => 'Novi naziv',
      'adresa' => 'Nova adresa',
    ]);

    $this->assertDatabaseHas('firmas', [
      'naziv' => 'Novi naziv',
      'adresa' => 'Nova adresa'
    ]);

    $response
      ->assertStatus(200)
      ->assertViewIs('firma.detalji')
      ->assertViewHas('firma')
      ->assertSee("Novi naziv")
      ->assertSee("Nova adresa");
  }

  /** @test **/
  public function update_should_fail_with_an_invalid_id()
  {
    $response = $this->put("/firma/9999", [
      'id' => 5,
      'naziv' => 'Novi naziv',
      'adresa' => 'Nova adresa',
    ]);
    $response->assertViewIs('firma.404');
  }

  /** @test **/
  public function update_should_not_match_invalid_route()
  {
    $this
      ->put("firma/invalid-id")
      ->assertStatus(404);
  }

  //----------------------------------------------
  // Testiranje route za brisanje firme
  //----------------------------------------------

  /** @test **/
  public function destroy_should_remove_a_valid_firm()
  {
    $firma = factory(Firma::class)->create();
    $this
      ->delete("/firma/{$firma->id}")
      ->assertRedirect(route('lista_firmi'));

    $this->assertDatabaseMissing('firmas', ['id' => $firma->id]);
  }

  /** @test **/
  public function destroy_should_return_a_404_view_with_an_invalid_id()
  {
    $response = $this->delete("/firma/9999", [
      'id' => 5,
      'naziv' => 'Novi naziv',
      'adresa' => 'Nova adresa',
    ]);
    $response->assertViewIs('firma.404');
  }

  /** @test **/
  public function destroy_should_not_match_invalid_route()
  {
    $this
      ->delete("firma/invalid-id")
      ->assertStatus(404);
  }

}
