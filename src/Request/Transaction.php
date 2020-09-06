<?php

namespace PierreBelin\EDICourtage\Request;


abstract class ActorType
{
    const COURTIER = 'courtier';
    const CLIENT = 'client';
}

abstract class DocumentType
{
    const LIASSE_COURTIER = 'liasse-courtier';
}

class Transaction extends Base
{
    public $title;
    public $contractNumber;
    public $baseTemplateRef;
    public $transactions;
    public $actors;

    public function addDocuments(Array $documents, string $type) 
    {
        $this->transactions[] = [ 
            'id' => $type, 
            'documents' => $documents
        ];
        return $this;
    }

    public function addAssigne(Assignee $assignee, string $type) 
    {
        $this->actors[] = [ 
            'id' => $type, 
            'assignee' => $assignee
        ];
        return $this;
    }

    public function getTransactionContent() {
        return [
            'params' => [
                'template'=> [
                    'title' => $this->title,
                    'contractNumber' => $this->contractNumber,
                    'actors' => $this->actors,
                    'transactions' => $this->transactions
                ],
                'baseTemplateRef' => $this->baseTemplateRef
            ]
        ];
    }
}