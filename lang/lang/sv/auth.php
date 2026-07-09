<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/sv/auth.php
return [
    'failed' => 'Dessa uppgifter stämmer inte överens med vårt register.',
    'general_error' => 'Du har inte tillstånd att göra det där.',
    'socialite' => [
        'unacceptable' => ':provider kan inte att användas vid inloggning.',
    ],
    'throttle' => 'För många misslyckade försök att logga in i rad. Du kan försöka igen om :seconds sekunder.',
    'unknown' => 'Hm.. Något gick snett, ett okänt fel.',
];
