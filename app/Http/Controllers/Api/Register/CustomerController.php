<?php

namespace App\Http\Controllers\Api\Register;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\Register\InterfaceCustomerService;
use Illuminate\Http\Request;
use Symfony\Component\Uid\UuidV4;

/**
 * @OA\Tag(
 *   name="Customer"
 * )
 */
class CustomerController extends Controller
{
    private InterfaceCustomerService $service;

    public function __construct(InterfaceCustomerService $service) {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/customer/getAll",
     *      tags={"Customer"},
     *      summary="Listar clientes",
     *      description="Retorna uma lista de clientes",
     *      @OA\Response(
     *          response=200,
     *          description="Solicitação efetuada com sucesso"
     *       )
     *     )
     *
     * Retorna uma lista de clientes
     */
    public function getAll()
    {
        $customers = $this->service->getAll();

        return response()->json($customers);
    }

    /**
     * @OA\Get(
     *      path="/api/customer/get/{id}",
     *      tags={"Customer"},
     *      summary="Listar cliente por Id",
     *      description="Retorna o objeto do cliente",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id do Cliente",
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
     * Retorna o objeto do cliente
     */
    public function get(UuidV4 $id)
    {
        $customer = $this->service->get($id);

        return response()->json($customer);
    }

    /**
     * @OA\Post(
     *     path="/api/customer/create",
     *     tags={"Customer"},
     *     summary="Adicionar cliente",
     *     description="Cria um novo registro de cliente",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="id",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="document",
     *                     type="string"
     *                 ),
     *                 example={"id": 1, "name": "Test Customer", "document": "123.456.789-00"}
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
     * Grava o objeto do cliente
     */
    public function create(Request $request)
    {
        $obj = $request->all();

        $this->service->create($obj);

        return response()->json("Cliente inserido com sucesso!");
    }

        /**
     * @OA\Put(
     *     path="/api/customer/update",
     *     tags={"Customer"},
     *     summary="Atualizar cliente",
     *     description="Atualiza um registro de cliente",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="id",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="document",
     *                     type="string"
     *                 ),
     *                 example={"id": 1, "name": "Test Customer", "document": "123.456.789-00"}
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
     * Atualiza o objeto do cliente
     */
    public function update(Request $request)
    {
        $obj = $request->all();

        $this->service->update($obj);

        return response()->json("Cliente inserido com sucesso!");
    }

    /**
     * @OA\Delete(
     *      path="/api/customer/delete/{id}",
     *      tags={"Customer"},
     *      summary="Remover cliente por Id",
     *      description="Remove o cliente",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id do Cliente",
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
     *     )
     *
     * Remove o objeto do cliente
     */
    public function delete(UuidV4 $id)
    {
        $this->service->delete($id);

        return response()->json("Usuário removido com sucesso!");
    }
}
