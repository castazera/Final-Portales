<?php

namespace App\Services;

use App\Models\Servicio;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use WandesCardoso\MercadoPago\Facades\MercadoPago;
use WandesCardoso\MercadoPago\DTO\Item;
use WandesCardoso\MercadoPago\DTO\BackUrls;
use WandesCardoso\MercadoPago\DTO\Payer;
use WandesCardoso\MercadoPago\DTO\Preference;

class MercadoPagoService {

    public function __construct() {
        MercadoPago::setAccessToken(config('mercadopago.access_token'));
    }

    public function CreatePreference () {

    }
}



class MercadoPagoPreferenciaService
{
    /**
     * @return array{preference_id: string, checkout_url: string}
     *
     * @throws \RuntimeException
     */
    public function crear(User $user, Servicio $servicio, float $precio, string $titulo): array
    {
        $payer = new Payer($user->email);

        $item = Item::make()
            ->setTitle($titulo)
            ->setQuantity(1)
            ->setUnitPrice($precio)
            ->setDescription($servicio->descripcion ?? $servicio->nombre);

        $preference = Preference::make()
            ->setPayer($payer)
            ->addItem($item)
            ->setBackUrls(new BackUrls(
                route('pago.success'),
                route('pago.pending'),
                route('pago.failure'),
            ))
            ->setExternalReference($servicio->id . '-' . $user->id);

        $response = json_decode(
            json_encode(MercadoPago::preference()->create($preference)),
            true
        );

        $body = $response['body']['stdClass'] ?? $response['body'] ?? $response;
        $preferenceId = $body['id'] ?? $response['id'] ?? null;
        $checkoutUrl = $body['sandbox_init_point']
            ?? $body['init_point']
            ?? $response['sandbox_init_point']
            ?? $response['init_point']
            ?? null;

        Log::info('Preferencia MercadoPago creada', [
            'user_id' => $user->id,
            'servicio_id' => $servicio->id,
            'response_id' => $preferenceId,
        ]);

        if (!$preferenceId || !$checkoutUrl) {
            Log::error('Respuesta inesperada de MercadoPago', ['response' => $response]);
            throw new \RuntimeException('No se pudo crear la preferencia de pago.');
        }

        return [
            'preference_id' => $preferenceId,
            'checkout_url' => $checkoutUrl,
        ];
    }
}
