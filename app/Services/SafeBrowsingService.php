<?php

namespace App\Services;

use Yandex\SafeBrowsing\SafeBrowsingClient;

class SafeBrowsingService
{

    /**
     * @param string $url
     * @return array|null
     * @throws
     */
    public function searchUrl(string $url): ?array
    {
        $data = $this->ya()->searchUrl($url);

        if ($data) {
            return $data;
        }

        return null;
    }

    /**
     * безопасный сайт phishing или malware- тип найденной угрозы
     *
     * @param string $url
     * @return string|null
     */
    public function lookup(string $url): ?string
    {
        $data = $this->ya()->lookup($url);

        if ($data) {
            return $data;
        }

        return null;
    }

    /**
     * @param string $url
     * @return bool
     */
    public function adults(string $url): bool
    {
        return $this->ya()->checkAdult($url);
    }

    /**
     * @return SafeBrowsingClient
     */
    protected function ya(): SafeBrowsingClient
    {
        static $self;
        if (!$self) {
            $self = new SafeBrowsingClient(
                config('providers.yandexSafeBrowsing.key')
            );
        }
        return $self;
    }

}
