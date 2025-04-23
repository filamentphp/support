<?php

namespace Filament\Support\Commands\Concerns;

use function Laravel\Prompts\confirm;

trait CanAskForRelatedResource
{
    /**
     * @return ?class-string
     */
    protected function askForRelatedResource(): ?string
    {
        if (! confirm(
            label: 'Do you want each table row to link to a resource instead of opening a modal? Filament will also inherit the resource\'s configuration.',
            default: false,
        )) {
            return null;
        }

        $clusterFqn = $this->askForCluster(
            initialQuestion: 'Is the resource in a cluster?',
            question: 'Which cluster is the resource in?',
        );

        if (filled($clusterFqn)) {
            [$resourcesNamespace] = $this->getClusterResourcesLocation($clusterFqn);
        } else {
            [$resourcesNamespace] = $this->getResourcesLocation(
                question: 'Which namespace would you like to search for resources in?',
            );
        }

        return $this->askForResource(
            question: 'Which resource do you want to use?',
            resourcesNamespace: $resourcesNamespace,
        );
    }
}
