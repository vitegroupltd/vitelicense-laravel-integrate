<?php

namespace ViteGroup\ViteLicense;

use GuzzleHttp\Exception\GuzzleException;

class ViteLicenseDevices
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
        return $this->sdk->post($this->sdk->url['devices']['list']);
    }

    /**
     * @throws GuzzleException
     */
    public function create(string $hash, string $name, string $ip_address='', string $description=''): array
    {
        $param = [
            'hash' => $hash,
            'name' => $name,
            'ip_address' => $ip_address,
            'description' => $description
        ];
        return $this->sdk->post($this->sdk->url['devices']['create'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function update(string $hash, string $name='', string $ip_address='', string $description=''): array
    {
        $param = [
            'hash' => $hash,
            'name' => $name,
            'ip_address' => $ip_address,
            'description' => $description
        ];
        return $this->sdk->post($this->sdk->url['devices']['update'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function unlock(string $hash): array
    {
        $param = [
            'hash' => $hash
        ];
        return $this->sdk->post($this->sdk->url['devices']['unlock'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function block(string $hash): array
    {
        $param = [
            'hash' => $hash
        ];
        return $this->sdk->post($this->sdk->url['devices']['block'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function delete(string $hash): array
    {
        $param = [
            'hash' => $hash
        ];
        return $this->sdk->post($this->sdk->url['devices']['delete'], $param);
    }
}
