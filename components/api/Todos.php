<?php
/**
 * Created by PhpStorm.
 * User: svilborg
 * Date: 06.02.18
 * Time: 17:16
 */
namespace app\components\api;

use GuzzleHttp\Client;

class Todos
{

    /**
     *
     * @var Client
     */
    protected $client = null;

    /**
     *
     * @param Client $client
     */
    public function __construct(Client $client = null)
    {
        $this->client = $client ?? new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com/'
        ]);
    }

    public function getAll($page = 1, $limit = 10)
    {
        $query = http_build_query([
            "_page" => $page,
            "_limit" => $limit
        ]);
        $response = $this->client->get('todos/?' . $query);

        return json_decode($response->getBody(), true);
    }
}