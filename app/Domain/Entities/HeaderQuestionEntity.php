<?php

namespace App\Domain\Entities;

class HeaderQuestionEntity{

    private string $id;
    private string $category;
    private int $total;

    public function __construct(string $id, string $category, int $total)
    {
        $this->id = $id;
        $this->category = $category;
        $this->total = $total;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'category' => $this->category,
            'total' => $this->total
        ];
    }

}
