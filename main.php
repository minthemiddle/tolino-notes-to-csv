<?php

$file = fopen("notes.txt", "r");
$contents = fread($file, filesize("notes.txt"));
fclose($file);

$block_re = '#(?P<title>.+?)\s\((?P<lastname>.*),\s(?P<firstname>.*)\)\n(?P<type>Lesezeichen|Notiz|Markierung) auf Seite (?P<location>\d{1,5}):\s(?P<note>.*\n?)"(?P<highlight>.*)"\nHinzugefügt am (?P<day>\d{2}).(?P<month>\d{2}).(?P<year>\d{4}) \| (?P<hour>\d{2}):(?P<minutes>\d{2})#m';

preg_match_all($block_re, $contents, $matches, PREG_SET_ORDER);

echo "Highlight,Title,Author,URL,Note,Location,Date" . "\n";

foreach ($matches as $match) {
    echo "Title: " . $match['title'] . "\n";
    echo "Author: " . $match['firstname'] . " " . $match['lastname'] . "\n";
    echo "Type: " . $match['type'] . "\n";
    echo "location: " . $match['location'] . "\n";
    echo "note: " . $match['note'] . "\n";
    echo "highlight: " . $match['highlight'] . "\n";
    echo "---" . "\n";
}
