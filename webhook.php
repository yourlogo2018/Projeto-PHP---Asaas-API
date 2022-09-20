<?php 

/**
 * Recebemos o json do asaas e guardamos na variavel $data
 */
$data = file_get_contents("php://input");

/**
 * Transformamos esse json em um array para que possamos pegar os campos necessários
 */
$array = json_decode($data, true);

echo '
Evento: '.$array["event"].'
Id: '.$array["id"].'
Data: '.date("d/m/Y", strtotime($array["dateCreated"])).'
Id Cliente: '.$array["customer"].'
';

//Exemplo do json que é enviado pelo asaas para o webhook
//  {
//     "event": "CONFIRMED",
//     "payment": {
//         "object": "payment",
//         "id": "pay_2367404151696236",
//         "dateCreated": "2022-02-28",
//         "customer": "cus_000029750325",
//         "paymentLink": null,
//         "value": 99.9,
//         "netValue": 97.91,
//         "grossValue": null,
//         "originalValue": null,
//         "interestValue": 0,
//         "description": "Assinatura - 15404",
//         "billingType": "PIX",
//         "confirmedDate": "2022-02-28",
//         "status": "RECEIVED",
//         "dueDate": "2022-03-01",
//         "originalDueDate": "2022-03-01",
//         "paymentDate": "2022-02-28",
//         "clientPaymentDate": "2022-02-28",
//         "invoiceUrl": "",
//         "invoiceNumber": "849402-2",
//         "externalReference": "15404",
//         "deleted": false,
//         "anticipated": false,
//         "creditDate": "2022-02-28",
//         "estimatedCreditDate": null,
//         "transactionReceiptUrl": "",
//         "nossoNumero": null,
//         "bankSlipUrl": null,
//         "lastInvoiceViewedDate": "2022-03-01T00:34:00Z",
//         "lastBankSlipViewedDate": null,
//         "discount": {
//             "value": 0,
//             "limitDate": null,
//             "dueDateLimitDays": 0,
//             "type": "FIXED"
//         },
//         "fine": {
//             "value": 0,
//             "type": "FIXED"
//         },
//         "interest": {
//             "value": 0,
//             "type": "PERCENTAGE"
//         },
//         "postalService": false
//     }
// }
 