<?php

namespace App\Http\Controllers\Api\Stock;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\Stock\InterfaceProductService;
use Illuminate\Http\Request;
use Symfony\Component\Uid\UuidV4;

/**
 * @OA\Tag(
 *   name="Product"
 * )
 */
class ProductController extends Controller
{
    private InterfaceProductService $service;

    public function __construct(InterfaceProductService $service) {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/product/getAll",
     *      tags={"Product"},
     *      summary="Listar produtos",
     *      description="Retorna uma lista de produtos",
     *      @OA\Response(
     *          response=200,
     *          description="Solicitação efetuada com sucesso"
     *       )
     *     )
     *
     * Retorna uma lista de produtos
     */
    public function getAll()
    {
        $products = $this->service->getAll();

        return response()->json($products);
    }

    /**
     * @OA\Get(
     *      path="/api/product/get/{id}",
     *      tags={"Product"},
     *      summary="Listar produto por Id",
     *      description="Retorna o objeto do produto",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id do Produto",
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
     * Retorna o objeto do produto
     */
    public function get(UuidV4 $id)
    {
        $product = $this->service->get($id);

        return response()->json($product);
    }

    /**
     * @OA\Post(
     *     path="/api/product/create",
     *     tags={"Product"},
     *     summary="Adicionar produto",
     *     description="Cria um novo registro de produto",
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
     *                 example={"id": 1, "name": "Test Product", "document": "123.456.789-00"}
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
     * Grava o objeto do produto
     */
    public function create(Request $request)
    {
        $obj = $request->all();

        $this->service->create($obj);

        return response()->json("Produto inserido com sucesso!");
    }

        /**
     * @OA\Put(
     *     path="/api/product/update",
     *     tags={"Product"},
     *     summary="Atualizar produto",
     *     description="Atualiza um registro de produto",
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
     *                 example={"id": 1, "name": "Test Product", "document": "123.456.789-00"}
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
     * Atualiza o objeto do produto
     */
    public function update(Request $request)
    {
        $obj = $request->all();

        $this->service->update($obj);

        return response()->json("Produto inserido com sucesso!");
    }

    /**
     * @OA\Delete(
     *      path="/api/product/delete/{id}",
     *      tags={"Product"},
     *      summary="Remover produto por Id",
     *      description="Remove o produto",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id do Produto",
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
     * Remove o objeto do produto
     */
    public function delete(UuidV4 $id)
    {
        $this->service->delete($id);

        return response()->json("Produto removido com sucesso!");
    }
}
