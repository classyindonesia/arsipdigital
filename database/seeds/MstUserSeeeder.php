<?php
use App\Models\Mst\User;
use App\Models\Mst\DataUser;
use Illuminate\Database\Seeder;


class MstUserSeeder extends Seeder{

	public function run(){

		$user1 = User::find(1);
		$user2 = User::find(2);
		$user3 = User::find(3);

		$data1 = [
			'email' => 'admin@example.com', 
			'password' => 'admin', 
			'ref_user_level_id' => 1
			];

		$data2 = [
			'email' => 'staff@example.com', 
			'password' => 'staff', 
			'ref_user_level_id' => 2
			];
		$data3 = [
			'email' => 'user@example.com', 
			'password' => 'user', 
			'ref_user_level_id' => 3
			];

		if(count($user1)<=0) User::create($data1);
		if(count($user2)<=0) User::create($data2);
		if(count($user3)<=0) User::create($data3);


$dt1 = DataUser::whereMstUserId(1)->first();
$dt2 = DataUser::whereMstUserId(2)->first();
$dt3 = DataUser::whereMstUserId(3)->first();

	if(count($dt1)<=0) DataUser::create(['nama' => 'Administrator', 'mst_user_id' => 1]);
	if(count($dt2)<=0) DataUser::create(['nama' => 'Staff', 'mst_user_id' => 2]);
	if(count($dt3)<=0) DataUser::create(['nama' => 'User', 'mst_user_id' => 3]);


	}


}