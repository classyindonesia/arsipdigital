<?php

namespace App\Jobs\ArsipUser;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendFileArsipToEmailJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;


    public $email;
    public $mst_arsip_id;
    const SIZE_FILE_ARSIP = 20971520; //20mb

    public function __construct($email, $mst_arsip_id)
    {
        $this->email = $email;
        $this->mst_arsip_id = $mst_arsip_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $arsip_obj = app('Repo\Contracts\Mst\ArsipRepoInterface');
        $arsip = $arsip_obj->find($this->mst_arsip_id);

        $total_size_file = $arsip->mst_file->sum('size');
        if($total_size_file > self::SIZE_FILE_ARSIP){
            \Log::info('ukuran file lebih besar, arsip tdk bs dikirim');
        }else{
            $this->sendToEmail($arsip);            
        }
        return 'ok';        
    }

    private function sendToEmail($arsip)
    {
        // kirim ke email
        \Mail::raw($arsip->nama, function ($message) use ($arsip) {
            $message->from(env('EMAIL_PENGIRIM'), env('NAMA_PENGIRIM'));
            $message->to($this->email)
                    ->subject($arsip->nama.' '.\Fungsi::date_to_tgl(date('Y-m-d')).' '.date('H:i:s'));

                foreach($arsip->mst_file as $list_file){
                    $path = public_path('upload/arsip/'.$list_file->nama_file_tersimpan);
                    if(file_exists($path)){
                        $message->attach($path);                        
                    }
                }
        });         
    }

}
