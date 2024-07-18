<?php

namespace ViteGroup\ViteLicense;

use GuzzleHttp\Exception\GuzzleException;

class ViteLicenseSoftware
{
    private ViteLicenseSDK $sdk;

    public function __construct(string $api_key='')
    {
        $this->sdk = new ViteLicenseSDK($api_key);
    }

    /**
     * @throws GuzzleException
     */
    public function list(): array
    {
        return $this->sdk->post($this->sdk->url['software']['list']);
    }

    /**
     * @throws GuzzleException
     */
    public function create(string $name, string $sku, string $description='', int $status=1): array
    {
        $param = [
            'name' => $name,
            'sku' => $sku,
            'description' => $description,
            'status' => $status
        ];
        return $this->sdk->post($this->sdk->url['software']['create'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function update(int $id, string $name, string $sku, string $description='', int $status=1): array
    {
        $param = [
            'id' => $id,
            'name' => $name,
            'sku' => $sku,
            'description' => $description,
            'status' => $status
        ];
        return $this->sdk->post($this->sdk->url['software']['update'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function delete(int $id): array
    {
        $param = [
            'id' => $id
        ];
        return $this->sdk->post($this->sdk->url['software']['update'], $param);
    }
}
