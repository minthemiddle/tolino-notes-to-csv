# Tolino Notes to CSV/Readwise

This little script converts highlights and notes from Tolino readers to a machine consumable CSV format. It was written to import the highlights into Readwise, but can easily be adjusted to other use cases.

## Needed

- PHP 5.3+
- Terminal
- Git
- `notes.txt` from your Tolino

## How to use

- `git clone git@github.com:minthemiddle/tolino-php.git`
- Copy `notes.txt` to the root of the `tolino-php` folder (hence the path is `tolino-php/notes.txt`)
- `cd tolino-php`
- For Readwise:
- `php main.php`
- Upload the generated `output.csv` CSV to Readwise
- For other CSV usage:
- Adjust fields in script, e.g. use the now unused `type` field
- `php main.php` - this generates an `output.csv` file
- ⚠️ Always double check the CSV before processing, there might be errors!

## Known limitations

- If a book has parentheses in the title, the author name is scrambled
  - Input: `Title of book (with parentheses) (Lastname, Firstname)`
  - Output: `Author: (with parentheses) (Lastname`
  - I could not figure out the regex for that yet, if you can, please help

## License

MIT