<?php

namespace App\newsAPI;

class NewsApiService
{
    public function searchTitleDate($title, $date)
    {
          // persiapkan curl
            $ch = curl_init(); 

            // set url 
            curl_setopt($ch, CURLOPT_URL, "http://newsapi.org/v2/everything?q=". $title ."&from=". $date ."&sortBy=publishedAt&apiKey=". env('APP_NEWS_API'));

            // return the transfer as a string 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

            // $output contains the output string 
            $output = curl_exec($ch); 

            // tutup curl 
            curl_close($ch); 

            return $output;
    }

}