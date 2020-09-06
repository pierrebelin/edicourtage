<?php

namespace PierreBelin\EDICourtage\Request;


abstract class DocumentAttachmentType
{
    const ATTACHMENT = 'attachment';
    const FILE = 'file';
}

class Document extends Base
{
    public string $key;
    public string $configKey;
    public bool $toEdit;
    public bool $toSend;
    public bool $toArchive;
    public bool $attachment;
    public string $source;
    public string $name;
    public int $size;
}