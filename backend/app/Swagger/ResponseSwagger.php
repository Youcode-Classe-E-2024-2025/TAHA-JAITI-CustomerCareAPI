<?php

namespace App\Swagger;

/**
 * @OA\Post(
 *     path="/api/reply/{id}",
 *     summary="Reply to a specific resource",
 *     tags={"Replies"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="The ID of the resource to reply to",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"response"},
 *             @OA\Property(property="response", type="string", example="This is my reply")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Reply created successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="data", type="null", example=null),
 *             @OA\Property(property="message", type="string", example="Replied!")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Failed to create reply",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Failed to create reply")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Unauthenticated")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="The given data was invalid"),
 *             @OA\Property(property="errors", type="object",
 *                 @OA\Property(property="response", type="array",
 *                     @OA\Items(type="string", example="The response field is required.")
 *                 )
 *             )
 *         )
 *     )
 * )
 */
class ResponseSwagger
{
}