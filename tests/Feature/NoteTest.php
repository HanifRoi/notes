<?php

namespace Tests\Feature;

use App\Models\Note;
use App\Models\User;
use Database\Seeders\NoteSeeder;
use Database\Seeders\UserSeeder;
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

    public function testUpdateSuccess()
    {
        $this->seed([UserSeeder::class, NoteSeeder::class]);

       
        $note = Note::limit(1)->first();
        $this->actingAs($note->user);
       
        $response = $this->put('note/'. $note->id, [
            'title'=>'mencoba',
            'note'=>'mencoba'
        ]);

        assertNotNull($response);
        $this->assertDatabaseHas('notes', [
            'title'=>'mencoba',
            'note'=>'mencoba'
        ]);
    }
}
