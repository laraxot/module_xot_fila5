<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\Config\ResolveModuleConfigDataAction;
use Modules\Xot\Tests\TestCase;

uses(TestCase::class)->group('no-xot-db');

dataset('laraxot modules', function (): array {
    $modulesPath = dirname(__DIR__, 5);
    $names = [];
    foreach (scandir($modulesPath) ?: [] as $name) {
        if (! str_starts_with($name, '.') && is_dir($modulesPath.'/'.$name.'/app')) {
            $names[$name] = [$name];
        }
    }

    return $names;
});

test('every module has a setting page class', function (string $module): void {
    expect(File::exists(base_path("Modules/{$module}/app/Filament/Pages/SettingPage.php")))->toBeTrue()
        ->and(class_exists("Modules\\{$module}\\Filament\\Pages\\SettingPage"))->toBeTrue();
})->with('laraxot modules');

test('every module setting page has a config data class the base can read', function (string $module): void {
    expect(ResolveModuleConfigDataAction::dataClassFor("Modules\\{$module}\\Filament\\Pages\\SettingPage"))
        ->toBe("Modules\\{$module}\\Datas\\{$module}ConfigData");
})->with('laraxot modules');

test('every module has setting page navigation labels in it and en', function (string $module): void {
    expect(File::exists(base_path("Modules/{$module}/lang/it/setting.php")))->toBeTrue()
        ->and(File::exists(base_path("Modules/{$module}/lang/en/setting.php")))->toBeTrue();
})->with('laraxot modules');

test('a setting page declares form fields only when its config data has properties', function (string $module): void {
    $source = file_get_contents(base_path("Modules/{$module}/app/Filament/Pages/SettingPage.php")) ?: '';
    preg_match('/function getFormSchema\(\): array\s*\{(.*?)\n    \}/s', $source, $body);
    $declaresFields = str_contains($body[1] ?? '', '=>');
    $dataClass = "Modules\\{$module}\\Datas\\{$module}ConfigData";
    $hasProperties = get_class_vars($dataClass) !== [];

    expect($declaresFields && ! $hasProperties)->toBeFalse();
})->with('laraxot modules');
