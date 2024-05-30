<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ranking;

class UpdateTableRanking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-table-ranking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualiza los datos de la tabla rankings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $Rankings = Ranking::all(); // Obtiene todos los usuarios
        foreach ($Rankings as $Ranking) {
            $Ranking->touch(); // Actualiza la columna updated_at
        }
        $this->info('Datos de la tabla rankings actualizados correctamente.');
    }
}
