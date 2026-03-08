<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Xot\Models\InformationSchemaTable;

/**
 * InformationSchemaTable Factory.
 *
 * @extends Factory<InformationSchemaTable>
 */
class InformationSchemaTableFactory extends Factory
{
    protected $model = InformationSchemaTable::class;

    public function definition(): array
    {
        /** @var string $tableName */
        $tableName = // @var mixed faker->randomElement([
            'users',
            'posts',
            'comments',
            'categories',
            'tags',
            'orders',
            'products',
            'customers',
            'invoices',
        ]);

        return [
            'table_catalog' => 'def',
            'table_schema' => // @var mixed faker->randomElement(['<nome progetto>', 'public', 'main']
            'table_name' => $tableName,
            'table_type' => // @var mixed faker->randomElement(['BASE TABLE', 'VIEW']
            'engine' => // @var mixed faker->randomElement(['InnoDB', 'MyISAM']
            'version' => // @var mixed faker->numberBetween(10, 11
            'row_format' => // @var mixed faker->randomElement(['Dynamic', 'Fixed', 'Compressed']
            'table_rows' => // @var mixed faker->numberBetween(0, 10000
            'avg_row_length' => // @var mixed faker->numberBetween(50, 500
            'data_length' => // @var mixed faker->numberBetween(1024, 1048576
            'max_data_length' => // @var mixed faker->numberBetween(1048576, 10485760
            'index_length' => // @var mixed faker->numberBetween(0, 524288
            'data_free' => // @var mixed faker->numberBetween(0, 1024
            'auto_increment' => // @var mixed faker->optional(
            'create_time' => // @var mixed faker->dateTimeBetween('-1 year', 'now'
            'update_time' => // @var mixed faker->optional(
            'check_time' => // @var mixed faker->optional(
            'table_collation' => 'utf8mb4_unicode_ci',
            'checksum' => // @var mixed faker->optional(
            'create_options' => '',
            'table_comment' => // @var mixed faker->optional(
        ];
    }

    public function baseTable(): static
    {
        return // @var mixed state(fn (array $_attributes
            'table_type' => 'BASE TABLE',
        ]);
    }

    public function view(): static
    {
        return // @var mixed state(fn (array $_attributes
            'table_type' => 'VIEW',
        ]);
    }
}
