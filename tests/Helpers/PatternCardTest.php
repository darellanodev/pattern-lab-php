<?php

namespace Tests\Helpers;

use App\Helpers\PatternCard;
use PHPUnit\Framework\TestCase;

class PatternCardTest extends TestCase
{
    public function testBuildHtmlContainsTitle(): void
    {
        $html = PatternCard::buildHtml('Adapter', 'Description text', 'use case', 'url.php');
        $this->assertStringContainsString('Adapter', $html);
    }

    public function testBuildHtmlContainsDescription(): void
    {
        $html = PatternCard::buildHtml('Title', 'A simple description', 'use case', 'url.php');
        $this->assertStringContainsString('A simple description', $html);
    }

    public function testBuildHtmlContainsUseCase(): void
    {
        $html = PatternCard::buildHtml('Title', 'Desc', 'integrating old APIs', 'url.php');
        $this->assertStringContainsString('Use case: integrating old APIs', $html);
    }

    public function testBuildHtmlContainsLink(): void
    {
        $html = PatternCard::buildHtml('Title', 'Desc', 'use case', 'examples/pattern/index.php');
        $this->assertStringContainsString('href="examples/pattern/index.php"', $html);
    }

    public function testBuildHtmlContainsViewExampleText(): void
    {
        $html = PatternCard::buildHtml('Title', 'Desc', 'use case', 'url.php');
        $this->assertStringContainsString('View Example', $html);
    }

    public function testBuildHtmlEscapesHtmlInTitle(): void
    {
        $html = PatternCard::buildHtml('<script>alert("xss")</script>', 'Desc', 'use case', 'url.php');
        $this->assertStringContainsString('&lt;script&gt;', $html);
        $this->assertStringNotContainsString('<script>', $html);
    }

    public function testBuildHtmlEscapesHtmlInDescription(): void
    {
        $html = PatternCard::buildHtml('Title', '<b>bold</b>', 'use case', 'url.php');
        $this->assertStringContainsString('&lt;b&gt;', $html);
        $this->assertStringNotContainsString('<b>bold</b>', $html);
    }

    public function testBuildHtmlWithExtraClasses(): void
    {
        $html = PatternCard::buildHtml('Title', 'Desc', 'use case', 'url.php', 'mt-4');
        $this->assertStringContainsString('mt-4', $html);
    }

    public function testBuildHtmlWithEmptyStrings(): void
    {
        $html = PatternCard::buildHtml('', '', '', '');
        $this->assertNotEmpty($html);
    }

    public function testBuildHtmlReturnsExpectedStructure(): void
    {
        $html = PatternCard::buildHtml('Test', 'Desc', 'use case', 'page.php');
        $this->assertStringContainsString('<h3 class="text-xl font-medium text-white mb-2">Test</h3>', $html);
        $this->assertStringContainsString('<p class="text-gray-400 mb-2">Desc</p>', $html);
        $this->assertStringContainsString('page.php', $html);
    }
}
