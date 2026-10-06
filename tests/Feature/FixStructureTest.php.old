<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Xot\Tests\Feature;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

=======
>>>>>>> 3fbbf1f5 (.)
=======
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);


=======
>>>>>>> a12f125f4a (.)
=======
declare(strict_types=1);


>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 6cba4fe (.)
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
namespace Modules\Xot\Tests\Feature;

use Illuminate\Support\Facades\File;
>>>>>>> 5a14301c (.)
=======

namespace Modules\Xot\Tests\Feature;
=======
use Modules\Xot\Tests\TestCase;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\Xot\Tests\TestCase;

<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b7afadf9 (.)
use function Safe\chdir;
use function Safe\mkdir;
use function Safe\rmdir;
use function Safe\scandir;
use function Safe\unlink;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> cc7fb225 (.)
=======
=======
>>>>>>> b7afadf9 (.)
=======
=======
>>>>>>> f1d4085 (.)
=======
declare(strict_types=1);

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> b7afadf9 (.)

>>>>>>> 73eab74 (.)
=======
>>>>>>> 300ef70 (.)
<<<<<<< HEAD
namespace Modules\Xot\Tests\Feature;
>>>>>>> d2b0a27 (.)
>>>>>>> ab8cc3f3 (.)

use Illuminate\Support\Facades\File;
>>>>>>> 5a14301c (.)
=======
namespace Modules\Xot\Tests\Feature;

>>>>>>> 53d6a6ba (.)
=======
>>>>>>> a6ef6dc7 (.)
=======
>>>>>>> 71586de2 (.)
namespace Modules\Xot\Tests\Feature;

<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
namespace Modules\Xot\Tests\Feature;

>>>>>>> 249a0067 (.)
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * Test per verificare il corretto funzionamento dello script fix_structure.sh.
 */
class FixStructureTest extends TestCase
{
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    private string $testDir;

