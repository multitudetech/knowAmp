<?php
namespace App\Http\Controllers;
use DB;
use Mail;
use App\news_source;
use App\content_news;

class NewsController extends Controller{

	public function index()
	{
		$title = 'News | KnowAmp | Technical News | Current affairs';

		return view('news', compact('title'));
	}

	public function newsletter(){
		//fetch news
		$ch = curl_init();
		$request_url = "https://newsapi.org/v1/articles?source=techcrunch&sortBy=top&apiKey=928df52bba4e4310b58514bc6358807f";
		curl_setopt($ch, CURLOPT_URL, $request_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);
		$authToken = curl_exec($ch);
		$data = json_decode($authToken);

		foreach ($data->articles as $d) {
			$temp_urlToImage[] = $d->urlToImage;
			$temp_title[] = $d->title;
			$temp_publishedAt[] = $d->publishedAt;
		}

		$mail_data['urlToImage'] = $temp_urlToImage;
		$mail_data['title'] = $temp_title;
		$mail_data['publishedAt'] = $temp_publishedAt;

		//fetch contact details
		$email = DB::table('users')
			->select('email')
			->get();

		foreach ($email as $de) {
			$to[] = $de->email;
		}
		$mail_data['to'] = $to;
		
		foreach ($email as $de) {
			
		}
		//send mail		
		Mail::send('newsletter', $mail_data, function ($message) use ($data) {

            $message->from('namaste@knowamp.com', 'KnowAmp');

            $message->to('tejas.ambalia1994@gmail.com')->subject('KnowAmp Newsletter');

    	});	
	}

	public function callapi(){
		$news_urls = news_source::get();
		
		$ch = curl_init();

		foreach ($news_urls as $data) {
			if($data->site=='newsapi.org'){
				curl_setopt($ch, CURLOPT_URL, $data->link);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 120);
				$authToken = curl_exec($ch);
				$return_data = json_decode($authToken);
				if($return_data->status=='ok'){
					//store news data in our DB
					$source = $return_data->source;
					foreach ($return_data->articles as $data_news) {
						$data_insert['title'] = $data_news->title;
						$data_insert['image_link'] = $data_news->urlToImage;
						$data_insert['url'] = $data_news->url;
						$data_insert['description'] = $data_news->description;
						$data_insert['author'] = $data_news->author;
						$data_insert['source'] = $source;

						content_news::insert($data_insert);
					}
				}
			}
		}
	}
}