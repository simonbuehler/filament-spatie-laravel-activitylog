<?php

namespace AlexJustesen\FilamentSpatieLaravelActivitylog;

use Filament\Facades\Filament;

final class ResourceFinder
{
    public static function find(string $class): ?string
    {
        $resources = Filament::getResources();

        foreach ($resources as $resource) {
            $model             = $resource::getModel();
            $trimmed_ressource = substr($resource, strrpos($resource, '\\') + 1);
            $trimmed_class     = substr($class, strrpos($class, '\\') + 1);

            if ($model === $class && str_starts_with($trimmed_ressource, $trimmed_class)
            ) {
                return $resource;
            }
        }
    }
}
