<?php
// app/Services/GeocodingService.php
namespace App\Services;

use GuzzleHttp\Client;

class GeocodingService
{
    protected $client;
    protected $apiKey;
    protected $baseUrl = 'https://maps.googleapis.com/maps/api/geocode/json';
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->apiKey = config('services.google_maps.api_key'); // Thay thế bằng khóa API của bạn
    }

    public function getCoordinates($address)
    {
        $response = $this->client->get($this->baseUrl, [
            'query' => [
                'address' => $address,
                'key' => $this->apiKey,
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        if (isset($data['results'][0]['geometry']['location'])) {
            return $data['results'][0]['geometry']['location'];
        }

        return null;
    }
}