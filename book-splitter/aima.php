<?php

require "vendor/autoload.php";


delTree('aima/out');
mkdir('aima/out');

$coverPage = [1];
$tocPages = range(12, 18);

$sections = [
    range(1, 226),
    array_merge($coverPage, $tocPages, range(227, 403)),
    array_merge($coverPage, $tocPages, range(404, 669)),
    array_merge($coverPage, $tocPages, range(670, 874)),
    array_merge($coverPage, $tocPages, range(875, 1_032)),
    array_merge($coverPage, $tocPages, range(1_033, 1_167)),
];

foreach ($sections as $i => $section) {
    $pdf = new \mikehaertl\pdftk\Pdf();
    $pdfFile = 'aima/artificial-intelligence-global-4th.pdf';
    $pdf->addFile($pdfFile, 'A')
        ->cat($section, 'A')
        ->saveAs("aima/out/section_$i.pdf");
}

function delTree($dir): void
{
    if (!is_dir($dir)) return;

    $files = array_diff(scandir($dir), array('.', '..'));
    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }

    rmdir($dir);
}