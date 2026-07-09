<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/ar/messages.php
return [
    'title' => 'تنصيب Laravel',
    'next' => 'متابعة',
    'welcome' => [
        'title' => 'تنصيب Laravel',
        'message' => 'أهلا بك في صفحة تنصيب Laravel',
    ],
    'requirements' => [
        'title' => 'المتطلبات',
    ],
    'permissions' => [
        'title' => 'تراخيص المجلدات',
    ],
    'environment' => [
        'title' => 'الإعدادات',
        'save' => 'حفظ ملف .env',
        'success' => 'تم حفظ الإعدادات بنجاح',
        'errors' => 'حدث خطأ أثناء إنشاء ملف .env. رجاءا قم بإنشاءه يدويا',
    ],
    'final' => [
        'title' => 'النهاية',
        'finished' => 'تم تنصيب البرنامج بنجاح...',
        'exit' => 'إضغط هنا للخروج',
    ],
];
