<?php

namespace Filament\Support\Concerns;

use Closure;

trait HasIconColor
{
    protected string | Closure | null $iconColor = null;

    public function iconColor(string | Closure | null $color): static
    {
        $this->iconColor = $color;

        return $this;
    }

    public function getIconColor(): ?string
    {
        return $this->evaluate($this->iconColor);
    }
}
