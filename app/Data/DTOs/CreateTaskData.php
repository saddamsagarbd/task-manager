<?php

namespace App\Data\DTOs;

class CreateTaskData {

    public function __construct(
        public readonly string $title,
        public readonly ?string $description
    )
    {

    }

    public static function formRequest(array $validated): self 
    {

        return new self(
            title         : $validated["title"],
            description   : $validated["description"] ?? null,
        );

    }
}