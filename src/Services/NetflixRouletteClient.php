<?php declare(strict_types = 1);

namespace RandomFlix\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

class NetflixRouletteClient
{
    private $client = null;

    const API_URL = "https://community-netflix-roulette.p.mashape.com/api.php";

    public function __construct()
    {

        $this->client = new Client();

    }

    public function get_random_movie()
    {
        try
        {
            $url = self::API_URL;
            $header = array(
                "X-Mashape-Key"=> "D03BzG6JmfmshTJSyEdu94Nnmu0Jp1qlpAnjsnjVgmYl8svN2c",
                "Accept" => "application/json");
            $response = $this->client->get($url, array('headers' => $header));
            $result = $response->getBody()->getContents();

            return $result;
        }
        catch (RequestException $e) {

            return $e->getMessage();
        }

    }

}