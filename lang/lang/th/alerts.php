<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/th/alerts.php
return [
    'backend' => [
        'roles' => [
            'created' => 'บทบาทถูกสร้างสำเร็จแล้ว',
            'deleted' => 'บทบาทถูกลบสำเร็จแล้ว',
            'updated' => 'บทบาทถูกแก้ไขสำเร็จแล้ว',
        ],
        'users' => [
            'confirmation_email' => 'อีเมลยืนยันตัวตนได้ถูกส่งไปยังปลายทางแล้ว',
            'created' => 'ผู้ใช้ถูกสร้างสำเร็จแล้ว',
            'deleted' => 'ผู้ใช้ถูกลบสำเร็จแล้ว',
            'deleted_permanently' => 'ผู้ใช้ถูกลบไปอย่างถาวร',
            'restored' => 'ผู้ใช้ถูกกู้คืนสำเร็จแล้ว',
            'updated' => 'ผู้ใช้ถูกแก้ไขสำเร็จแล้ว',
            'updated_password' => 'รหัสผ่านของผู้ใช้ถูกแก้ไขสำเร็จแล้ว',
        ],
    ],
];
