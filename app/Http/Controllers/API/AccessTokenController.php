<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

class AccessTokenController extends Controller
{
    public function generate_token()
    {
        // Substitute your Twilio Account SID and API Key details
        $accountSid = env('AC05799525605fb1d683dcb087d6417ca8');
        $apiKeySid = env('SK1911c708c470e418471db51d7b16bb0f');
        $apiKeySecret = env('ZjGUo68eScViZ2HM3SimVSwuFXrEjoO4');

        $identity = uniqid();

        // Create an Access Token
        $token = new AccessToken(
            $accountSid,
            $apiKeySid,
            $apiKeySecret,
            3600,
            $identity


        );

        // Grant access to Video
        $grant = new VideoGrant();
        $grant->setRoom('cool room');
        $token->addGrant($grant);

        // Serialize the token as a JWT
        echo $token->toJWT();
    }
}
