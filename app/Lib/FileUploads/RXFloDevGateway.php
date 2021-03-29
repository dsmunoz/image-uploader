<?php

namespace App\Lib\FileUploads;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Storage;
use Psr\Http\Message\ResponseInterface;

class RXFloDevGateway
{

    /**
     * @var string $url
     */
    private $url;
    /**
     * @var Client $client
     */
    private $client;

    public function __construct()
    {
        $this->url = config('services.rxflodev.host');
        $this->client = new Client(
            [
                'base_uri' => $this->url,
            ]
        );
    }
    /**
     * @param string $filePath
     * @return mixed
     */
    public function uploadFile(string $filePath)
    {
        \Log::info($filePath);
        //$enconded = 'data:image/png;base64,' . base64_encode(file_get_contents($filePath));
        //\Log::info($enconded);
        return $this->client->request('POST', 'https://test.rxflodev.com/uploads/index.php', [
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => fopen($filePath, 'r'),
                    'filename'=>'test.png'
                ]
            ]
        ])->getBody()->getContents();
    }
}
