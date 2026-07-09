<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/ru/messages.php
return [
    'title' => 'Установка Laravel',
    'next' => 'Следующий шаг',
    'welcome' => [
        'title' => 'Установка Laravel',
        'message' => 'Добро пожаловать в первоначальную настройку фреймворка Laravel.',
    ],
    'requirements' => [
        'title' => 'Необходимые модули',
    ],
    'permissions' => [
        'title' => 'Проверка прав на папках',
    ],
    'environment' => [
        'title' => 'Настройки окружения',
        'save' => 'Сохранить .env',
        'success' => 'Настройки успешно сохранены в файле .env',
        'errors' => 'Произошла ошибка при сохранении файла .env, пожалуйста, сохраните его вручную',
    ],
    'final' => [
        'title' => 'Готово',
        'finished' => 'Приложение успешно настроено.',
        'exit' => 'Нажмите для выхода',
    ],
];
