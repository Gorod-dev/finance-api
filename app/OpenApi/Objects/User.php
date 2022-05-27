<?php

namespace App\OpenApi\Objects;

use DateTime;

/**
 * @OA\Schema(
 *     title="User model",
 *     description="User model",
 *     type="object"
 * )
 */
abstract class User
{
    /**
     * @OA\Property(
     *   property="id",
     *   type="integer",
     *   example="1"
     * )
     */
    private int $id;

    /**
     * @OA\Property(
     *   property="name",
     *   type="string",
     *   example="Бакланов Константин Николаевич"
     * ),
     */
    private string $name;

    /**
     * @OA\Property(
     *   property="email",
     *   type="string",
     *   example="test@test.com"
     * )
     */
    private string $email;

    /**
     * @OA\Property(
     *   property="email_verified_at",
     *   type="string",
     *   format="date-time",
     *   example="2022-05-24T17:31:32.000000Z"
     * )
     */
    private DateTime $email_verified_at;

    /**
     * @OA\Property(
     *   property="created_at",
     *   type="string",
     *   nullable="true",
     *   format="date-time",
     *   example="2022-05-24T17:31:32.000000Z"
     * )
     */
    private DateTime $created_at;

    /**
     * @OA\Property(
     *   property="updated_at",
     *   type="string",
     *   format="date-time",
     *   example="2022-05-24T17:31:32.000000Z"
     * )
     */
    private DateTime $updated_at;

}
