<?php

namespace App\Console\Commands;

use App\Models\Pokemon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PokeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:poke-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command sync Pokemons from PokeAPI';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $number = $this->argument('number');
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$number}");

        if ($response->successful()) {
            $data = $response->json();
            $type = $data['types'][0]['type']['name'];

            Pokemon::create([
                'name' => $data['name'],
                'height' => $data['height'],
                'weight' => $data['weight'],
                'type' => $type,
            ]);

            // Logging success
            $this->info("Pokémon data for number {$number} fetched successfully!");
        } else {
            // Logging fail
            // Mail::send([
            //            'address' => 'test@gmail.com',
            //            'message' => 'failed',
            //        ])->message();
            $this->error("Failed to fetch data for Pokémon: {$number}");
        }

    }
}