    protected function setUp(): void
    {
        parent::setUp();

        // Creiamo una directory temporanea per i test
<<<<<<< HEAD
<<<<<<< HEAD
        $this->testDir = sys_get_temp_dir().'/fix_structure_test_'.uniqid();
=======
        $this->testDir = sys_get_temp_dir() . '/fix_structure_test_' . uniqid();
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
        $this->testDir = sys_get_temp_dir() . '/fix_structure_test_' . uniqid();
>>>>>>> 5a14301c (.)
=======
>>>>>>> ed734516 (.)
=======
>>>>>>> 21348520 (.)
=======
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> 7131bd09 (.)
=======
>>>>>>> 88ea7103 (.)
=======
>>>>>>> 3310e9c6 (.)
=======
>>>>>>> 17684f52 (.)
=======
>>>>>>> 9db27d12 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
                    if (is_dir($dir.DIRECTORY_SEPARATOR.$object) && ! is_link($dir.'/'.$object)) {
                        $this->rrmdir($dir.DIRECTORY_SEPARATOR.$object);
                    } else {
                        unlink($dir.DIRECTORY_SEPARATOR.$object);
=======
=======
>>>>>>> 5a14301c (.)
                    if (is_dir($dir . DIRECTORY_SEPARATOR . $object) && !is_link($dir . '/' . $object)) {
                        $this->rrmdir($dir . DIRECTORY_SEPARATOR . $object);
                    } else {
                        unlink($dir . DIRECTORY_SEPARATOR . $object);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 88ea7103 (.)
=======
>>>>>>> 21348520 (.)
=======
>>>>>>> 3fbbf1f5 (.)
=======
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> 17684f52 (.)
=======
=======
=======
>>>>>>> origin/develop
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> ed734516 (.)
=======
>>>>>>> 399f46d3 (.)
=======
=======
>>>>>>> 7131bd09 (.)
=======
>>>>>>> 17684f52 (.)
                if ($object != "." && $object != "..") {
                    if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object)) {
                        $this->rrmdir($dir. DIRECTORY_SEPARATOR .$object);
                    } else {
                        unlink($dir. DIRECTORY_SEPARATOR .$object);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> 17684f52 (.)
>>>>>>> a12f125f4a (.)
=======
                if ($object !== '.' && $object !== '..') {
                    if (is_dir($dir . DIRECTORY_SEPARATOR . $object) && !is_link($dir . '/' . $object)) {
                        $this->rrmdir($dir . DIRECTORY_SEPARATOR . $object);
                    } else {
                        unlink($dir . DIRECTORY_SEPARATOR . $object);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 6cba4fe (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> 5a14301c (.)
=======
>>>>>>> f1d4085 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ed734516 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 21348520 (.)
=======
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> f1d4085 (.)
>>>>>>> 7131bd09 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 88ea7103 (.)
=======
>>>>>>> 3310e9c6 (.)
=======
>>>>>>> 17684f52 (.)
=======
>>>>>>> 9db27d12 (.)
                    }
=======
=======
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> b7afadf9 (.)
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object !== '.' && $object !== '..') {
                /* @phpstan-ignore-next-line binaryOp.invalid */
                $fullPath = $dir.DIRECTORY_SEPARATOR.$object;
                if (is_dir($fullPath) && ! is_link($fullPath)) {
                    removeDirectory($fullPath);
                } else {
                    unlink($fullPath);
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> cc7fb225 (.)
=======
=======
=======
>>>>>>> 53d6a6ba (.)
=======
=======
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
>>>>>>> 249a0067 (.)
    private string $testDir;

    protected function setUp(): void
    {
        parent::setUp();

        // Creiamo una directory temporanea per i test
        $this->testDir = sys_get_temp_dir().'/fix_structure_test_'.uniqid();
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
                    if (is_dir($dir.DIRECTORY_SEPARATOR.$object) && ! is_link($dir.'/'.$object)) {
                        $this->rrmdir($dir.DIRECTORY_SEPARATOR.$object);
                    } else {
                        unlink($dir.DIRECTORY_SEPARATOR.$object);
                    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> d2b0a27 (.)
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 53d6a6ba (.)
=======
>>>>>>> d2b0a27 (.)
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
>>>>>>> 249a0067 (.)
                }
            }
            rmdir($dir);
        }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    }

    #[Test]
<<<<<<< HEAD
<<<<<<< HEAD
    public function test_move_to_app_functionality(): void
    {
        // Creiamo una struttura di directory di test
        mkdir($this->testDir.'/Actions', 0o755, true);
        file_put_contents($this->testDir.'/Actions/test.php', '<?php echo "test";');
=======
=======
>>>>>>> 5a14301c (.)
    public function testMoveToAppFunctionality(): void
    {
        // Creiamo una struttura di directory di test
        mkdir($this->testDir . '/Actions', 0o755, true);
        file_put_contents($this->testDir . '/Actions/test.php', '<?php echo "test";');
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
<<<<<<< HEAD
        rmdir($dir);
=======
=======
>>>>>>> 53d6a6ba (.)
=======
        rmdir($dir);
=======
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
>>>>>>> 249a0067 (.)
    }

    #[Test]
    public function test_move_to_app_functionality(): void
    {
        // Creiamo una struttura di directory di test
<<<<<<< HEAD
<<<<<<< HEAD
        mkdir($this->testDir . '/Actions', 0o755, true);
        file_put_contents($this->testDir . '/Actions/test.php', '<?php echo "test";');
>>>>>>> ab8cc3f3 (.)
=======
        mkdir($this->testDir.'/Actions', 0o755, true);
        file_put_contents($this->testDir.'/Actions/test.php', '<?php echo "test";');
>>>>>>> 53d6a6ba (.)
=======
        mkdir($this->testDir.'/Actions', 0o755, true);
        file_put_contents($this->testDir.'/Actions/test.php', '<?php echo "test";');
>>>>>>> 249a0067 (.)

        // Copiamo lo script nella directory di test
        $script = base_path('../bashscripts/fix_structure.sh');
        $scriptContent = file_get_contents($script);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 249a0067 (.)
        file_put_contents($this->testDir.'/fix_structure.sh', $scriptContent);
        chmod($this->testDir.'/fix_structure.sh', 0o755);

        // Eseguiamo lo script
        exec('cd '.$this->testDir.' && ./fix_structure.sh');

        // Verifichiamo che la cartella Actions sia stata spostata in app/
        static::assertDirectoryExists($this->testDir.'/app/Actions');
        static::assertFileExists($this->testDir.'/app/Actions/test.php');
        static::assertDirectoryDoesNotExist($this->testDir.'/Actions');
    }

    #[Test]
    public function test_rename_to_lower_functionality(): void
    {
        // Creiamo una struttura di directory di test
        mkdir($this->testDir.'/Config', 0o755, true);
        file_put_contents($this->testDir.'/Config/test.php', '<?php echo "test";');
<<<<<<< HEAD
=======
=======
>>>>>>> 5a14301c (.)
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0o755);
=======
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0o755);
<<<<<<< HEAD
=======
        chmod($this->testDir . '/fix_structure.sh', 0755);
>>>>>>> f1d4085 (.)
=======
        chmod($this->testDir . '/fix_structure.sh', 0o755);
>>>>>>> 73eab74 (.)
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 6dcebf8a (.)
=======
        file_put_contents($this->testDir.'/fix_structure.sh', $scriptContent);
        chmod($this->testDir.'/fix_structure.sh', 0o755);
>>>>>>> 53d6a6ba (.)

        // Eseguiamo lo script
        exec('cd '.$this->testDir.' && ./fix_structure.sh');

        // Verifichiamo che la cartella Actions sia stata spostata in app/
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertDirectoryExists($this->testDir . '/app/Actions');
        static::assertFileExists($this->testDir . '/app/Actions/test.php');
        static::assertDirectoryDoesNotExist($this->testDir . '/Actions');
=======
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertDirectoryExists($this->testDir . '/app/Actions');
        static::assertFileExists($this->testDir . '/app/Actions/test.php');
        static::assertDirectoryDoesNotExist($this->testDir . '/Actions');
=======
        $this->assertDirectoryExists($this->testDir . '/app/Actions');
        $this->assertFileExists($this->testDir . '/app/Actions/test.php');
        $this->assertDirectoryDoesNotExist($this->testDir . '/Actions');
>>>>>>> f1d4085 (.)
=======
        static::assertDirectoryExists($this->testDir . '/app/Actions');
        static::assertFileExists($this->testDir . '/app/Actions/test.php');
        static::assertDirectoryDoesNotExist($this->testDir . '/Actions');
>>>>>>> 73eab74 (.)
>>>>>>> ab8cc3f3 (.)
=======
        static::assertDirectoryExists($this->testDir . '/app/Actions');
        static::assertFileExists($this->testDir . '/app/Actions/test.php');
        static::assertDirectoryDoesNotExist($this->testDir . '/Actions');
>>>>>>> 6dcebf8a (.)
=======
        static::assertDirectoryExists($this->testDir.'/app/Actions');
        static::assertFileExists($this->testDir.'/app/Actions/test.php');
        static::assertDirectoryDoesNotExist($this->testDir.'/Actions');
>>>>>>> 53d6a6ba (.)
    }

    #[Test]
    public function test_rename_to_lower_functionality(): void
    {
        // Creiamo una struttura di directory di test
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        mkdir($this->testDir . '/Config', 0o755, true);
        file_put_contents($this->testDir . '/Config/test.php', '<?php echo "test";');
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6dcebf8a (.)
        mkdir($this->testDir . '/Config', 0o755, true);
        file_put_contents($this->testDir . '/Config/test.php', '<?php echo "test";');
>>>>>>> ab8cc3f3 (.)
=======
        mkdir($this->testDir.'/Config', 0o755, true);
        file_put_contents($this->testDir.'/Config/test.php', '<?php echo "test";');
>>>>>>> 53d6a6ba (.)
=======
>>>>>>> 249a0067 (.)

        // Copiamo lo script nella directory di test
        $script = base_path('../bashscripts/fix_structure.sh');
        $scriptContent = file_get_contents($script);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 249a0067 (.)
        file_put_contents($this->testDir.'/fix_structure.sh', $scriptContent);
        chmod($this->testDir.'/fix_structure.sh', 0o755);

        // Eseguiamo lo script
        exec('cd '.$this->testDir.' && ./fix_structure.sh');

        // Verifichiamo che la cartella Config sia stata rinominata in config
        static::assertDirectoryExists($this->testDir.'/config');
        static::assertFileExists($this->testDir.'/config/test.php');
        static::assertDirectoryDoesNotExist($this->testDir.'/Config');
    }

    #[Test]
    public function test_move_config_functionality(): void
    {
        // Creiamo una struttura di directory di test con entrambe le versioni
        mkdir($this->testDir.'/Config', 0o755, true);
        file_put_contents($this->testDir.'/Config/main.php', '<?php echo "main";');

        mkdir($this->testDir.'/config', 0o755, true);
        file_put_contents($this->testDir.'/config/secondary.php', '<?php echo "secondary";');
<<<<<<< HEAD
=======
=======
>>>>>>> 5a14301c (.)
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0o755);
=======
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0o755);
<<<<<<< HEAD
=======
        chmod($this->testDir . '/fix_structure.sh', 0755);
>>>>>>> f1d4085 (.)
=======
        chmod($this->testDir . '/fix_structure.sh', 0o755);
>>>>>>> 73eab74 (.)
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 6dcebf8a (.)
=======
        file_put_contents($this->testDir.'/fix_structure.sh', $scriptContent);
        chmod($this->testDir.'/fix_structure.sh', 0o755);
>>>>>>> 53d6a6ba (.)

        // Eseguiamo lo script
        exec('cd '.$this->testDir.' && ./fix_structure.sh');

        // Verifichiamo che la cartella Config sia stata rinominata in config
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertDirectoryExists($this->testDir . '/config');
        static::assertFileExists($this->testDir . '/config/test.php');
        static::assertDirectoryDoesNotExist($this->testDir . '/Config');
=======
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertDirectoryExists($this->testDir . '/config');
        static::assertFileExists($this->testDir . '/config/test.php');
        static::assertDirectoryDoesNotExist($this->testDir . '/Config');
=======
        $this->assertDirectoryExists($this->testDir . '/config');
        $this->assertFileExists($this->testDir . '/config/test.php');
        $this->assertDirectoryDoesNotExist($this->testDir . '/Config');
>>>>>>> f1d4085 (.)
=======
        static::assertDirectoryExists($this->testDir . '/config');
        static::assertFileExists($this->testDir . '/config/test.php');
        static::assertDirectoryDoesNotExist($this->testDir . '/Config');
>>>>>>> 73eab74 (.)
>>>>>>> ab8cc3f3 (.)
=======
        static::assertDirectoryExists($this->testDir . '/config');
        static::assertFileExists($this->testDir . '/config/test.php');
        static::assertDirectoryDoesNotExist($this->testDir . '/Config');
>>>>>>> 6dcebf8a (.)
=======
        static::assertDirectoryExists($this->testDir.'/config');
        static::assertFileExists($this->testDir.'/config/test.php');
        static::assertDirectoryDoesNotExist($this->testDir.'/Config');
>>>>>>> 53d6a6ba (.)
    }

    #[Test]
    public function test_move_config_functionality(): void
    {
        // Creiamo una struttura di directory di test con entrambe le versioni
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 73eab74 (.)
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 6dcebf8a (.)
        mkdir($this->testDir . '/Config', 0o755, true);
        file_put_contents($this->testDir . '/Config/main.php', '<?php echo "main";');

        mkdir($this->testDir . '/config', 0o755, true);
<<<<<<< HEAD
<<<<<<< HEAD
        file_put_contents($this->testDir . '/config/secondary.php', '<?php echo "secondary";');
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 5a14301c (.)
=======
<<<<<<< HEAD
=======
        mkdir($this->testDir . '/Config', 0755, true);
        file_put_contents($this->testDir . '/Config/main.php', '<?php echo "main";');

        mkdir($this->testDir . '/config', 0755, true);
>>>>>>> f1d4085 (.)
=======
>>>>>>> 73eab74 (.)
=======
>>>>>>> 6dcebf8a (.)
        file_put_contents($this->testDir . '/config/secondary.php', '<?php echo "secondary";');
>>>>>>> ab8cc3f3 (.)
=======
        mkdir($this->testDir.'/Config', 0o755, true);
        file_put_contents($this->testDir.'/Config/main.php', '<?php echo "main";');

        mkdir($this->testDir.'/config', 0o755, true);
        file_put_contents($this->testDir.'/config/secondary.php', '<?php echo "secondary";');
>>>>>>> 53d6a6ba (.)
=======
>>>>>>> 249a0067 (.)

        // Copiamo lo script nella directory di test
        $script = base_path('../bashscripts/fix_structure.sh');
        $scriptContent = file_get_contents($script);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 249a0067 (.)
        file_put_contents($this->testDir.'/fix_structure.sh', $scriptContent);
        chmod($this->testDir.'/fix_structure.sh', 0o755);

        // Eseguiamo lo script
        exec('cd '.$this->testDir.' && ./fix_structure.sh');

        // Verifichiamo che i contenuti siano stati uniti e che la cartella minuscola contenga tutto
        static::assertDirectoryExists($this->testDir.'/config');
        static::assertFileExists($this->testDir.'/config/main.php');
        static::assertFileExists($this->testDir.'/config/secondary.php');
        static::assertDirectoryDoesNotExist($this->testDir.'/Config');
        static::assertDirectoryExists($this->testDir.'/config_old');
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 5a14301c (.)
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0o755);
=======
        file_put_contents($this->testDir . '/fix_structure.sh', $scriptContent);
        chmod($this->testDir . '/fix_structure.sh', 0o755);
<<<<<<< HEAD
=======
        chmod($this->testDir . '/fix_structure.sh', 0755);
>>>>>>> f1d4085 (.)
=======
        chmod($this->testDir . '/fix_structure.sh', 0o755);
>>>>>>> 73eab74 (.)
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 6dcebf8a (.)
=======
        file_put_contents($this->testDir.'/fix_structure.sh', $scriptContent);
        chmod($this->testDir.'/fix_structure.sh', 0o755);
>>>>>>> 53d6a6ba (.)

        // Eseguiamo lo script
        exec('cd '.$this->testDir.' && ./fix_structure.sh');

        // Verifichiamo che i contenuti siano stati uniti e che la cartella minuscola contenga tutto
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 73eab74 (.)
>>>>>>> ab8cc3f3 (.)
=======
>>>>>>> 6dcebf8a (.)
=======
>>>>>>> b7afadf9 (.)
        static::assertDirectoryExists($this->testDir . '/config');
        static::assertFileExists($this->testDir . '/config/main.php');
        static::assertFileExists($this->testDir . '/config/secondary.php');
        static::assertDirectoryDoesNotExist($this->testDir . '/Config');
        static::assertDirectoryExists($this->testDir . '/config_old');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 5a14301c (.)
=======
>>>>>>> 6dcebf8a (.)
=======
>>>>>>> 88ea7103 (.)
=======
>>>>>>> 21348520 (.)
=======
>>>>>>> 3fbbf1f5 (.)
=======
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> 17684f52 (.)
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> ed734516 (.)
=======
>>>>>>> 399f46d3 (.)
=======
=======
>>>>>>> 7131bd09 (.)
=======
>>>>>>> 17684f52 (.)
=======
=======
>>>>>>> ab8cc3f3 (.)
=======
=======
>>>>>>> b7afadf9 (.)
        $this->assertDirectoryExists($this->testDir . '/config');
        $this->assertFileExists($this->testDir . '/config/main.php');
        $this->assertFileExists($this->testDir . '/config/secondary.php');
        $this->assertDirectoryDoesNotExist($this->testDir . '/Config');
        $this->assertDirectoryExists($this->testDir . '/config_old');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> 17684f52 (.)
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 6cba4fe (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> 5a14301c (.)
=======
>>>>>>> f1d4085 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ed734516 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 21348520 (.)
=======
>>>>>>> 3fbbf1f5 (.)
=======
>>>>>>> 399f46d3 (.)
=======
>>>>>>> ca9324a4 (.)
=======
>>>>>>> f1d4085 (.)
>>>>>>> 7131bd09 (.)
=======
=======
>>>>>>> 73eab74 (.)
>>>>>>> 88ea7103 (.)
=======
>>>>>>> 3310e9c6 (.)
=======
>>>>>>> 17684f52 (.)
=======
>>>>>>> 9db27d12 (.)
=======
=======
>>>>>>> b7afadf9 (.)
>>>>>>> f1d4085 (.)
=======
>>>>>>> 73eab74 (.)
>>>>>>> d2b0a27 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> ab8cc3f3 (.)
=======
=======
>>>>>>> 300ef70 (.)
>>>>>>> 6dcebf8a (.)
=======
        static::assertDirectoryExists($this->testDir.'/config');
        static::assertFileExists($this->testDir.'/config/main.php');
        static::assertFileExists($this->testDir.'/config/secondary.php');
        static::assertDirectoryDoesNotExist($this->testDir.'/Config');
        static::assertDirectoryExists($this->testDir.'/config_old');
>>>>>>> 53d6a6ba (.)
=======
=======
>>>>>>> 300ef70 (.)
>>>>>>> a6ef6dc7 (.)
>>>>>>> b7afadf9 (.)
=======
>>>>>>> 71586de2 (.)
=======
>>>>>>> 249a0067 (.)
    }
}
