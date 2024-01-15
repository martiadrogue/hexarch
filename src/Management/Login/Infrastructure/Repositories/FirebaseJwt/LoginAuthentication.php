<?php

namespace Src\Management\Login\Infrastructure\Repositories\FirebaseJwt;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Src\Management\Login\Domain\ValueObjects\LoginJwt;
use Src\Management\Login\Domain\ValueObjects\LoginAuthParameters;
use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;

final class LoginAuthentication implements LoginAuthenticationContract
{
    private JWT $jwt;
    public function __construct()
    {
        $this->jwt = new JWT();
    }

    public function auth(LoginAuthParameters $loginAuthParameters): string
    {
        return $this->jwt::encode(
            [
                $loginAuthParameters->handler(),
            ],
            $loginAuthParameters->jwtKey(),
            $loginAuthParameters->jwtEncrypt()
        );
    }

    public function check(LoginJwt $loginJwt): bool
    {

        try {
            $decode = $this->jwt::decode(
                $loginJwt->value(),
                new Key($loginJwt->jwtKey(), $loginJwt->jwtEncrypt())
            );

            if (time() > $decode->{'0'}->ext) {
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }

    public function get(LoginJwt $loginJwt): mixed
    {
        return $this->jwt::decode(
            $loginJwt->value(),
            new Key($loginJwt->jwtKey(), $loginJwt->jwtEncrypt())
        )->{'0'}->date;
    }

}
