<?php

namespace App\OpenApi;

/**
 * @OA\Info(
 *      version="1",
 *      title="OpenApi finance-backend",
 *      description="This is the documentation of the api methods of the finance-backend project",
 *      @OA\Contact(
 *          email="bakkoc@yandex.ru"
 *      ),
 * )
 *
 * @OA\Server (
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Server"
 * )
 *
 *  @OA\SecurityScheme(
 *   securityScheme="bearerAuth",
 *   type="http",
 *   scheme="bearer"
 * )
 */
abstract class App
{

}
