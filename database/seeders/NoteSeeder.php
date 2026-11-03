<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::limit(1)->first();
        Note::create([
            'user_id'=>$user->id,
            'title'=>'Coba',
            'note'=>'coba'
        ]);
    }
}
