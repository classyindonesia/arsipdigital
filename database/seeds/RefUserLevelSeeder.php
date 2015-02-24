<?php  
use Illuminate\Database\Seeder;
use App\Models\Ref\UserLevel;

class RefUserLevelSeeder  extends Seeder { 

	public function run(){
		$level1 = UserLevel::find(1);
		if(count($level1)<=0) UserLevel::create([ 'id'=>1, 'nama' => 'admin']);
		$level2 = UserLevel::find(2);
		if(count($level2)<=0) UserLevel::create([ 'id'=>2, 'nama' => 'staff']);
		$level3 = UserLevel::find(3);
		if(count($level3)<=0) UserLevel::create([ 'id'=>3, 'nama' => 'user']);
	 	$this->command->info('User Level table seeded!');
	 	$level4 = UserLevel::find(4);
		if(count($level4)<=0) UserLevel::create([ 'id'=>4, 'nama' => 'web']);
	 	$this->command->info('User Level table seeded!');

	}


}