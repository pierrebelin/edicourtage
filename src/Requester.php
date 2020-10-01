<?php

namespace PierreBelin\EDICourtage;

use UnexpectedValueException;

class Requester
{
    private $apiKey;
    private $urlBack;

    public function __construct($apiKey, $urlBack)
    {
        $this->apiKey = $apiKey;
        $this->urlBack = $urlBack;
    }

    public function createTransaction($bodyContent, string $fullPathFile)
    {
        $curl = curl_init($this->urlBack . '/dossier/_multipart?features=tasks');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'x-pes-entity-ref: NETPP',
            'x-pes-api-token: ' . $this->apiKey,
			'Content-Type: multipart/form-data'
        ]);

        $cFile = curl_file_create($fullPathFile, 'pdf', 'filename.pdf');
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            'body' => json_encode($bodyContent, true),
            'COURT_1' => $cFile
        ]);

        $resultJson = curl_exec($curl);

        var_dump($resultJson); die;
        
        curl_close($curl);
        $result = json_decode($resultJson);

        if(isset($result->reference) && isset($result->tasks[0]->reference)){
			return [
                'reference' =>  $result->reference,
                'tasks_reference' => $result->tasks[0]->reference
			];
        }

        throw new UnexpectedValueException($result);
    }
}