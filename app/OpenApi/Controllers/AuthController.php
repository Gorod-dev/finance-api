<?php

namespace App\OpenApi\Controllers;

/**
 * @OA\Tag(
 *     name="authentication",
 *     description=""
 * )
 */
abstract class AuthController //Todo описать ошибки при существовании почты и тд
{
    /**
     * @OA\Post(
     *  path="/authentication/login",
     *  operationId="login",
     *  tags={"authentication"},
     *  summary="Login",
     *  description="User login in",
     *  @OA\RequestBody(
     *     @OA\MediaType(
     *          mediaType="multipart/form-data",
     *          @OA\Schema(
     *              @OA\Property(
     *                  description="User email",
     *                  property="email",
     *                  type="string",
     *                  example="test@test.com",
     *              ),
     *              @OA\Property(
     *                  description="User password",
     *                  property="password",
     *                  type="string",
     *                  example="some_password",
     *              ),
     *               required={"email", "password"}
     *          )
     *      )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User login in successfully",
     *         @OA\JsonContent(
     *          @OA\Property(
     *                  description="Response status",
     *                  property="status",
     *                  type="string",
     *                  example="success",
     *              ),
     *          @OA\Property(
     *                  description="Response message",
     *                  property="message",
     *                  type="string",
     *                  example="User login in successfully",
     *              ),
     *          @OA\Property(
     *              property="user",
     *              ref="#/components/schemas/User"
     *          ),
     *          @OA\Property(
     *              property="authorisation",
     *              type="object",
     *              ref="#components/schemas/Authorisation",
     *          )
     *      ),
     * ),
     *     @OA\Response(
     *      response=401,
     *      description="Unauthorized",
     *      @OA\JsonContent(ref="#components/schemas/Unauthorized"),
     *     ),
     * )
     */
    private function login()
    {
    }

    /**
     * @OA\Post(
     *  path="/authentication/register",
     *  operationId="register",
     *  tags={"authentication"},
     *  summary="Register",
     *  description="User register",
     *  @OA\RequestBody(
     *     @OA\MediaType(
     *          mediaType="multipart/form-data",
     *          @OA\Schema(
     *              @OA\Property(
     *                  description="User name",
     *                  property="name",
     *                  type="string",
     *                  example="Иванов Иван Иванович",
     *              ),
     *              @OA\Property(
     *                  description="User email",
     *                  property="email",
     *                  type="string",
     *                  example="test@test.com",
     *              ),
     *              @OA\Property(
     *                  description="User password",
     *                  property="password",
     *                  type="string",
     *                  example="some_password",
     *              ),
     *               required={"name", "email", "password"}
     *          )
     *      )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User created successfully",
     *         @OA\JsonContent(
     *          @OA\Property(
     *                  description="Response status",
     *                  property="status",
     *                  type="string",
     *                  example="success",
     *              ),
     *          @OA\Property(
     *                  description="Response message",
     *                  property="message",
     *                  type="string",
     *                  example="User login in successfully",
     *              ),
     *          @OA\Property(
     *              property="user",
     *              ref="#/components/schemas/User"
     *          ),
     *          @OA\Property(
     *              property="authorisation",
     *              type="object",
     *              ref="#components/schemas/Authorisation",
     *          )
     *      ),
     * ),
     * )
     */
    private function register()
    {
    }

    /**
     * @OA\Post(
     *  path="/authentication/logout",
     *  operationId="logout",
     *  tags={"authentication"},
     *  summary="Logout",
     *  description="Logout user",
     *     @OA\Response(
     *         response=200,
     *         description="User logged out successfully",
     *         @OA\JsonContent(
     *          @OA\Property(
     *                  description="Response status",
     *                  property="status",
     *                  type="string",
     *                  example="success",
     *              ),
     *          @OA\Property(
     *                  description="Response message",
     *                  property="message",
     *                  type="string",
     *                  example="Successfully logged out",
     *              ),
     *      ),
     * ),
     *     @OA\Response(
     *      response=401,
     *      description="Unauthorized",
     *      @OA\JsonContent(ref="#components/schemas/Unauthorized"),
     *     ),
     * )
     */
    private function logout()
    {
    }

    /**
     * @OA\Post(
     *  path="/authentication/refresh",
     *  operationId="refresh",
     *  tags={"authentication"},
     *  summary="Refresh",
     *  description="Refresh user token",
     *     @OA\Response(
     *         response=200,
     *         description="User token refresh successfully",
     *         @OA\JsonContent(
     *          @OA\Property(
     *                  description="Response status",
     *                  property="status",
     *                  type="string",
     *                  example="success",
     *              ),
     *          @OA\Property(
     *              property="user",
     *              ref="#/components/schemas/User"
     *          ),
     *          @OA\Property(
     *              property="authorisation",
     *              type="object",
     *              ref="#components/schemas/Authorisation",
     *          )
     *      ),
     * ),
     *     @OA\Response(
     *      response=401,
     *      description="Unauthorized",
     *      @OA\JsonContent(ref="#components/schemas/Unauthorized"),
     *     ),
     * )
     */
    private function refresh()
    {
    }


    /**
     * @OA\Post(
     *  path="/authentication/me",
     *  operationId="me",
     *  tags={"authentication"},
     *  summary="Me",
     *  description="Get current user info",
     *     @OA\Response(
     *         response=200,
     *         description="User info given in response successfully",
     *         @OA\JsonContent(
     *          @OA\Property(
     *                  description="Response status",
     *                  property="status",
     *                  type="string",
     *                  example="success",
     *              ),
     *          @OA\Property(
     *              property="user",
     *              ref="#/components/schemas/User"
     *          ),
     *      ),
     * ),
     *     @OA\Response(
     *      response=401,
     *      description="Unauthorized",
     *      @OA\JsonContent(ref="#components/schemas/Unauthorized"),
     *     ),
     * )
     */
    private function me()
    {
    }

}
