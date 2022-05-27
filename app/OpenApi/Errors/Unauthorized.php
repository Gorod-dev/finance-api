<?php

namespace App\OpenApi\Errors;

/**
 * @OA\Schema(
 *     title="Unauthorized",
 *     description="Unauthorized error",
 *     type="object"
 * )
 */
abstract class Unauthorized
{
    /**
     * @OA\Property(
     *  description="Response status",
     *  property="status",
     *  type="string",
     *  example="error",
     * )
     */
    private string $status;


    /**
     * @OA\Property(
     *  description="Response message",
     *  property="message",
     *  type="string",
     *  example="Unauthorized",
     * )
     */
    private string $message;

}
