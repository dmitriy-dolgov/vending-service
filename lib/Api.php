<?php

namespace lib;

use GuzzleHttp\Client;

class Api
{
    const API_URL = 'http://178.57.218.210:4001';

    // для пароля test/test1
    const API_KEY = 'TS3qVh70xrM59VC9OxqK3UZV';


    public function command(string $method, string $path, array $query = [], array $params = [])
    {
        switch ($method) {
            case 'get':
            {
                $result = $this->cmdGet($path, $query);
                break;
            }
            case 'post':
            {
                $result = $this->cmdPost($path, $query, $params);
                break;
            }
            default:
            {
                throw new \Exception('Wrong method: ' . $method);
            }
        }

        return $result;
    }

    protected function cmdPost(string $path, array $query = [], array $params = [])
    {
        $client = new Client();

        $url = self::API_URL . '/' . $path . ($query ? ('?' . http_build_query($query)) : '');
        $request = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json-patch+json'],
            'body' => json_encode($params),
        ]);

        if ($request->getStatusCode() == 200) {
            //$response = $request->getBody();
            return true;
        }

        //TODO: обработка (логирование) ошибки

        return false;
    }

    /**
     * TODO: переделать под Client()
     *
     * @param string $path
     * @param array $query
     * @return bool|mixed
     */
    protected function cmdGet(string $path, array $query = [])
    {
        $result = false;

        $url = self::API_URL . '/' . $path;

        if ($query) {
            $url .= '?' . http_build_query($query);
        }

        if ($resultRaw = file_get_contents($url)) {
            $result = json_decode($resultRaw, true);
        }

        return $result;
    }
}
