<?php

/**
 * Render a link card HTML snippet.
 *
 * @param string $url      The target URL.
 * @param string $title    The display title.
 * @param string $keyword  A keyword to highlight.
 * @return string Escaped HTML fragment.
 */
function renderLinkCard(string $url, string $title, string $keyword): string
{
    $safeUrl     = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeTitle   = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeKeyword = htmlspecialchars($keyword, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $lines = [];

    $lines[] = '<div class="link-card">';
    $lines[] = '  <a href="' . $safeUrl . '" target="_blank" rel="noopener noreferrer">';
    $lines[] = '    <span class="card-title">' . $safeTitle . '</span>';
    $lines[] = '    <span class="card-keyword">关键词: ' . $safeKeyword . '</span>';
    $lines[] = '  </a>';
    $lines[] = '</div>';

    return implode("\n", $lines);
}

/**
 * Generate a link card with preset example data.
 *
 * @return string HTML string.
 */
function renderExampleCard(): string
{
    $url     = 'https://appmain-leyu.com.cn';
    $title   = '乐鱼体育 · 官方入口';
    $keyword = '乐鱼体育';

    return renderLinkCard($url, $title, $keyword);
}

/**
 * Render an array of link cards.
 *
 * @param array $items Each item must have keys: url, title, keyword.
 * @return string Concatenated HTML.
 */
function renderLinkCards(array $items): string
{
    $fragments = [];

    foreach ($items as $item) {
        $url     = $item['url'] ?? '#';
        $title   = $item['title'] ?? 'Untitled';
        $keyword = $item['keyword'] ?? '';
        $fragments[] = renderLinkCard($url, $title, $keyword);
    }

    return implode("\n", $fragments);
}

// -------------------------------------------------------------------
// Sample usage (can be safely removed or commented in production)
// -------------------------------------------------------------------
/*
echo renderExampleCard();

$links = [
    [
        'url'     => 'https://appmain-leyu.com.cn',
        'title'   => '乐鱼体育 · 首页',
        'keyword' => '乐鱼体育',
    ],
    [
        'url'     => 'https://appmain-leyu.com.cn/live',
        'title'   => '乐鱼体育 · 直播',
        'keyword' => '体育直播',
    ],
];

echo "\n\n" . renderLinkCards($links);
*/