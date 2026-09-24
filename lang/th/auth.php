<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/th/auth.php
return [
    'failed' => 'ข้อมูลที่ใช้ในการยืนยันตัวตนไม่ถูกต้อง',
    'general_error' => 'คุณไม่มีสิทธิ์ในการเข้าถึงหรือกระทำการ',
    'socialite' => [
        'unacceptable' => 'ไม่ได้รับการยินยอมให้เข้าสู่ระบบด้วย :provider',
    ],
    'throttle' => 'คุณได้พยายามเข้าระบบหลายครั้งเกินไป กรุณาลองใหม่ใน :seconds วินาทีข้างหน้า',
    'unknown' => 'เกิดข้อผิดพลาดโดยไม่ทราบสาเหตุ',
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
    'actions' => [
    ],
];
