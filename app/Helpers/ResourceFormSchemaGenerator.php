<?php

declare(strict_types=1);

namespace Modules\Xot\Helpers;

<<<<<<< HEAD
use RuntimeException;
use ReflectionClass;
use Exception;
use Illuminate\Support\Str;
=======
use Illuminate\Support\Str;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
>>>>>>> c7fd73eb (.)
use Webmozart\Assert\Assert;

use function Safe\error_log;
use function Safe\file_get_contents;
use function Safe\file_put_contents;
use function Safe\glob;
use function Safe\preg_match;
use function Safe\preg_replace;

class ResourceFormSchemaGenerator
{
    /**
<<<<<<< HEAD
     * @param class-string $resourceClass
=======
     * @param  class-string  $resourceClass
>>>>>>> c7fd73eb (.)
     */
    public static function generateFormSchema(string $resourceClass): bool
    {
        try {
<<<<<<< HEAD
            if (!class_exists($resourceClass)) {
                throw new RuntimeException("Class {$resourceClass} does not exist");
            }

            $reflection = new ReflectionClass($resourceClass);
            $filename = $reflection->getFileName();

            if ($filename === false) {
                throw new RuntimeException("Failed to get filename for class: {$resourceClass}");
=======
            if (! class_exists($resourceClass)) {
                throw new \RuntimeException("Class {$resourceClass} does not exist");
            }

            $reflection = new \ReflectionClass($resourceClass);
            $filename = $reflection->getFileName();

            if ($filename === false) {
                throw new \RuntimeException("Failed to get filename for class: {$resourceClass}");
>>>>>>> c7fd73eb (.)
            }

            // Read the file contents
            $fileContents = file_get_contents($filename);

            // Check if getFormSchema method already exists
            if (str_contains($fileContents, 'public function getFormSchema')) {
                return false;
            }

            // Generate form schema
            $modelName = str_replace('Resource', '', $reflection->getShortName());
            $modelVariable = Str::camel($modelName);

            $formSchemaMethod = "\n    public function getFormSchema(): array\n    {\n        return [\n";
            $formSchemaMethod .= "            Forms\\Components\\TextInput::make('{$modelVariable}_name')\n";
            $formSchemaMethod .= "                ->required(),\n";
            $formSchemaMethod .= "        ];\n    }\n";

            // Insert the method before the last closing brace
<<<<<<< HEAD
            $modifiedContents = preg_replace('/}(\s*)$/', $formSchemaMethod . '}$1', $fileContents);
=======
            $modifiedContents = preg_replace('/}(\s*)$/', $formSchemaMethod.'}$1', $fileContents);
>>>>>>> c7fd73eb (.)

            // Write back to the file
            file_put_contents($filename, $modifiedContents);

            return true;
<<<<<<< HEAD
        } catch (Exception $e) {
            error_log("Error generating form schema for {$resourceClass}: " . $e->getMessage());
=======
        } catch (\Exception $e) {
            error_log("Error generating form schema for {$resourceClass}: ".$e->getMessage());

>>>>>>> c7fd73eb (.)
            return false;
        }
    }

    /**
     * @return array{updated: array<string>, skipped: array<string>}
     */
    public static function generateForAllResources(): array
    {
        $resourceFiles = glob(
<<<<<<< HEAD
            '/var/www/html/base_orisbroker_fila3/laravel/Modules/*/app/Filament/Resources/*Resource.php',
=======
            '/var/www/html/base_orisbroker_fila5/laravel/Modules/*/app/Filament/Resources/*Resource.php',
>>>>>>> c7fd73eb (.)
        );

        $results = ['updated' => [], 'skipped' => []];

        foreach ($resourceFiles as $file) {
            try {
<<<<<<< HEAD
                Assert::string($file, __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
=======
                Assert::string($file, __FILE__.':'.__LINE__.' - '.class_basename(self::class));
>>>>>>> c7fd73eb (.)
                $content = file_get_contents($file);
                $namespaceMatch = [];
                $classMatch = [];

                if (
<<<<<<< HEAD
                    preg_match('/namespace\s+([\w\\\\\\\\]+);/', $content, $namespaceMatch) &&
                        preg_match('/class\s+(\w+)\s+extends\s+XotBaseResource/', $content, $classMatch) &&
                        !empty($namespaceMatch[1]) &&
                        !empty($classMatch[1])
                ) {
                    $fullClassName = $namespaceMatch[1] . '\\' . $classMatch[1];
=======
                    preg_match('/namespace\s+([\w\\\\\\\\]+);/', $content, $namespaceMatch)
                        && preg_match('/class\s+(\w+)\s+extends\s+XotBaseResource/', $content, $classMatch)
                        && ! empty($namespaceMatch[1])
                        && ! empty($classMatch[1])
                ) {
                    $fullClassName = $namespaceMatch[1].'\\'.$classMatch[1];
>>>>>>> c7fd73eb (.)

                    if (class_exists($fullClassName)) {
                        /** @var class-string $fullClassName */
                        if (self::generateFormSchema($fullClassName)) {
                            $results['updated'][] = $fullClassName;
                        }
                    }
                }
<<<<<<< HEAD
            } catch (Exception $e) {
                $results['skipped'][] = is_string($file) ? $file : (((string) $file) . ': ' . $e->getMessage());
=======
            } catch (\Exception $e) {
                $results['skipped'][] = is_string($file) ? $file : (SafeStringCastAction::cast($file).': '.$e->getMessage());
>>>>>>> c7fd73eb (.)
            }
        }

        return $results;
    }
}
