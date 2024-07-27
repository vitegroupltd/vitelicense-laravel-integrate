<?php

namespace ViteGroup\ViteLicense;

use GuzzleHttp\Exception\GuzzleException;

class ViteLicenseLicenses
{
    private ViteLicenseSdk $sdk;

    public function __construct(string $api_key='')
    {
        $this->sdk = new ViteLicenseSdk($api_key);
    }

    /**
     * @throws GuzzleException
     */
    public function list(): array
    {
        return $this->sdk->post($this->sdk->url['licenses']['list']);
    }

    /**
     * @throws GuzzleException
     */
    public function details(string $serial): array
    {
        $param = [
            'serial' => $serial
        ];
        return $this->sdk->post($this->sdk->url['licenses']['details'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function create(int $software_id, string $serial='', int $slot=1, int $duration_days=30, string $expired_at=''): array
    {
        $param = [
            'software_id' => $software_id,
            'serial' => $serial,
            'slot' => $slot,
            'duration_days' => $duration_days,
            'expired_at' => $expired_at
        ];
        return $this->sdk->post($this->sdk->url['licenses']['create'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function generate(string $serial, string $new_serial=''): array
    {
        $param = [
            'serial' => $serial,
            'new_serial' => $new_serial
        ];
        return $this->sdk->post($this->sdk->url['licenses']['generate'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function activate(string $serial): array
    {
        $param = [
            'serial' => $serial
        ];
        return $this->sdk->post($this->sdk->url['licenses']['activate'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function unlock(string $serial): array
    {
        $param = [
            'serial' => $serial
        ];
        return $this->sdk->post($this->sdk->url['licenses']['unlock'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function block(string $serial): array
    {
        $param = [
            'serial' => $serial
        ];
        return $this->sdk->post($this->sdk->url['licenses']['block'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function extend_expiry(string $serial, int $duration_days=30, string $expired_at=''): array
    {
        $param = [
            'serial' => $serial,
            'duration_days' => $duration_days,
            'expired_at' => $expired_at
        ];
        return $this->sdk->post($this->sdk->url['licenses']['extend_expiry'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function extend_slot(string $serial, int $slot=1): array
    {
        $param = [
            'serial' => $serial,
            'slot' => $slot
        ];
        return $this->sdk->post($this->sdk->url['licenses']['extend_slot'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function devices(string $serial): array
    {
        $param = [
            'serial' => $serial
        ];
        return $this->sdk->post($this->sdk->url['licenses']['devices'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function attach(string $serial, string $hash): array
    {
        $param = [
            'serial' => $serial,
            'hash' => $hash
        ];
        return $this->sdk->post($this->sdk->url['licenses']['attach'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function detach(string $serial, string $hash): array
    {
        $param = [
            'serial' => $serial,
            'hash' => $hash
        ];
        return $this->sdk->post($this->sdk->url['licenses']['detach'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function verify(string $serial, string $hash): array
    {
        $param = [
            'serial' => $serial,
            'hash' => $hash
        ];
        return $this->sdk->post($this->sdk->url['licenses']['verify'], $param);
    }

    /**
     * @throws GuzzleException
     */
    public function delete(string $serial): array
    {
        $param = [
            'serial' => $serial
        ];
        return $this->sdk->post($this->sdk->url['licenses']['delete'], $param);
    }
}
