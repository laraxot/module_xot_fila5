<?php

declare(strict_types=1);

use App\Support\FeatureFlags;
use Modules\Xot\Tests\XotBaseTestCase;

/*
 * The feature registry lives in config/features.php with FLAT dot-notation keys
 * ('notifications.email.enabled' => true), not nested arrays. Every assertion here
 * pins that contract: reading a flag must go through the whole registry, because
 * config('features.notifications.email.enabled') walks the key segment by segment
 * and returns null.
 *
 * XotBaseTestCase boots the application without DatabaseTransactions: these tests
 * only need the config repository, never the database.
 */

uses(XotBaseTestCase::class);

beforeEach(function (): void {
    config()->set('features', [
        'notifications.email.enabled' => true,
        'notifications.sms.enabled' => false,
        'notifications.slack.enabled' => true,
        'cache.store' => 'redis',
        'cache.ttl' => 3600,
        'pdnd.client_id' => null,
    ]);
});

describe('FeatureFlags::get', function (): void {
    it('reads a flat dot-notation key from the registry', function (): void {
        expect(FeatureFlags::get('cache.store'))->toBe('redis');
        expect(FeatureFlags::get('cache.ttl'))->toBe(3600);
    });

    it('returns the registered value even when it is null', function (): void {
        expect(FeatureFlags::get('pdnd.client_id', 'fallback'))->toBeNull();
    });

    it('falls back to the default for an unknown key', function (): void {
        expect(FeatureFlags::get('does.not.exist', 'fallback'))->toBe('fallback');
        expect(FeatureFlags::get('does.not.exist'))->toBeNull();
    });

    it('does not resolve a key as a nested config path', function (): void {
        expect(config('features.cache.store'))->toBeNull()
            ->and(FeatureFlags::get('cache.store'))->toBe('redis');
    });
});

describe('FeatureFlags::isEnabled', function (): void {
    it('coerces the registered value to bool', function (): void {
        expect(FeatureFlags::isEnabled('notifications.email.enabled'))->toBeTrue();
        expect(FeatureFlags::isEnabled('notifications.sms.enabled'))->toBeFalse();
    });

    it('uses the default when the key is absent', function (): void {
        expect(FeatureFlags::isEnabled('missing.flag'))->toBeFalse();
        expect(FeatureFlags::isEnabled('missing.flag', true))->toBeTrue();
    });
});

describe('FeatureFlags::isAnyEnabled', function (): void {
    it('is true when at least one flag of the group is on', function (): void {
        expect(FeatureFlags::isAnyEnabled('notifications'))->toBeTrue();
    });

    it('is false when the group has no enabled flag', function (): void {
        config()->set('features', [
            'notifications.email.enabled' => false,
            'notifications.sms.enabled' => false,
        ]);

        expect(FeatureFlags::isAnyEnabled('notifications'))->toBeFalse();
    });

    it('is false for an unknown group', function (): void {
        expect(FeatureFlags::isAnyEnabled('telepathy'))->toBeFalse();
    });
});

describe('FeatureFlags::listEnabled', function (): void {
    it('lists only the enabled features of the group, without prefix or suffix', function (): void {
        expect(FeatureFlags::listEnabled('notifications'))->toBe(['email', 'slack']);
    });

    it('returns an empty list for an unknown group', function (): void {
        expect(FeatureFlags::listEnabled('telepathy'))->toBe([]);
    });

    it('ignores keys of the group that are not .enabled flags', function (): void {
        expect(FeatureFlags::listEnabled('cache'))->toBe([]);
    });
});

describe('FeatureFlags::all', function (): void {
    it('returns the whole registry', function (): void {
        expect(FeatureFlags::all())->toHaveKey('cache.store', 'redis')
            ->and(FeatureFlags::all())->toHaveCount(6);
    });

    it('returns an empty registry when the config is not an array', function (): void {
        config()->set('features', 'not-an-array');

        expect(FeatureFlags::all())->toBe([]);
    });

    it('drops non-string keys', function (): void {
        config()->set('features', [0 => 'positional', 'cache.store' => 'file']);

        expect(FeatureFlags::all())->toBe(['cache.store' => 'file']);
    });
});

/*
 * app/Helpers/features.php declares feature(), feature_enabled() and
 * features_enabled(), but the file is not in composer.json `autoload.files`
 * (autoload is psr-4 only) and no call site exists in app/ or Modules/: those
 * three functions are undefined at runtime. Not tested here on purpose — the
 * rule is to fix the test when it looks for an API that does not exist, not to
 * invent the wiring that would make it exist.
 */
