# PHP vs. GO

A benchmark test.

## Installation

Download the repository, create a MySQL database and import the `database.sql` file. That script creates a table named `item`
with some records. Then change the config files: `go/config.json` and `php/config.php`.

## Benchmark tests

Start the server:
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

## Results

System info:
```text
Operating System: Ubuntu 16.04.4 LTS
HTTP Server: Apache2, PHP5.4
CPU: Intel(R) Core(TM) i7-4600U CPU @ 2.10GHz, Cores: 4, Frequency: 1499.871 MHz, L2 Cache: 4096 KB
```

**GO results**:
```text
Server Hostname:        localhost
Server Port:            8080

Document Path:          /list
Document Length:        37 bytes

Concurrency Level:      10
Time taken for tests:   14.300 seconds
Complete requests:      100000
Failed requests:        0
Total transferred:      16000000 bytes
HTML transferred:       3700000 bytes
Requests per second:    6992.96 [#/sec] (mean)
Time per request:       1.430 [ms] (mean)
Time per request:       0.143 [ms] (mean, across all concurrent requests)
Transfer rate:          1092.65 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.1      0       2
Processing:     0    1   0.8      1      17
Waiting:        0    1   0.7      1      17
Total:          0    1   0.8      1      17

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      2
  75%      2
  80%      2
  90%      2
  95%      3
  98%      3
  99%      4
 100%     17 (longest request)
```

**PHP results**
```text
Server Software:        Apache/2.4.18
Server Hostname:        gchumillas.localhost
Server Port:            80

Document Path:          /gchumillas/php_vs_go/php/public/list
Document Length:        37 bytes

Concurrency Level:      10
Time taken for tests:   42.652 seconds
Complete requests:      100000
Failed requests:        0
Total transferred:      44900000 bytes
HTML transferred:       3700000 bytes
Requests per second:    2344.57 [#/sec] (mean)
Time per request:       4.265 [ms] (mean)
Time per request:       0.427 [ms] (mean, across all concurrent requests)
Transfer rate:          1028.04 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    4   2.2      4      37
Waiting:        1    4   2.1      4      35
Total:          1    4   2.2      4      38

Percentage of the requests served within a certain time (ms)
  50%      4
  66%      5
  75%      5
  80%      6
  90%      7
  95%      8
  98%     10
  99%     11
 100%     38 (longest request)
```
