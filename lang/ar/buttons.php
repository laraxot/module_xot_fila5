<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Xot/docs/wiki — domain i18n only.
// File: lang/ar/buttons.php
return [
    'backend' => [
        'access' => [
            'users' => [
                'activate' => 'تفعيل',
                'change_password' => 'تغيير كلمة المرور',
                'deactivate' => 'تعطيل',
                'delete_permanently' => 'حذف نهائي',
                'login_as' => 'تسجيل الدخول كـ :user',
                'resend_email' => 'إعادة إرسالة بريد التفعيل',
                'restore_user' => 'إستعادة المستخدم',
            ],
        ],
    ],
    'emails' => [
        'auth' => [
            'confirm_account' => 'Confirm Account',
            'reset_password' => 'Reset Password',
        ],
    ],
    'general' => [
        'cancel' => 'إلغاء',
        'crud' => [
            'create' => 'إنشاء',
            'delete' => 'حذف',
            'edit' => 'تعديل',
            'update' => 'تحديث',
            'view' => 'View',
        ],
        'save' => 'حفظ',
        'view' => 'عرض',
    ],
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
