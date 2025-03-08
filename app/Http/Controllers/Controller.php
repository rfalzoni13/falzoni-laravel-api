<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Api Falzoni PHP Laravel",
 *      description="Api de serviços com Laravel PHP"
 * ),
 * @OA\SecurityScheme(
 *     securityScheme="Bearer",
 *     type="apiKey",
 *     description="Token de autorização (JWT) a ser inserido",
 *     name="Authorization",
 *     in="header"
 * ),
 * @OA\OpenApi(
 *   security={
 *     {
 *       "Bearer"={},
 *     }
 *   }
 * )
 */
abstract class Controller
{
    //
}
