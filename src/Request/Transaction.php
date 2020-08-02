<?php

namespace PierreBelin\EDICourtage\Request;

class Transaction extends Base
{
    public string $id;
    public array $documents;

    public function addAssignee(Document $document) 
    {
        $this->documents[] = $document;
        return $this;
    }
}