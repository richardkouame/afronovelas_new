<?php


namespace App\Entity\Traits;


trait EncapsedIdTrait
{
    public function encapId()
    {
        return $this->id * 4791;
    }

    public function decapsId()
    {
        return $this->id / 4791;
    }
}