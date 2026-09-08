<?php

declare(strict_types=1);

<<<<<<< HEAD

namespace Modules\Xot\Tests\Feature;

use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * Test per verificare il corretto funzionamento dello script fix_structure.sh.
 */
class FixStructureTest extends TestCase
{
    private string $testDir;

    protected function setUp(): void
    {
        parent::setUp();

        // Creiamo una directory temporanea per i test
        $this->testDir = sys_get_temp_dir() . '/fix_structure_test_' . uniqid();
        mkdir($this->testDir, 0o755, true);

        // Impostiamo la directory di lavoro
        chdir($this->testDir);
    }

    protected function tearDown(): void
    {
        // Puliamo la directory di test
        $this->rrmdir($this->testDir);

        parent::tearDown();
    }

    /**
     * Funzione ricorsiva per eliminare una directory con tutti i suoi contenuti.
     */
    private function rrmdir($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object !== '.' && $object !== '..') {
                    if (is_dir($dir . DIRECTORY_SEPARATOR . $object) && !is_link($dir . '/' . $object)) {
                        $this->rrmdir($dir . DIRECTORY_SEPARATOR . $object);
                    } else {
                        unlink($dir . DIRECTORY_SEPARATOR . $object);
                    }
                }
            }
            rmdir($dir);
        }
    }

    #[Test]
    public function testMoveToAppFunctionality(): void
    {
        // Creiamo una struttura di directory di test
        mkdir($this->testDir . '/Actions', 0o755, true);
        file_put_contents($this->testDir . '/Actions/test.php', '<?php echo "test";');
=======
namespace Modules\Xot\Tests\Feature;

use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\chdir;
use function Safe\chmod;
use function Safe\exec;
use function Safe\file_get_contents;
use function Safe\file_put_contents;
use function Safe\mkdir;
use function Safe\rmdir;
use function Safe\scandir;
use function Safe\unlink;

uses(TestCase::class);

// $this dentro le closure Pest e' tipizzato da Pest come TestCall (vedi
// @param-closure-this in vendor/pestphp/pest/src/Functions.php), non come
// Modules\Xot\Tests\TestCase: PHPStan vieta di ritipizzare $this via @var,
// quindi lo stato del test vive in una variabile locale condivisa per riferimento.
$testDir = '';

$rrmdir = function (string $dir) use (&$rrmdir): void {
    if (! is_dir($dir)) {
        return;
    }

    /** @var array<int, string> $files */
    $files = scandir($dir);

    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $path = $dir.'/'.$file;
        if (is_dir($path)) {
            $rrmdir($path);
        } else {
            unlink($path);
        }
    }

    rmdir($dir);
};

beforeEach(function () use (&$testDir): void {
    // Creiamo una directory temporanea per i test
    $testDir = sys_get_temp_dir().'/fix_structure_test_'.uniqid();
    mkdir($testDir, 0o755, true);

    // Impostiamo la directory di lavoro
    chdir($testDir);
});

afterEach(function () use (&$testDir, $rrmdir): void {
    // Puliamo la directory di test
    if ($testDir !== '') {
        $rrmdir($testDir);
    }
});

