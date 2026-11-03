<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertNull;

class NoteTest extends TestCase
{
    public function testCreateButNotLogin()
    {
        $response = $this->get('/note/create');
        $response->assertRedirect(route('login'));
    }

    public function testCreateSuccess()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/note' , [
            'title'=>'Hallo',
            'note'=>'Note pertama'
        ]);
    $response->assertSessionHasNoErrors(); // Cek apakah ada error validasi
        $response->assertRedirect(route('note.index'));
        $this->assertDatabaseHas('notes',[
            'user_id' => $user->id,
            'title'=>'Hallo',
            'note'=>'Note pertama'
        ]);
    }

    public function testCreateNoteFailed()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/note', [
            'title'=>'',
            'note'=>''
        ]);

       $response->assertSessionHasErrors(['title', 'note']);
       $this->assertDatabaseCount('notes', 0);
    }
}
