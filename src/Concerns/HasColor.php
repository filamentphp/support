<?php

namespace Filament\Support\Concerns;

use Closure;

trait HasColor
{
    protected string | Closure | null $color = null;

    protected string | Closure | null $defaultColor = null;

    public function color(string | Closure | null $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function defaultColor(string | Closure | null $color): static
    {
        $this->defaultColor = $color;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->evaluate($this->color) ?? $this->evaluate($this->defaultColor);
    }
}
