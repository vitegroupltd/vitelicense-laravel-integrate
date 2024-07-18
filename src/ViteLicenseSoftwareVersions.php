<?php

namespace ViteGroup\ViteLicense;

use GuzzleHttp\Exception\GuzzleException;

class ViteLicenseSoftwareVersions
{
    private ViteLicenseSDK $sdk;

    public function __construct(string $api_key='')
    {
        $this->sdk = new ViteLicenseSDK($api_key);
    }

    /**
     * @throws GuzzleException
     */
    public function list(int $software_id): array
    {
        $param = [
            'software_id' => $software_id
        ];
        return $this->sdk->post($this->sdk->url['software_versions']['list'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function create(int $software_id, string $code): array
    {
        $param = [
            'software_id' => $software_id,
            'code' => $code
        ];
        return $this->sdk->post($this->sdk->url['software_versions']['create'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function update(int $software_id, string $code, string $new_code): array
    {
        $param = [
            'software_id' => $software_id,
            'code' => $code,
            'new_code' => $new_code
        ];
        return $this->sdk->post($this->sdk->url['software_versions']['update'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function delete(int $software_id, string $code): array
    {
        $param = [
            'software_id' => $software_id,
            'code' => $code
        ];
        return $this->sdk->post($this->sdk->url['software_versions']['update'], $param);
    }
}
