<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\BeritaRepoInterface;

class FeedController extends Controller
{

	protected $berita;

	public function __construct(BeritaRepoInterface $berita)
	{
		$this->berita = $berita;
	}
    	
    public function generate()
    {

    $feed = app("feed");

    $feed->setCache(60, 'laravelFeedKey');

    if (!$feed->isCached())
    {
       // creating rss feed with our most recent 20 posts
       // $posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();
       $berita =  $this->berita->all(20);

       // set your feed's title, description, link, pubdate and language
       $feed->title = env('NAMA_APP', 'Your app');
       $feed->description =  env('DESKRIPSI_APP', 'Your description');
       $feed->link = url('feed');
       $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
       $feed->pubdate = $berita[0]->created_at;
       $feed->lang = 'en';
       $feed->setShortening(true); // true or false
       $feed->setTextLimit(100); // maximum length of description text

       foreach ($berita as $list)
       {
           // set item's title, author, url, pubdate, description, content, enclosure (optional)*
           $feed->add(
	           	$list->judul, $list->fk__mst_user, \URL::to($list->slug), 
	           	$list->created_at, str_limit($list->artikel, 200), $list->artikel
           );
       }

    }
    return $feed->render('atom');  	
    }

    public function rss()
    {
      return redirect()->to('/feed');      
    }


}
