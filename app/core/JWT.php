<?php 

class JWT{

    private static $secret = "my_secret_key";

    public static function generate($payload){

        $header = base64_encode(json_encode(['alg' => 'H5256', 'typ' => 'JWT']));
        $payload = base64_encode(json_encode($payload));

        $signature = hash_hmac('sha256', "$header.$payload", self::$secret);

        return "$header.$payload.$signature";
    }

    public static function verify($token){

        $parts = explode('.', $token);

        if(count($parts) !== 3) return false;

        [$header, $payload, $signature] = $parts;

        $validSignature = hash_hmac('sha256', "$header.$payload", self::$secret);

        if($signature !== $validSignature) return false;

        return json_decode(base64_decode($payload), true);
    }
}

?>