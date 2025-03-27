<?php

namespace App\Swagger;

/**
 * @OA\Get(
 *     path="/api/tickets",
 *     summary="Get authenticated user's tickets",
 *     tags={"Tickets"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Tickets retrieved successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="data", type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="title", type="string", example="Issue with login"),
 *                     @OA\Property(property="description", type="string", example="Cannot login to system"),
 *                     @OA\Property(property="status", type="string", example="open")
 *                 )
 *             ),
 *             @OA\Property(property="message", type="string", example="")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Failed to fetch tickets",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Failed to fetch tickets")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Unauthenticated")
 *         )
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/tickets/free",
 *     summary="Get unassigned (free) tickets",
 *     tags={"Tickets"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Free tickets retrieved successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="data", type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="title", type="string", example="Issue with login"),
 *                     @OA\Property(property="description", type="string", example="Cannot login to system"),
 *                     @OA\Property(property="status", type="string", example="open")
 *                 )
 *             ),
 *             @OA\Property(property="message", type="string", example="")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Failed to fetch tickets",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Failed to fetch tickets")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Unauthenticated")
 *         )
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/tickets/{ticket}",
 *     summary="Get a specific ticket with responses",
 *     tags={"Tickets"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="ticket",
 *         in="path",
 *         required=true,
 *         description="The ID of the ticket",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ticket retrieved successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="data", type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="title", type="string", example="Issue with login"),
 *                     @OA\Property(property="description", type="string", example="Cannot login to system"),
 *                     @OA\Property(property="status", type="string", example="open"),
 *                     @OA\Property(property="responses", type="array",
 *                         @OA\Items(
 *                             @OA\Property(property="id", type="integer", example=1),
 *                             @OA\Property(property="response", type="string", example="Checking the issue")
 *                         )
 *                     )
 *                 )
 *             ),
 *             @OA\Property(property="message", type="string", example="")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Ticket not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Ticket not found")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Unauthenticated")
 *         )
 *     )
 * )
 *
 * @OA\Post(
 *     path="/api/tickets",
 *     summary="Create a new ticket",
 *     tags={"Tickets"},
 *     security={{"bearerAuth": {}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"title", "description"},
 *             @OA\Property(property="title", type="string", maxLength=255, example="Issue with login"),
 *             @OA\Property(property="description", type="string", example="Cannot login to system")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Ticket created successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Issue with login"),
 *                 @OA\Property(property="description", type="string", example="Cannot login to system"),
 *                 @OA\Property(property="status", type="string", example="open")
 *             ),
 *             @OA\Property(property="message", type="string", example="Ticket created successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Failed to create ticket",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Failed to create ticket")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="The given data was invalid"),
 *             @OA\Property(property="errors", type="object",
 *                 @OA\Property(property="title", type="array",
 *                     @OA\Items(type="string", example="The title field is required.")
 *                 ),
 *                 @OA\Property(property="description", type="array",
 *                     @OA\Items(type="string", example="The description field is required.")
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Unauthenticated")
 *         )
 *     )
 * )
 *
 * @OA\Post(
 *     path="/api/tickets/{id}",
 *     summary="Assign a ticket to the authenticated user",
 *     tags={"Tickets"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="The ID of the ticket to assign",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ticket assigned successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Issue with login"),
 *                 @OA\Property(property="description", type="string", example="Cannot login to system"),
 *                 @OA\Property(property="status", type="string", example="inprog")
 *             ),
 *             @OA\Property(property="message", type="string", example="Ticket assigned successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Failed to assign ticket",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Failed to assign ticket")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Unauthenticated")
 *         )
 *     )
 * )
 *
 * @OA\Delete(
 *     path="/api/tickets/{id}",
 *     summary="Delete a ticket",
 *     tags={"Tickets"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="The ID of the ticket to delete",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ticket deleted successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="data", type="null", example=null),
 *             @OA\Property(property="message", type="string", example="Ticket deleted successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Failed to delete ticket",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Failed to delete ticket")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Unauthenticated")
 *         )
 *     )
 * )
 *
 * @OA\Patch(
 *     path="/api/tickets/{id}/{status}",
 *     summary="Update ticket status",
 *     tags={"Tickets"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="The ID of the ticket to update",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="status",
 *         in="path",
 *         required=true,
 *         description="The new status of the ticket",
 *         @OA\Schema(type="string", enum={"open", "inprog", "closed"})
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ticket updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Issue with login"),
 *                 @OA\Property(property="description", type="string", example="Cannot login to system"),
 *                 @OA\Property(property="status", type="string", example="closed")
 *             ),
 *             @OA\Property(property="message", type="string", example="Ticket updated successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Failed to update ticket",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Failed to update ticket")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Unauthenticated")
 *         )
 *     )
 * )
 */
class TicketSwagger
{
}