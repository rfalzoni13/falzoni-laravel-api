<?php

namespace App\Http\Controllers\Api\Configuration;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\Configuration\InterfaceUserService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\Uid\UuidV4;

/**
 * @OA\Tag(
 *   name="User"
 * )
 */
class UserController extends Controller
{
    private InterfaceUserService $service;

    public function __construct(InterfaceUserService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/user/getAll",
     *      tags={"User"},
     *      summary="Obter lista de usuários",
     *      description="Retorna uma lista de usuários",
     *      @OA\Response(
     *          response=200,
     *          description="Solicitação efetuada com sucesso"
     *       )
     *     )
     *
     * Retorna uma lista de usuários
     */
    public function getAll()
    {
        $users = $this->service->getAll();

        return response()->json($users);
    }

    /**
     * @OA\Get(
     *      path="/api/user/get/{id}",
     *      tags={"User"},
     *      summary="Obter usuario por Id",
     *      description="Retorna o objeto do usuario",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id do Usuário",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Solicitação efetuada com sucesso"
     *       )
     *     )
     *
     * Retorna o objeto do usuario
     */
    public function get(UuidV4 $id)
    {
        $user = $this->service->get($id);

        return response()->json($user);
    }

    /**
     * @OA\Post(
     *     path="/api/user/create",
     *     tags={"User", },
     *     summary="Adicionar usuário",
     *     description="Cria um novo registro de usuário",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="id",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="full_name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="user_name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="phone_number",
     *                     type="string"
     *                 ),
     *                 example={"id": 1, "full_name": "Test User", "user_name": "testuser", "email": "testuser@test.com.br", "password": "abc123", "phone_number": "(11) 92222-2222"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     * 
     * Grava o objeto do usuário
     */
    public function create(Request $request)
    {
        $obj = $request->all();

        $this->service->create($obj);

        return response()->json("Usuário inserido com sucesso!");
    }

    /**
     * @OA\Post(
     *     path="/api/user/login",
     *     tags={"User"},
     *     summary="Login",
     *     description="Autentica o usuário e retorna o bearer token",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 example={"email": "testuser@test.com.br", "password": "abc123"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     )
     * )
     * 
     * Retorna o bearer token do usuário
     */
    public function login(Request $request)
    {
        try {
            $token = $this->service->login($request);
            return response()->json(['token' => $token]);
        } catch (Exception $ex) {
            return response()->json(['error' => $ex->getMessage(), 'stackStrace' => $ex->getTrace()]);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/user/update/{id}",
     *     tags={"User"},
     *     summary="Atualizar usuário",
     *     description="Atualiza um registro de usuário",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="id",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="full_name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="user_name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="phone_number",
     *                     type="string"
     *                 ),
     *                 example={"id": 1, "full_name": "Test User", "user_name": "testuser", "email": "testuser@test.com.br", "password": "abc123", "phone_number": "(11) 92222-2222"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     )
     * )
     * 
     * Atualiza o objeto do usuário
     */
    public function update(Request $request)
    {
        $obj = $request->all();

        $this->service->update($obj);

        return response()->json("Usuário atualizado com sucesso!");
    }

    /**
     * @OA\Delete(
     *      path="/api/user/delete/{id}",
     *      tags={"User"},
     *      summary="Remover usuário por Id",
     *      description="Remove o usuário",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id do Usuário",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Ok"
     *       )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     )
     *
     * Remove o objeto do usuario
     */
    public function delete(UuidV4 $id)
    {
        $this->service->delete($id);

        return response()->json("Usuário removido com sucesso!");
    }
}
