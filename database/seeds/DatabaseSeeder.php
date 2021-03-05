<?php

use App\Models\Account;
use App\Models\Contact;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $account = Account::create(['name' => 'Catanduanes State University']);

        factory(User::class)->create([
            'account_id' => $account->id,
            'first_name' => 'Isaac',
            'last_name' => 'Arcilla',
            'email' => 'isaacdarcilla@gmail.com',
            'owner' => true,
        ]); 
    }
}
