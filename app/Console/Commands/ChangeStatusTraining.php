<?php

namespace App\Console\Commands;

use App\Models\Training;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ChangeStatusTraining extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:changeStatusTraining';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check time of training to determinate status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $trainings = Training::where("p_start_date", "<", now())->where("p_status", "active")->get(["id", "p_start_date", "p_end_date"]);

            if ($trainings->count() > 0) {
                foreach ($trainings as $training) {
                    $status = "";
                    if ($training->p_start_date < now() && now() < $training->p_end_date) {
                        $status = "on going";
                    } else if ($training->p_start_date < now() && now() > $training->p_end_date) {
                        $status = "ended";
                    }

                    if (strlen($status) > 0) {
                        Training::whereId($training->id)->update([
                            "p_status" => $status
                        ]);
                    }
                }
            }
        } catch (\Throwable $th) {
            return Command::FAILURE;
        }


        return Command::SUCCESS;
    }
}
