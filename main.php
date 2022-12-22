<?php

$file = fopen("notes.txt", "r");
$contents = fread($file, filesize("notes.txt"));
fclose($file);

$block_re = '#(?P<title>.+?)\s\((?P<lastname>.*),\s(?P<firstname>.*)\)\n(?P<type>Lesezeichen|Notiz|Markierung) auf Seite (?P<location>\d{1,5}):\s(?P<note>.*\n?)"(?P<highlight>.*)"\nHinzugefügt am (?P<day>\d{2}).(?P<month>\d{2}).(?P<year>\d{4}) \| (?P<hour>\d{2}):(?P<minutes>\d{2})#m';

preg_match_all($block_re, $contents, $matches, PREG_SET_ORDER);

$csv_file = fopen("output.csv", "w");

// Highlight,Title,Author,URL,Note,Location,Date

fputcsv($csv_file, ["Highlight", "Title", "Author", "URL", "Note", "Location", "Date"]);

foreach ($matches as $match) {
    $author = "{$match['firstname']} {$match['lastname']}";
    $date = "{$match['year']}-{$match['month']}-{$match['day']} {$match['hour']}:{$match['minutes']}:00";
    fputcsv($csv_file, [$match['highlight'], $match['title'], $author, null, $match['note'], $match['location'], $date]);
}

fclose($csv_file);
