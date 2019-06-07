<?php

namespace App\Console\Commands;

use App\Reservation;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class reservationFileName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'investis:reservation:fix-filename';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix filename description';

    protected $filenames = [
        'mr' => "investisseur_doc_reservation",
        'res' => "investisseur_doc_souscription",
        'cr' => 'cheque_resa',
        'rc' => 'remise_cheque',
        'acp' => 'investisseur_doc_cessionpart',
        'sousc' => 'investisseur_dossier_souscription'
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $reservation = Reservation::all();

        $reservation->each(function($item){

            foreach ($this->filenames as $prop => $name){
                $files = json_decode($item->$prop);
                if($files){
                    foreach ($files as $key => $file){
                        $file->download_link = str_replace("..", ".", str_replace("\\", DIRECTORY_SEPARATOR,   $file->download_link));
                        try{
                            $name=Str::before(Arr::last(explode(DIRECTORY_SEPARATOR, $file->download_link)), '.');
                            $file->original_name = $name;
                        }catch(\Throwable $e){
                            dump($e);
                        }
                        $files[$key] = $file;
                    }
                    $item->$prop = json_encode($files);
                }

                $item->unsetEventDispatcher();
                $item->save();
            }

        });

        dump($reservation->count());
    }
}
