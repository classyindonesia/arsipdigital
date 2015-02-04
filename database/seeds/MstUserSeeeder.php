<?php
use App\Models\Mst\User;
use Illuminate\Database\Seeder;


class MstUserSeeder extends Seeder{

	public function run(){

		$user1 = User::find(1);
		$user2 = User::find(2);
		$user3 = User::find(3);

		$data1 = [
			'name' => 'administrator', 
			'email' => 'admin@example.com', 
			'password' => Hash::make('admin'), 
			'ref_user_level_id' => 1
			];

		$data2 = [
			'name' => 'staff', 
			'email' => 'staff@example.com', 
			'password' => Hash::make('staff'), 
			'ref_user_level_id' => 2
			];
		$data3 = [
			'name' => 'user', 
			'email' => 'user@example.com', 
			'password' => Hash::make('user'), 
			'ref_user_level_id' => 3
			];

		if(count($user1)<=0) User::create($data1);
		if(count($user2)<=0) User::create($data2);
		if(count($user3)<=0) User::create($data3);

	}


}