<?php

namespace App\Data\DTOs;

class UpdateTaskData {

    public function __construct(
        
        public readonly string $title,
        public readonly ?string $description,
        public readonly string $status,
    )
    {}

    public static function formRequest(array $validated): self
    {
        return new self(
            title         : $validated['title'],
            description   : $validated['description'] ?? null,
            status        : $validated['status'],
        );
    }
}