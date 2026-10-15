<?php

declare(strict_types=1);

namespace Tests\Modules\Xot\Fixtures\Stubs;

final class HasCustomModelLabelProbeWithLabels extends HasCustomModelLabelProbeBase
{
    protected static ?string $modelLabel = 'Utente';

    protected static ?string $pluralModelLabel = 'Utenti';

    protected static ?string $navigationLabel = 'Gestione Utenti';
}
