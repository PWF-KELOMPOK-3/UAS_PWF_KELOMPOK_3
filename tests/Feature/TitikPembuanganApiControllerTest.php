<?php

namespace Tests\Feature;

use App\Models\TitikPembuangan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class TitikPembuanganApiControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test admin dapat melihat daftar titik pembuangan.
     *
     * @return void
     */
    public function test_admin_can_view_titik_pembuangan()
    {
        // Menyusun data titik pembuangan
        TitikPembuangan::factory()->create([
            'alamat' => 'Jalan ABC No. 123',
            'url' => 'https://example.com/image.jpg',
        ]);

        // Mengakses endpoint API untuk admin
        $response = $this->getJson('/api/titik_admin');

        // Memastikan respon status 200 dan data ditampilkan
        $response->assertStatus(Response::HTTP_OK)
                 ->assertJsonStructure([
                     'success',
                     'data' => [
                         '*' => ['id', 'alamat', 'url'],
                     ],
                 ]);
    }

    /**
     * Test pengguna dapat melihat daftar titik pembuangan.
     *
     * @return void
     */
    public function test_user_can_view_titik_pembuangan()
    {
        // Menyusun data titik pembuangan
        TitikPembuangan::factory()->create([
            'alamat' => 'Jalan XYZ No. 456',
            'url' => 'https://example.com/image2.jpg',
        ]);

        // Mengakses endpoint API untuk user biasa
        $response = $this->getJson('/api/Titik_Pembuangan');

        // Memastikan respon status 200 dan data ditampilkan
        $response->assertStatus(Response::HTTP_OK)
                 ->assertJsonStructure([
                     'success',
                     'data' => [
                         '*' => ['id', 'alamat', 'url'],
                     ],
                 ]);
    }

    /**
     * Test menyimpan titik pembuangan baru.
     *
     * @return void
     */
    public function test_store_titik_pembuangan()
    {
        $data = [
            'alamat' => 'Jalan DEF No. 789',
            'url' => 'https://example.com/image3.jpg',
        ];

        // Mengirim data POST untuk menambah titik pembuangan
        $response = $this->postJson('/api/titik_pembuangan', $data);

        // Memastikan respon status 201 (created) dan data disimpan dengan benar
        $response->assertStatus(Response::HTTP_CREATED)
                 ->assertJson([
                     'success' => true,
                     'message' => 'Data berhasil disimpan!',
                 ]);
    }

    /**
     * Test update titik pembuangan.
     *
     * @return void
     */
    public function test_update_titik_pembuangan()
    {
        // Membuat data titik pembuangan
        $titikPembuangan = TitikPembuangan::factory()->create();

        // Data yang akan diupdate
        $data = [
            'alamat' => 'Jalan GHI No. 101',
            'url' => 'https://example.com/image4.jpg',
        ];

        // Mengirim permintaan PUT untuk mengupdate titik pembuangan
        $response = $this->putJson("/api/titik_pembuangan/{$titikPembuangan->id}", $data);

        // Memastikan respon status 200 dan data diperbarui
        $response->assertStatus(Response::HTTP_OK)
                 ->assertJson([
                     'success' => true,
                     'message' => 'Data berhasil diperbarui!',
                 ]);
    }

    /**
     * Test menghapus titik pembuangan.
     *
     * @return void
     */
    public function test_delete_titik_pembuangan()
    {
        // Membuat data titik pembuangan
        $titikPembuangan = TitikPembuangan::factory()->create();

        // Mengirim permintaan DELETE untuk menghapus titik pembuangan
        $response = $this->deleteJson("/api/titik_pembuangan/{$titikPembuangan->id}");

        // Memastikan respon status 200 dan data dihapus
        $response->assertStatus(Response::HTTP_OK)
                 ->assertJson([
                     'success' => true,
                     'message' => 'Data berhasil dihapus!',
                 ]);
    }

    /**
     * Test validasi saat menyimpan titik pembuangan tanpa alamat.
     *
     * @return void
     */
    public function test_store_titik_pembuangan_without_alamat()
    {
        $data = [
            'url' => 'https://example.com/image5.jpg',
        ];

        // Mengirim permintaan POST tanpa alamat
        $response = $this->postJson('/api/titik_pembuangan', $data);

        // Memastikan respon status 422 dan pesan validasi muncul
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
                 ->assertJsonValidationErrors('alamat');
    }

    /**
     * Test validasi saat menyimpan titik pembuangan tanpa URL.
     *
     * @return void
     */
    public function test_store_titik_pembuangan_without_url()
    {
        $data = [
            'alamat' => 'Jalan JKL No. 102',
        ];

        // Mengirim permintaan POST tanpa URL
        $response = $this->postJson('/api/titik_pembuangan', $data);

        // Memastikan respon status 422 dan pesan validasi muncul
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
                 ->assertJsonValidationErrors('url');
    }
}
