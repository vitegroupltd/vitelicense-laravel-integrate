<?php

namespace ViteGroup\ViteLicense;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class ViteLicenseSdk
{
    public array $url;
    private string $api_key;
    private string $server;
    private Client $client;

    public function __construct(string $api_key='')
    {
        $this->api_key = empty($api_key) ? Config::get('vitelicense.api_key') : $api_key;
        $this->server = 'https://vitelicense.io/api';
        $this->url = [
            'software' => [
                'list' => '/software/list',
                'create' => '/software/create',
                'update' => '/software/update',
                'delete' => '/software/delete'
            ],
            'software_versions' => [
                'list' => '/software/versions/list',
                'create' => '/software/versions/create',
                'update' => '/software/versions/update',
                'delete' => '/software/versions/delete'
            ],
            'software_changelogs' => [
                'list' => '/software/changelogs/list',
                'create' => '/software/changelogs/create',
                'update' => '/software/changelogs/update',
                'delete' => '/software/changelogs/delete'
            ],
            'licenses' => [
                'list' => '/licenses/list',
                'create' => '/licenses/create',
                'generate' => '/licenses/generate',
                'unlock' => '/licenses/unlock',
                'block' => '/licenses/block',
                'extend_expiry' => '/extend/expiry',
                'extend_slot' => '/extend/slot',
                'attach' => '/licenses/attach',
                'detach' => '/licenses/detach',
                'verify' => '/licenses/verify',
                'delete' => '/licenses/delete'
            ],
            'devices' => [
                'list' => '/devices/list',
                'create' => '/devices/create',
                'unlock' => '/devices/unlock',
                'block' => '/devices/block',
                'delete' => '/devices/delete'
            ]
        ];

        $this->client = new Client([
            'headers' => ['User-Agent' => 'ViteLicense (+https://vitelicense.io)', 'X-Api-Key' => $this->api_key],
            'http_errors' => false
        ]);
    }

    public function parse($data): array
    {
        try {
            if (!$data) {
                return [];
            }
            $tmp = json_decode(json_encode($data, true), true);
            if (!is_array($tmp)) {
                $tmp = json_decode($tmp, true);
            }
            return $tmp ?? ['status' => false, 'message' => 'The post param has some wrong type of values'];
        } catch (\Exception) {
            return ['status' => false, 'message' => 'The post param has some wrong type of values'];
        }
    }

    /**
     * @throws GuzzleException
     */
    public function post(string $uri, array $param=[]): array
    {
        if (!str_starts_with($uri, 'https://') && !str_starts_with($uri, 'http://')) {
            $url = $this->server . $uri;
        } else {
            $url = $uri;
        }
        $param['api_key'] = $this->api_key;
        $res = $this->client->request('POST', $url, [
            'json' => $param
        ]);
        if ($res->getStatusCode() == 200) {
            return $this->parse($res->getBody()->getContents());
        } else {
            return ['status' => false, 'message' => 'HTTP error '. $res->getStatusCode()];
        }
    }
}