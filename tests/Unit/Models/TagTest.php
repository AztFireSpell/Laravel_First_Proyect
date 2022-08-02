<?php

namespace Tests\Unit\Models;

use App\Models\Tag;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{
    
    public function test_slug_in_table()
    {
        $tag = new Tag();
        $tag->name = "Proyecto en PHP";

        $this->assertEquals('proyecto-en-php', $tag->slug);
    }
}
