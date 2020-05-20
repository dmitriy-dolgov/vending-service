<?php

namespace lib;

class Api
{
    const API_URL = 'http://178.57.218.210:4001/';

    // для пароля test/test1
    const API_KEY = 'TS3qVh70xrM59VC9OxqK3UZV';


    public function command(string $method, string $path, array $query = [])
    {
        switch ($method) {
            case 'get':
            {
                $result = $this->cmdGet($path, $query);
                break;
            }
            case 'post':
            {
                break;
            }
            default:
            {
                throw new \Exception('Wrong method: ' . $method);
            }
        }

        return $result;
    }

    protected function cmdGet(string $path, array $query = [])
    {
        $result = false;

        $url = self::API_URL . $path;

        if ($query) {
            $url .= '?' . http_build_query($query);
        }

        if ($resultRaw = file_get_contents($url)) {
            $result = json_decode($resultRaw, true);
        }

        return $result;
    }
}
