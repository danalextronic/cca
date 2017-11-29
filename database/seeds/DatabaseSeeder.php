<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(SectionSeeder::class);
        $this->call(AdminSeeder::class);
        //$this->call(ClientSeeder::class);
        
        



        //DB::table('users')->insert([
        //    'name' => 'Harry Han',
        //    'email' => 'harry.test@hanix.com.au',
        //    'password' => bcrypt('password'),
        //    'contractorLastname' => 'Han',
        //    'contractorCompany' => 'test-company' ,
        //    'contractorContactNumber' => '0600000000',
        //    'contractorStatus' => 'active'
        //]);
    }
}
