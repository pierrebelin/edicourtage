<?php

namespace PierreBelin\EDICourtage\Request;

class Template extends Base
{
    public string $title;
    public string $contractNumber;
    public array $actors;
    public array $transactions;

    public function addActor(Actor $actor) 
    {
        $this->actors[] = $actor;
        return $this;
    }

    public function addTransaction(Transaction $transcation) 
    {
        $this->transcations[] = $transcation;
        return $this;
    }
}