<?php

namespace Src\Management\Forgot\Domain\ValueObjects;

use stdClass;
use Src\Shared\Domain\ValueObjets\StringValueObjet;

final class ForgotMailable extends StringValueObjet
{
    private stdClass $mailObject;

    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->mailObject = new stdClass();
        $this->setFrom();
        $this->setSubject();
        $this->setMarkdown();
    }

    public function getObject(): stdClass
    {
        return $this->mailObject;
    }

    private function setFrom(): void
    {
        $this->mailObject->from = 'applicationrestapi@default.com';
    }

    private function setSubject(): void
    {
        $this->mailObject->subject = 'Restore Password';
    }

    private function setMarkdown(): void
    {
        $this->mailObject->markdown = 'mails.forgot';
    }
}
