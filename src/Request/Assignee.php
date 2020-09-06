<?php

namespace PierreBelin\EDICourtage\Request;

class Assignee extends Base
{
    public string $id;
    public string $division;
    public string $firstName;
    public string $lastName;
    public string $phone;
    public string $email;
    public bool $presential = false;
}