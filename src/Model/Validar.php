<?php
/**
 * Created by PhpStorm.
 * User: DanielSilva
 * Date: 16/04/18
 * Time: 20:55
 */

namespace App\Model;


class Validar
{
    public function request(string $auth): void
    {
        $ch = curl_init("http://metrics.auth.validate/");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(["auth" => $auth]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        $resposta = json_decode(curl_exec($ch), true);

        curl_close($ch);

        if (array_key_exists("validate", $resposta['result'])) {
            if (!$resposta['result']['validate']) {
                throw new \Exception("Usuário não autenticado", -502);
            }
        } else {
            if ($resposta['result']['error'] == -503) {
                throw new \Exception($resposta['result']['message'], (int) $resposta['result']['error']);
            }
        }
    }
}