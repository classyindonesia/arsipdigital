<?php 

namespace App\Jobs;

use App\Jobs\Job;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

/* facade */
use Mail, Auth;

/* models */
use App\Models\Mst\User;
use App\Models\Mst\AttachEmail;


class SendEmail extends Job implements SelfHandling, ShouldQueue {

	use InteractsWithQueue, SerializesModels;

	public $email_to;
	public $subject;
	public $konten;
	public $nama_penerima;
	public $my_id;



	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($konten, $subject, $email_to, $nama_penerima, $my_id){
		$this->nama_penerima = $nama_penerima;
		$this->konten = $konten;
		$this->subject = $subject;
		$this->email_to = $email_to;
		$this->my_id = $my_id;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(){

		//create array path
		$path = [];
		$attached_files = AttachEmail::whereMstUserId($this->my_id)->get();
		if(count($attached_files)>0){
			foreach($attached_files as $file){
		     	$path[] = storage_path('attach/'.$this->my_id.'/'.$file->nama_file_asli);
		    }			
		}

	    //data untuk ditaruh di view
		$data = [
			'konten' => $this->konten
		];


		Mail::send('emails.pesan', $data, function($message) use ($path){
		    $message->from(env('EMAIL_PENGIRIM'), env('NAMA_PENGIRIM'));
		    $message->to($this->email_to, $this->nama_penerima)
		    		->subject($this->subject);
		    //lampiran file
			 $size = count($path);  
		     for($i=0;$i<$size;$i++){
		     	if(file_exists($path[$i])){
		     		$message->attach($path[$i]);
		     	}						     
		     }

		 });

	}











}
