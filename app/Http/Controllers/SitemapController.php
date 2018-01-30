<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use DateTime;

class SitemapController extends Controller
{
	public function sitemap(){
		$data = DB::table('questions')
			->select('questions.id', 'questions.audit_updated', 'questions.question_title')
			->get();

		$news_count = DB::table('content_news')
			->count();
		$news_page_count = ceil($news_count/15);
		$link = "http://www.knowamp.com/question/";

		$xml = "";

		$xml.='<?xml version="1.0" encoding="UTF-8"?>
	<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
		  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" 
		  xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">';

		foreach ($data as $d) {
			$id = $d->id;
			for($i=0; $i<5; $i++){
				$id = base64_encode($id);
			}

			$fake_url = str_replace(' ', '-', $d->question_title);
            $fake_url = preg_replace('/[^A-Za-z0-9\-]/', '', $fake_url);

			$time = new DateTime($d->audit_updated);
			$lastmod = $time->format('Y-m-d');
		$xml.="<url><loc>".$link.$id."/".$fake_url."</loc><lastmod>".$lastmod."</lastmod></url>
			";
		}
		//static urls
		$xml.="<url><loc>http://www.knowamp.com/index</loc><lastmod>".date('Y-m-d')."</lastmod></url>
		";
		$xml.="<url><loc>http://www.knowamp.com/login</loc><lastmod>2017-03-27</lastmod></url>
		";
		$xml.="<url><loc>http://www.knowamp.com/signup</loc><lastmod>2017-03-27</lastmod></url>
		";
		for($i = 1; $i <= $news_page_count; $i++){
		$xml.="<url><loc>http://www.knowamp.com/news?page=$i</loc><lastmod>".date('Y-m-d')."</lastmod></url>
			";
		}

$xml.="</urlset>
		";

		$fp = fopen('sitemapimages.xml', 'w');
		fwrite($fp, $xml);
		fclose($fp);
	}
}