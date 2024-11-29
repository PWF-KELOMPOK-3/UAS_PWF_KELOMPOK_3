<?php

namespace Tests\Feature;

use App\Models\Artikel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArtikelAPIControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test untuk menampilkan semua artikel.
     *
     * @return void
     */
    public function test_index_returns_all_artikel()
    {
        // Membuat beberapa artikel
        Artikel::factory()->count(3)->create();

        // Mengirim request GET ke /api/artikel
        $response = $this->getJson('/api/artikel');

        // Memastikan response memiliki status 200 dan data artikel
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'success',
                     'data' => [
                         '*' => [
                             'id',
                             'judul',
                             'konten',
                             'image_url',
                         ],
                     ],
                 ]);
    }

    /**
     * Test untuk menampilkan artikel berdasarkan ID.
     *
     * @return void
     */
    public function test_show_returns_artikel_by_id()
    {
        $artikel = Artikel::factory()->create();

        // Mengirim request GET ke /api/artikel/{id}
        $response = $this->getJson("/api/artikel/{$artikel->id}");

        // Memastikan response memiliki status 200 dan data artikel
        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'data' => [
                         'id' => $artikel->id,
                         'judul' => $artikel->judul,
                         'konten' => $artikel->konten,
                         'image_url' => $artikel->image_url,
                     ],
                 ]);
    }

    /**
     * Test untuk menampilkan error jika artikel tidak ditemukan.
     *
     * @return void
     */
    public function test_show_returns_error_if_artikel_not_found()
    {
        // Mengirim request GET ke /api/artikel/999 yang tidak ada
        $response = $this->getJson('/api/artikel/999');

        // Memastikan response memiliki status 404 dan pesan error
        $response->assertStatus(404)
                 ->assertJson([
                     'success' => false,
                     'message' => 'Artikel not found',
                 ]);
    }


    /**
     * Test untuk memperbarui artikel.
     *
     * @return void
     */
    public function test_update_updates_existing_artikel()
    {
        $artikel = Artikel::factory()->create();

        // Data yang akan diperbarui
        $data = [
            'judul' => 'Artikel yang Diperbarui',
            'konten' => 'Konten artikel yang sudah diperbarui',
        ];

        // Mengirim request PUT ke /api/artikel/{id}
        $response = $this->putJson("/api/artikel/{$artikel->id}", $data);

        // Memastikan response memiliki status 200 dan artikel diperbarui
        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'message' => 'Artikel updated successfully.',
                 ]);

        // Memastikan artikel di database terupdate
        $artikel->refresh();
        $this->assertEquals('Artikel yang Diperbarui', $artikel->judul);
        $this->assertEquals('Konten artikel yang sudah diperbarui', $artikel->konten);
    }

    /**
     * Test untuk menghapus artikel.
     *
     * @return void
     */
    public function test_destroy_deletes_artikel()
    {
        $artikel = Artikel::factory()->create();

        // Mengirim request DELETE ke /api/artikel/{id}
        $response = $this->deleteJson("/api/artikel/{$artikel->id}");

        // Memastikan response memiliki status 200 dan pesan sukses
        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'message' => 'Artikel deleted successfully.',
                 ]);

        // Memastikan artikel tidak ada lagi di database
        $this->assertDatabaseMissing('artikels', [
            'id' => $artikel->id,
        ]);
    }
}
