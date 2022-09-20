<?php

namespace Api\Models;

class Asaas
{

    /**
     * Método responsavel por cadastrar um novo cliente no Asaas
     *
     * @param [string] $name
     * @param [string] $cpf_cnpj
     * @param [string] $email
     * @return json
     */
    public function createClient($name, $cpf_cnpj, $email, $phone){

        try {
            
            $data = array(
                "name"              => $name,
                "email"             => $email,
                "cpfCnpj"           => $cpf_cnpj,
                "mobilePhone"       => $phone
            );
    
            $data = json_encode($data);
    
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => HOST.'/api/v3/customers',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'access_token: '.APIKEY
            ),
            ));
    
            $response = curl_exec($curl);
    
            curl_close($curl);
            return $response;

        } catch (\Exception $e) {
           
            $json["status"] = false;
            return json_encode($json);

        }

    }

    /**
     * Metodo responsavel por listar todos os clientes cadastrados
     *
     * @return json
     */
    public function listClients(){
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => HOST.'/api/v3/customers',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'access_token: '.APIKEY
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }


    /**
     * Metodo responsavel por listar o cliente de acordo com o id informado
     *
     * @param [type] $idClient
     * @return void
     */
    public function listClientId($idClient){

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => HOST.'/api/v3/customers/'.$idClient,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'access_token: '.APIKEY
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    
        
    }

    /**
     * Metodo responsavel para editar os dados do cliente
     *
     * @param [strind] $idClient
     * @param [array] $array
     * @return json
     */
    public function editClient($idClient, $array){
        
        try {
            
            $data = $array;

            $data = json_encode($data);

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => HOST.'/api/v3/customers/'.$idClient,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'access_token: '.APIKEY
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return $response;

        } catch (\Exception $e) {
           
            $json["status"] = false;
            return json_encode($json);

        }

    }


    /**
     * Metodo responsavel por deletar um cliente dentro da plataforma do Asaas
     *
     * @param [string] $idClient
     * @return json
     */
    public function deleteClient($idClient){

       try {
        
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => HOST.'/api/v3/customers/'.$idClient,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'access_token: '.APIKEY
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return $response;

        } catch (\Exception $e) {
           
            $json["status"] = false;
            return json_encode($json);

        }
    
        
    }

    /**
     * Metodo responsavel por criar cobrança
     *
     * @param [string] $idClient
     * @param [string] $billingType (Tipos: BOLETO, CREDIT_CARD, PIX, UNDEFINED)
     * @param [date] $dueDate
     * @param [number] $value
     * @return void
     */
    public function createPayments($idClient, $billingType, $dueDate, $value){

        $curl = curl_init();

        $data = array(
            "customer"      => $idClient,
            "billingType"   => $billingType,
            "dueDate"       => $dueDate,
            "value"         => $value,
        );

        $data = json_encode($data);

        curl_setopt_array($curl, array(
        CURLOPT_URL => HOST.'/api/v3/payments',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'access_token: '.APIKEY
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }


    /**
     * Metodo resposavel em criar uma cobrança com split de pagamentos
     *
     * @param [string] $idClient
     * @param [string] $billingType
     * @param [date] $dueDate
     * @param [number] $value
     * @param [string] $description
     * @param [string] $externalReference
     * @param [array] $array
     * @return json
     */
    public function creatPaymentSplit($idClient, $billingType, $dueDate, $value, $description, $externalReference, $array){

       try {
        
            $curl = curl_init();

            $data = array(
                "customer"          => $idClient,
                "billingType"       => $billingType,
                "dueDate"           => $dueDate,
                "value"             => $value,
                "description"       => $description,
                "externalReference" => $externalReference,
                "split" => array($array)
            );

            curl_setopt_array($curl, array(
            CURLOPT_URL => HOST.'/api/v3/payments',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
        
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'access_token: '.APIKEY
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return $response;
        

        } catch (\Exception $e) {
            
            $json["status"] = false;
            return json_encode($json);

        }

    }


    /**
     * Metodo que lista as cobranças criadas
     *
     * @param [string] $params
     * @return json
     */
    public function listPayments($params){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => HOST.'/api/v3/payments?'.$params,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'access_token: '.APIKEY
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }


    /**
     * Metodo responsavel em trazer os dados da cobrança de acordo com o id da cobrança
     *
     * @param [string] $idPayment
     * @return void
     */
    public function listPaymentId($idPayment){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => HOST.'/api/v3/payments/'.$idPayment,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'access_token: '.APIKEY
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }


    /**
     * Metodo para deletar uma cobrança
     *
     * @param [string] $idPayment
     * @return json
     */
    public function deletePayment($idPayment){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => HOST.'/api/v3/payments/'.$idPayment,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'access_token: '.APIKEY
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }


    /**
     * Metodo responsavel em criar uma assinatura
     *
     * @param [string] $idClient
     * @param [string] $billingType
     * @param [date] $nextDueDate
     * @param [number] $value
     * @param [string] $cycle
     * @param [string] $description
     * @return json
     */
    public function createSignature($idClient, $billingType, $nextDueDate, $value, $cycle, $description){

        try {

            $curl = curl_init();

            $data = array(
                "customer"      => $idClient,
                "billingType"   => $billingType,
                "nextDueDate"   => $nextDueDate,
                "value"         => $value,
                "cycle"         => $cycle,
                "description"   => $description,
            );

            $data = json_encode($data);

            curl_setopt_array($curl, array(
            CURLOPT_URL => HOST.'/api/v3/subscriptions',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'access_token: '.APIKEY
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return $response;

        } catch (\Exception $e) {
            
            $json["status"] = false;
            return json_encode($json);

        }
    }


    /**
     * Metodo para listar as assinaturas
     *
     * @param [string] $params
     * @return json
     */
    public function listSignature($params){

        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => HOST.'/api/v3/subscriptions?'.$params,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'access_token: '.APIKEY
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return $response;

        } catch (\Exception $e) {
            
            $json["status"] = false;
            return json_encode($json);

        }


    }


    /**
     * Metodo responsavel em listar as cobranças de uma assinatura
     *
     * @param [string] $idSignature
     * @return json
     */
    public function listSignaturePayments($idSignature){

        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => HOST.'/api/v3/subscriptions/'.$idSignature.'/payments',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'access_token: '.APIKEY
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return $response;

        } catch (\Exception $e) {
            
            $json["status"] = false;
            return json_encode($json);

        }


    }

    /**
     * Metodo que deleta uma assinatura
     *
     * @param [string] $idSignature
     * @return json
     */
    public function deleteSignature($idSignature){

        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => HOST.'/api/v3/subscriptions/'.$idSignature,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'access_token: '.APIKEY
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return $response;

        } catch (\Exception $e) {
            
            $json["status"] = false;
            return json_encode($json);

        }


    }























    
}