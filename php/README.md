# MoViCon

A minimalist framework for PHP based on the following principles:

  * **Fast**: It's fast because it uses simple and efficient algorithms.
  * **Light**: It's light because it occupies 104kB of disk space.
  * **Soft**: It's "soft" because it only requires MySQL and PHP5.6 or later.

## Requirements

This framework requires [Composer](https://getcomposer.org/), [MySQL](https://www.mysql.com/) or [compatible](https://mariadb.org/) and a server capable of executing [PHP5.6](http://php.net/downloads.php) or later.

## Install

Open a terminal and execute the [create-project](https://getcomposer.org/doc/03-cli.md#create-project) command to generate the project structure (replace `<myproject>` with your project name):
```bash
composer create-project movicon/movicon <myproject>
```

## Project structure

The framework contains the following structure:

```text
public/  <!-- public directory or DOCUMENT_ROOT
  |-- route1.php
  |-- route2.php
  |-- ...
  |-- .htaccess
src/ <!-- source code
  |-- core/ <!-- 'internal classes'
  |     |-- http/
  |     |     |-- Controller.php <!-- the base class of any controller
  |     |     |-- View.php       <!-- the base class of any view
  |-- models/      <!-- the 'models'
  |     |-- Entity1Model.php
  |     |-- Entity2Model.php
  |     |-- ...
  |-- views/       <!-- the 'views'
  |     |-- Route1View.php
  |     |-- Route2View.php
  |     |-- ...
  |-- controllers/ <!-- the 'controllers'
  |     |-- Route1Controller.php
  |     |-- Route2Controller.php
  |     |-- ...
vendor/        <!-- third-party libraries
config.php     <!-- config file
composer.json  <!-- composer libraries
composer.lock
.gitignore
LICENSE
phpcs.xml
README.md
```

### `public/` folder

The `public/` folder contains the 'routes' and any other resource accessible from the web. It represents the `DOCUMENT_ROOT`. We'll talk about 'routers' later in this manual.

### `source/` folder

The `source/` folder contains the source code of the project. It has three relevant folders, representing the [Model View Controller](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller) pattern:

 1. `source/models`: This folder contains the 'models'.
 2. `source/views`: This folder contains the 'views'.
 3. `source/controllers`: This folder contains the 'controllers'.

Additionally this folder contains a `source/core` folder, used for 'internal classes'.

### `vendor/` folder

The `vendor/` folder contains third-party software installed by the [Composer](https://getcomposer.org/) package manager. It shouldn't be part of the repository and it was intentionally ignored by GIT (see `.gitignore` file).

## Routes

Unlike other systems this framework doesn't implement any mechanism to incorportate 'routes'. A route is nothing more than a script under the `public/` directory responsible for instantiating a 'view' and printing a document. If you take a look at the `public/route1.php` script, you can see how it works clearly:

```php
require_once "../vendor/autoload.php";
require_once "../config.php";
use views\Route1View;

// instantiates a view and prints the document
$v = new Route1View();
$v->printDocument();
```

## Models

A 'model' represents an 'entity' in the [MVC](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller) design pattern. In general a 'model' extends the `DbActiveRecord` class, which implements the [active record](https://en.wikipedia.org/wiki/Active_record_pattern) pattern. You can use the `DbActiveRecord` class to insert, edit or delete records. More information about this class can be found here: [MoViCon DB](https://github.com/movicon/movicon-db)

## Views

A 'view' is responsible for preparing the document to be presented to the user. It extends the `HttpView` class, which contains the abstract method `getDocument()` and must be implemented in all cases. More information about this class can be found here: [MoViCon HTTP](https://github.com/movicon/movicon-http).

## Controllers

A 'controller' is responsible for 'intercepts' and 'process' HTTP requests. It extends the `HttpController` class. More information about this class can be found here: [MoViCon HTTP](https://github.com/movicon/movicon-http).

## Examples

You can see a complete example here: [MoViCon TODO manager](https://github.com/movicon/movicon-example).