describe('Fix Structure', function () use (&$testDir): void {
    test('move to app functionality', function () use (&$testDir): void {
        // Creiamo una struttura di directory di test
        mkdir($testDir.'/Actions', 0o755, true);
        file_put_contents($testDir.'/Actions/test.php', 'echo "test";');
>>>>>>> c7fd73eb (.)

        // Copiamo lo script nella directory di test
        $script = base_path('../bashscripts/fix_structure.sh');
        $scriptContent = file_get_contents($script);
<<<<<<< HEAD
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0o755);

        // Eseguiamo lo script
        exec('cd ' . $this->testDir . ' && ./fix_structure.sh');

        // Verifichiamo che la cartella Actions sia stata spostata in app/
        static::assertDirectoryExists($this->testDir . '/app/Actions');
        static::assertFileExists($this->testDir . '/app/Actions/test.php');
        static::assertDirectoryDoesNotExist($this->testDir . '/Actions');
    }

    #[Test]
    public function testRenameToLowerFunctionality(): void
    {
        // Creiamo una struttura di directory di test
        mkdir($this->testDir . '/Config', 0o755, true);
        file_put_contents($this->testDir . '/Config/test.php', '<?php echo "test";');
=======
        file_put_contents($testDir.'/fix_structure.sh', $scriptContent);
        chmod($testDir.'/fix_structure.sh', 0o755);

        // Eseguiamo lo script
        exec('cd '.$testDir.' && ./fix_structure.sh');

        // Verifichiamo che la cartella Actions sia stata spostata in app/
        Assert::assertDirectoryExists($testDir.'/app/Actions');
        Assert::assertFileExists($testDir.'/app/Actions/test.php');
        Assert::assertDirectoryDoesNotExist($testDir.'/Actions');
    });

    test('rename to lower functionality', function () use (&$testDir): void {
        // Creiamo una struttura di directory di test
        mkdir($testDir.'/Config', 0o755, true);
        file_put_contents($testDir.'/Config/test.php', 'echo "test";');
>>>>>>> c7fd73eb (.)

        // Copiamo lo script nella directory di test
        $script = base_path('../bashscripts/fix_structure.sh');
        $scriptContent = file_get_contents($script);
<<<<<<< HEAD
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0o755);

        // Eseguiamo lo script
        exec('cd ' . $this->testDir . ' && ./fix_structure.sh');

        // Verifichiamo che la cartella Config sia stata rinominata in config
        static::assertDirectoryExists($this->testDir . '/config');
        static::assertFileExists($this->testDir . '/config/test.php');
        static::assertDirectoryDoesNotExist($this->testDir . '/Config');
    }

    #[Test]
    public function testMoveConfigFunctionality(): void
    {
        // Creiamo una struttura di directory di test con entrambe le versioni
        mkdir($this->testDir . '/Config', 0o755, true);
        file_put_contents($this->testDir . '/Config/main.php', '<?php echo "main";');

        mkdir($this->testDir . '/config', 0o755, true);
        file_put_contents($this->testDir . '/config/secondary.php', '<?php echo "secondary";');
=======
        file_put_contents($testDir.'/fix_structure.sh', $scriptContent);
        chmod($testDir.'/fix_structure.sh', 0o755);

        // Eseguiamo lo script
        exec('cd '.$testDir.' && ./fix_structure.sh');

        // Verifichiamo che la cartella Config sia stata rinominata in config
        Assert::assertDirectoryExists($testDir.'/config');
        Assert::assertFileExists($testDir.'/config/test.php');
        Assert::assertDirectoryDoesNotExist($testDir.'/Config');
    });

    test('move config functionality', function () use (&$testDir): void {
        // Creiamo una struttura di directory di test con entrambe le versioni
        mkdir($testDir.'/Config', 0o755, true);
        file_put_contents($testDir.'/Config/main.php', 'echo "main";');

        mkdir($testDir.'/config', 0o755, true);
        file_put_contents($testDir.'/config/secondary.php', 'echo "secondary";');
>>>>>>> c7fd73eb (.)

        // Copiamo lo script nella directory di test
        $script = base_path('../bashscripts/fix_structure.sh');
        $scriptContent = file_get_contents($script);
<<<<<<< HEAD
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0o755);

        // Eseguiamo lo script
        exec('cd ' . $this->testDir . ' && ./fix_structure.sh');

        // Verifichiamo che i contenuti siano stati uniti e che la cartella minuscola contenga tutto
        static::assertDirectoryExists($this->testDir . '/config');
        static::assertFileExists($this->testDir . '/config/main.php');
        static::assertFileExists($this->testDir . '/config/secondary.php');
        static::assertDirectoryDoesNotExist($this->testDir . '/Config');
        static::assertDirectoryExists($this->testDir . '/config_old');
    }
}
=======
        file_put_contents($testDir.'/fix_structure.sh', $scriptContent);
        chmod($testDir.'/fix_structure.sh', 0o755);

        // Eseguiamo lo script
        exec('cd '.$testDir.' && ./fix_structure.sh');

        // Verifichiamo che i contenuti siano stati uniti e che la cartella minuscola contenga tutto
        Assert::assertDirectoryExists($testDir.'/config');
        Assert::assertFileExists($testDir.'/config/main.php');
        Assert::assertFileExists($testDir.'/config/secondary.php');
        Assert::assertDirectoryDoesNotExist($testDir.'/Config');
        Assert::assertDirectoryExists($testDir.'/config_old');
    });
});
>>>>>>> c7fd73eb (.)
