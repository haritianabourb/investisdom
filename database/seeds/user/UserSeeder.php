<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
//    use Seedable;

//    protected $seedersPath = 'database/investis/seeds/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->command->line("---");
        $this->command->comment('Seeding Users');

        $this->call(UsersTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);

        $this->call(ResetSequenceTableSeeder::class);

        $this->command->info(get_class($this).' Seeds');
        $this->command->line("---");
    }
}
