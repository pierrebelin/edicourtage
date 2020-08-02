<?php

namespace PierreBelin\EDICourtage\Request;

class Actor extends Base
{
    public string $id;
    public array $assignees;

    public function addAssignee(Assignee $assignee) 
    {
        $this->assignees[] = $assignee;
        return $this;
    }
}