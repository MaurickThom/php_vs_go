# PHP vs. GO

A benchmark test.

## Installation

Download the repository, create a MySQL database and import the `database.sql` file. That script creates a table named `item`
with some records. Then change the config files: `go/config.json` and `php/config.php`.

## Tests

Start the GO server:
```bash
cd go
./server
```

And perform some tests:
```bash
# This command performs 100000 requests using 10 parallel threads
ab -c 10 -n 100000 http://localhost:8080/list

# This command performs 100000 requests using 10 parallel thrads
ab -c 10 -n 100000 http://path/to/php/public/list
```
