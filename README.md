Integration testing in PHP
==========================

In this tutorial you will step up to learn the basics of testing aggregated functionalities in PHP.
The goal of this training is to up skill you in mocking and delivering mocks using various IoC techniques.

Before you begin
----------------

Make sure you have binary PHP extension `xdebug` installed. If you're running Debian or Ubuntu
the extension can be installed this way: `sudo apt-get install php5-xdebug`.

1. Clone the repo at https://github.com/stronger/php-integration-testing.git
2. Enter php-integration-testing directory `cd php-integration-testing`
3. Run `composer install`
4. Run `vendor/bin/phpunit`

PHPUnit report will be output to console and all test should be passing.

For this training session we will be working with simple persistent model representing a customer in database.
We will expand the task in each exercise using various testing techniques.

In case you're stuck with some exercise you can take a peek at or merge with branch *exercise-n*,
where *n* is exercise number between 1 and 5.

Mocking
-------

Test doubles (mocks and/or stubs) are:
- a replacement objects
- constructed to mimic specific class or interface
- instructed to behave in prescribed way
- have no logic of their own.

Inversion of Control (IoC)
--------------------------

IoC is a design principle where you don't get to dictate what components to aggregate.
Instead the required components are provided from outsite using existing policy or mechanism.
This leads to inversion of control in dicating which piece to use:
programmer is given a component to work with rather than hand picking a component by himself/herself.

Exercise 0: getting to know the code
------------------------------------

Open the CustomersRepository class in `model` directory.
Examine how it connects to the database.
Identify the potential problems when testing the code.

- PDO is created in place with hardcoded values
- the code dependans to database and db server
- requires maintaining live and test version of a database
- requires writing some switching code (not a functionality of the program itself)

Exercise 1: getting rid of database hardcoding
----------------------------------------------

**Objective:** to get the non-testable code to more testable state.

In class CustomersRepository there is some database connection hardcoding done.
Replace the hardcoding with PDO instance passed as constructor parameter.

Write a test for `fetchById` method and run `vendor/bin/phpunit`.
Expect them to fail due to MySQL server not running.

**Highlight:** This technique is called Dependency Injection. Most commonly used in constructors.

Exercise 2: mocking 101
-----------------------

**Objective:** to learn how mock objects

Refer to the PHPUnit documentation at https://phpunit.de/manual/current/en/test-doubles.html

In `CustomersRepositoryTest` create a mock object for PDO that shoud:
- expect one call of method `query`
- return another mock object for class PDOStatement

The PDOStatement mock should:
- expect one call of method `fetch`
- return value `["id" => 1, "name" => "John Doe", "email" => "johndoe@gmail.com"]`

Then create instance of `CustomersRepository` passing PDO mock in constructor and
call its `fetchById` method with parameter 1.

Exercise 3: refining expectations on mocks
------------------------------------------

Update the `CustomersRepositoryTest` to add the following expectations on call of method `query`:
- first parameter should be equal to `SELECT * FROM customers WHERE id = ? LIMIT 1`
- second paramter should be equal to 1

Try changing test values as well as expectations and see how PHPUnit report changes.
Try changing quentity of calls from `once` to `twice` or `never`.

Exercise 4: testing sequential expectations
-------------------------------------------
