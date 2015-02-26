<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;

/* models */
use App\Models\Mst\AttachEmail;

class DelAttachedFiles extends Command implements SelfHandling, ShouldBeQueued {

	use InteractsWithQueue, SerializesModels;


	public $my_id;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($my_id){
		$this->my_id = $my_id;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(){
		$list_file = AttachEmail::whereMstUserId($this->my_id)->get();
		foreach($list_file as $list){
			$path = storage_path('attach/'.$this->my_id.'/'.$list->nama_file_asli);
			if(file_exists($path)){
				unlink($path);
			}
			$list->delete();
		}
	}



}
