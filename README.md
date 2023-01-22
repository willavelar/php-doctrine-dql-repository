## PHP Doctrine DQL and Repository

![PHP Version Support](https://img.shields.io/badge/php-8.1%2B-brightgreen.svg?style=flat-square) ![Composer Version Support](https://img.shields.io/badge/composer-2.2.9%2B-brightgreen.svg?style=flat-square)

It is an example of using a doctrine with php via a terminal command and sqlite, in a student registration with a telephone relationship and courses linked to it.
Using queries via dql, and also repository

## Installation

```bash
composer install
```

## How To Use

This this section explains how to use the command line with php execution.

- New student registration

```bash
php bin/{dql or repository}/student-insert.php '{name}'
```

- New student registration with phones

```bash
php bin/{dql or repository}/student-insert.php '{name}' '{phone1}' '{phone2}' ...
```

- New course registration

```bash
php bin/{dql or repository}/course-insert.php
```

- List of registered students information

```bash
php bin/{dql or repository}/student-list.php
```

- List of registered courses

```bash
php bin/{dql or repository}/course-list.php
```

- Relationship with student and course

```bash
php bin/{dql or repository}/student-enroll.php '{studentId}' '{corseId}'
```

- Number of registered students

```bash
php bin/{dql or repository}/student-count.php
```

- Search student by name

```bash
php bin/{dql or repository}/student-search.php
```

- Change student name

```bash
php bin/{dql or repository}/student-rename.php
```

- Delete student

```bash
php bin/{dql or repository}/student-delete.php
```