<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Datas;

use Modules\Xot\Datas\ArticleData;
use PHPUnit\Framework\TestCase;

class ArticleDataTest extends TestCase
{
    public function testCanCreateArticleDataWithDefaults(): void
    {
        $data = ArticleData::make();

        $this->assertInstanceOf(ArticleData::class, $data);
        $this->assertEquals(['post', 'page', 'news'], $data->types);
        $this->assertEquals([], $data->categories);
        $this->assertEquals('markdown', $data->editor);
    }

    public function testCanCreateArticleDataWithCustomValues(): void
    {
        $data = new ArticleData(
            types: ['blog', 'article'],
            categories: ['tech', 'news'],
            editor: 'wysiwyg',
            defaultMeta: ['title' => 'Custom Title'],
            features: ['enable_comments' => false],
        );

        $this->assertEquals(['blog', 'article'], $data->types);
        $this->assertEquals(['tech', 'news'], $data->categories);
        $this->assertEquals('wysiwyg', $data->editor);
        $this->assertFalse($data->features['enable_comments']);
    }
}
