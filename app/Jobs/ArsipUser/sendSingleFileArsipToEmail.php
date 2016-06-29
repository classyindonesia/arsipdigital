<?php

namespace App\Jobs\ArsipUser;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendSingleFileArsipToEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $email;
    public $mst_file_id;

    public function __construct($email, $mst_file_id)
    {
        $this->email = $email;
        $this->mst_file_id = $mst_file_id;
    }

    public function handle()
    {
        $file_obj = app('Repo\Contracts\Mst\FileRepoInterface');
        $file = $file_obj->find($this->mst_file_id);

        // kirim ke email
        \Mail::raw($file->mst_arsip->nama, function ($message) use ($file) {
            $message->from(env('EMAIL_PENGIRIM'), env('NAMA_PENGIRIM'));
            $message->to($this->email)
                    ->subject($file->mst_arsip->nama.' '.\Fungsi::date_to_tgl(date('Y-m-d')).' '.date('H:i:s'));

                    $path = public_path('upload/arsip/'.$file->nama_file_tersimpan);
                    if(file_exists($path)){
                        $message->attach($path, ['as' => $file->nama_file_asli]);                        
                    }
        });  
        // end kirim ke email

    }
}
