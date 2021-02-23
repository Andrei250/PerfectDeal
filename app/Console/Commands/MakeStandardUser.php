<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeStandardUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:standard {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a person standard using email.';

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
     * @return int
     */
    public function handle(): int
    {
        $argument = $this->argument("email");

        $user = User::query()->where(["email" => $argument])->get();

        if (!is_null($user) && $user->isNotEmpty()) {
            $user[0]->user_role = 3;
            $user[0]->save();

            $this->info("This user is now a standard user");
            return 0;
        }
        $this->info("Invalid Email");

        return 0;
    }
}
