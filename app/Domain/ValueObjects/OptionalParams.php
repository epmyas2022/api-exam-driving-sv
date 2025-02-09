<?php

namespace App\Domain\ValueObjects;

class OptionalParams
{
    private ?string $urlImage;
    private ?string $category;

    public function __construct(
        ?string $urlImage,
        ?string $category
    ) {
        $this->urlImage = $urlImage;
        $this->category = $category;
    }

    public function getUrlImage(): ?string
    {
        return $this->urlImage;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }
}
