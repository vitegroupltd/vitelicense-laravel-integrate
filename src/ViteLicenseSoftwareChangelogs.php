<?php

namespace ViteGroup\ViteLicense;

use GuzzleHttp\Exception\GuzzleException;

class ViteLicenseSoftwareChangelogs
{
    private ViteLicenseSDK $sdk;

    public function __construct(string $api_key='')
    {
        $this->sdk = new ViteLicenseSDK($api_key);
    }

    /**
     * @throws GuzzleException
     */
    public function list(int $software_id, string $code): array
    {
        $param = [
            'software_id' => $software_id,
            'code' => $code
        ];
        return $this->sdk->post($this->sdk->url['software_changelogs']['list'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function create(int $software_id, string $code, string $content): array
    {
        $param = [
            'software_id' => $software_id,
            'code' => $code,
            'content' => $content
        ];
        return $this->sdk->post($this->sdk->url['software_changelogs']['create'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function update(int $software_id, string $code, string $content, string $new_content): array
    {
        $param = [
            'software_id' => $software_id,
            'code' => $code,
            'content' => $content,
            'new_content' => $new_content
        ];
        return $this->sdk->post($this->sdk->url['software_changelogs']['update'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function delete(int $software_id, string $code, string $content): array
    {
        $param = [
            'software_id' => $software_id,
            'code' => $code,
            'content' => $content
        ];
        return $this->sdk->post($this->sdk->url['software_changelogs']['update'], $param);
    }
}
