<?php

namespace App\OpenApi\Objects;

/**
 * @OA\Schema(
 *     title="Authorisation object",
 *     description="Authorisation object",
 *     type="object"
 * )
 */
abstract class Authorisation
{
    /**
     * @OA\Property(
     *  property="token",
     *  type="string",
     *  example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS92MS9hdXRo.."
     * )
     */
    private string $token;

    /**
     * @OA\Property(
     *  property="type",
     *  type="string",
     *  example="bearer"
     * )
     */
    private string $type;
}
