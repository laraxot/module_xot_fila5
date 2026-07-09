<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/lang/th/history.php
return [
    'backend' => [
        'none' => 'ไม่มีประวัติล่าสุด',
        'none_for_type' => 'ไม่มีประวัติประเภทนี้',
        'none_for_entity' => 'ไม่มีประวัติสำหรับ :entity นี้',
        'recent_history' => 'ประวัติล่าสุด',
        'roles' => [
            'created' => 'ได้สร้างบทบาท',
            'deleted' => 'ได้ลบบทบาท',
            'updated' => 'ได้แก้ไขบทบาท',
        ],
        'users' => [
            'changed_password' => 'ได้เปลี่ยนรหัสผ่านของผู้ใช้',
            'created' => 'ได้สร้างผู้ใช้',
            'deactivated' => 'ได้พักการใช้งานของผู้ใช้',
            'deleted' => 'ได้ลบผู้ใช้',
            'permanently_deleted' => 'ได้ลบผู้ใช้อย่างถาวร',
            'updated' => 'ได้แก้ไขผู้ใช้',
            'reactivated' => 'ได้เปิดการใช้งานของผู้ใช้',
            'restored' => 'ได้กู้คืนผู้ใช้',
        ],
    ],
];
