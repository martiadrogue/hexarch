<?php

namespace Src\Management\Login\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjets\MixedValueObjet;

final class LoginAuthParameters extends MixedValueObjet
{
    function handler(): array
    {
        return [
            'iat' => time(),
            'ext' => $this->getTime(),
            'aud' => $this->aud(),
            'date' => $this->value(),
        ];
    }

    private function getTime(): float|int
    {
        $time = time();

        return $time + (60 * 60);
    }

    private function aud(): ?string
    {
        $aud = '';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        }

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $aud = $_SERVER['REMOTE_ADDR'];
        }

        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        $aud .= gethostname();


        return sha1($aud ?? null);
    }

    public function jwtKey(): string
    {
        return env('JWT_KEY');
    }

    public function jwtEncrypt(): string
    {
        return env('JWT_ENCRYPT');
    }
}
