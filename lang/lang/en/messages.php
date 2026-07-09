<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/en/messages.php
return [
    'title' => 'Laravel Installer',
    'next' => 'Next Step',
    'finish' => 'Install',
    'welcome' => [
        'title' => 'Welcome To The Installer',
        'message' => 'Welcome to the setup wizard.',
    ],
    'requirements' => [
        'title' => 'Requirements',
    ],
    'permissions' => [
        'title' => 'Permissions',
    ],
    'environment' => [
        'title' => 'Environment Settings',
        'save' => 'Save .env',
        'success' => 'Your .env file settings have been saved.',
        'errors' => 'Unable to save the .env file, Please create it manually.',
    ],
    'install' => 'Install',
    'final' => [
        'title' => 'Finished',
        'finished' => 'Application has been successfully installed.',
        'exit' => 'Click here to exit',
    ],
];
