<?php
require_once 'vendor/autoload.php';

use Api\Models\Asaas;

$asaas = new Asaas();

//*******************************************************************************************************************CLIENTE */

//Novo Cliente
//echo $asaas->createClient("Fernanda Batista", "09485377010", "sitecasa@gmail.com", "61995562618");

//Lista os clientes cadastrados
//echo $asaas->listClients();

//Lista os dados do cliente pelo id informado
//echo $asaas->listClientId("cus_000004980446");

//Editar informações do cliente
// $array = array(
//     "name"              => "giovani Junior Batista",
//     "cpfCnpj"           => "640.246.170-95"
// );

// echo $asaas->editClient("cus_000004980446", $array);


//Deletar um cliente
//echo $asaas->deleteClient("cus_000004980498");

//*******************************************************************************************************************CLIENTE */

//*******************************************************************************************************************COBRANÇAS */

//Criar uma cobrança
// $payment = $asaas->createPayments("cus_000004980530", "BOLETO", "2022-09-22", 110);
// $payment = json_decode($payment, true);
// echo '
// ID da cobrança: '.$payment["id"].'
// ID Cliente: '.$payment["customer"].'
// Status: '.$payment["status"].'
// Valor: '.$payment["value"].'
// Data Vencimento: '.date("d/m/Y", strtotime($payment["dueDate"])).'
// Link Pagamento: '.$payment["invoiceUrl"].'
// Nº do pedido: '.$payment["invoiceNumber"].'
// ';


//Cria cobrança com split de pagamento
// $array = array(
//    0 => array(
//     "walletId" => WALLETID,
//     "fixedValue" => 80
//    ),
//    1 => array(
//     "walletId" => "48548710-9baa-4ec1-a11f-9010193527c6",
//     "fixedValue" => 10
//    )
// );
// $asaas->creatPaymentSplit("cus_000004980530", "BOLETO", "2022-09-22", 100, "Pagamento assinatura", "1001", $array);


//Lista as cobranças
//echo $asaas->listPayments("customer=cus_000004980530");

//Lista os dados da cobrança de acordo com o id da cobrança
//echo $asaas->listPaymentId("pay_7740442495111365");

//Deletar uma cobrança
//echo $asaas->deletePayment("pay_7740442495111365");

//*******************************************************************************************************************COBRANÇAS */

//*******************************************************************************************************************ASSINATURAS */

//Criar assinatura
//echo $asaas->createSignature("cus_000004980530", "BOLETO", "2022-10-20", 100, "MONTHLY", "Assinatura de teste");

//Listar Assinaturas
//echo $asaas->listSignature("customer=cus_000004980530");

//Lista as cobranças de uma assinatura
//echo $asaas->listSignaturePayments("sub_sVGqlsAGryZ0");

//Deleta uma assinatura
//echo $asaas->deleteSignature("sub_sVGqlsAGryZ0");

//*******************************************************************************************************************ASSINATURAS */
