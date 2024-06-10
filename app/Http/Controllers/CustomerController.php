<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Services\CustomerService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    public function __construct(protected CustomerService $customerService){}

    /**
     * @OA\Post(
     *     tags={"customer"},
     *     summary="Store",
     *     description="Create a new customer at the local database and asaas database integration",
     *     path="/",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="cpfCnpj", type="string", example="42.173.898/0001-40"),
     *             @OA\Property(property="email", type="string", example="john.doe@example.com"),
     *             @OA\Property(property="phone", type="string", example="1234567890"),
     *             @OA\Property(property="mobilePhone", type="string", example="0987654321"),
     *             @OA\Property(property="address", type="string", example="123 Main St"),
     *             @OA\Property(property="addressNumber", type="string", example="456"),
     *             @OA\Property(property="complement", type="string", example="Apt 789"),
     *             @OA\Property(property="province", type="string", example="Lorem ipsum"),
     *             @OA\Property(property="postalCode", type="string", example="12345-678"),
     *             @OA\Property(property="notificationDisabled", type="boolean", example=false),
     *             @OA\Property(property="additionalEmails", type="string", example="jane.doe@example.com,jack.doe@example.com"),
     *             @OA\Property(property="municipalInscription", type="string", example="123456789"),
     *             @OA\Property(property="stateInscription", type="string", example="987654321"),
     *             @OA\Property(property="observations", type="string", example="Nenhuma observação"),
     *             @OA\Property(property="groupName", type="string", example="Clientes VIP"),
     *             @OA\Property(property="company", type="string", example="Example Company")
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="Accept",
     *         in="header",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             default="application/json"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="Content-Type",
     *         in="header",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             default="application/json"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="nome", type="string", example="John Doe"),
     *                 @OA\Property(property="cpfCnpj", type="string", example="68.324.482/0001-79"),
     *                 @OA\Property(property="email", type="string", example="john.doe@example.com"),
     *                 @OA\Property(property="telefone", type="string", example="1234567890"),
     *                 @OA\Property(property="celular", type="string", example="0987654321"),
     *                 @OA\Property(property="endereco", type="string", example="123 Main St"),
     *                 @OA\Property(property="numero", type="string", example="456"),
     *                 @OA\Property(property="complemento", type="string", example="Apt 789"),
     *                 @OA\Property(property="bairro", type="string", example="Lorem ipsum"),
     *                 @OA\Property(property="cep", type="string", example="12345-678"),
     *                 @OA\Property(property="notificacaoDesativada", type="boolean", example=false),
     *                 @OA\Property(property="emailsAdicionais", type="string", example="jane.doe@example.com,jack.doe@example.com"),
     *                 @OA\Property(property="inscricaoMunicipal", type="string", example="123456789"),
     *                 @OA\Property(property="inscricaoEstadual", type="string", example="987654321"),
     *                 @OA\Property(property="observacoes", type="string", example="Nenhuma observação"),
     *                 @OA\Property(property="nomeGrupo", type="string", example="Clientes VIP"),
     *                 @OA\Property(property="empresa", type="string", example="Example Company"),
     *                 @OA\Property(property="id", type="string", example="6559e3fe-f49e-4a67-91bd-a5e95b386ae9")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="O cpf cnpj informado já foi cadastrado na nossa base e não pode ser duplicado (and 1 more error)"),
     *             @OA\Property(property="errors", type="object",
     *                 @OA\Property(property="cpfCnpj", type="array",
     *                     @OA\Items(type="string", example="O cpf cnpj informado já foi cadastrado na nossa base e não pode ser duplicado")
     *                 ),
     *                 @OA\Property(property="email", type="array",
     *                     @OA\Items(type="string", example="O campo email é obrigatório.")
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function store(StoreCustomerRequest $request){
        try{
            return new CustomerResource($this->customerService->store($request->validated()));
        }catch(Exception $e)
        {
            Log::info("fatal error: " . $e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function index(Request $request){
        try{
            return CustomerResource::collection($this->customerService->index($request->query()));
        }catch(Exception $e)
        {
            Log::info("fatal error: " . $e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
