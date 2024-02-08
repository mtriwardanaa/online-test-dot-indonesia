<?php

namespace App\Http\Controllers\Api;

use Laravel\Passport\Http\Controllers\AccessTokenController as PassportAccessTokenController;
use Psr\Http\Message\ServerRequestInterface;

class TokenApi extends PassportAccessTokenController
{
    public function issueToken(ServerRequestInterface $serverRequestInterface)
    {
        $requestToken = $serverRequestInterface->withParsedBody(
            $serverRequestInterface->getParsedBody()
        );

        try {
            $tokenResponse = parent::issueToken($requestToken);
            $data = json_decode($tokenResponse->getContent(), true);

            return response()->json($data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return response()->json($th->getMessage(), $th->getCode() != 0 ? $th->getCode() : 400);
        }
    }
}
