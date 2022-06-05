# Rex Backend Dev Candidate - Data Sync Test

## Guidelines

* Read the whole read me first...
* We suggest you spend no more than a few hours on the test.
* Make sure to document your progress and decision-making in [this file](docs/test_progress.md)
* Prepare your work in a PR
* Once you've completed you work, please let us know so that we can review.
* If we've spoken to you about completing this test in a language other than PHP: 
  * Follow the guidelines below to seed the database and database_external sqlite stores.
  * Make an initial commit that bootstraps whatever framework you are using so we can easily
    see your work in subsequent commits. Provide a link to the framework in your documentation.
  * Complete the implementation of the syncing logic.
  * Provide clear instructions on how to run your code (assume no knowledge of tooling in question)
    * If installation of any supporting tools is required, please provide a Dockerfile containing the
      required runtime environment.

## Scenario Overview

The Good Forum (tm) is an API application built based on [Laravel 9](https://laravel.com/).

![Mockup of Forum Messages](resources/assets/img/mockup-forum-messages.png)

#### Sections

Sections contain topics. Each section breaks the forum up into logically grouped areas. Eg. the "Crypto" section.

#### Topics

Topics group together messages within a section.  An example topic in the "Crypto" section might be "I just mortgaged 
my house and now BTC is only worth 3k :scream:" (too real!).

#### Messages

Messages are created within a topic and may have a parent_id for nested relationships.

#### Users

Users are the entities within the system that can create messages, and topics.

## The problem

We need to be able to sync `sections`, `topics`, `messages`, and `users` in from external sources. To demonstrate
this issue the `composer dev-setup` command has seeded two sqlite databases.

- `database.sqlite` is the main application database
- `database_external.sqlite` represents an external data source that we do not control.

There will soon be many data sources coming in and we need a solution to keep our application database
up to date.

### The task

Create a new module to handle syncing data in from the `database_external.sqlite` database and ensure that
`database.sqlite` contains all data from `database_external.sqlite`.

We need a service that runs and scans the external data source and copies any detected changes back into the
main database.

For the purpose of the scenario, assume that `database_external.sqlite` is not a SQL data store but is instead
a RESTful API. To that end, please limit the complexity of the queries on the external database as well as the amount
of data you inspect at one time in accordance with the restrictions you might encounter with a RESTful API
(think about pagination, basic filtering etc).

Feel free to think about how the use of webhooks might assist with this but if you do consider webhooks, for the
purpose of this scenario, not every update is guaranteed to deliver a webhook notification.

You can make updates to the data schema as needed (new migrations) to support this task.

### Evaluation / what we're looking for

This test isn't designed to trip you up. 

We are looking to understand how you work in a real world scenario and are looking for production grade approaches
to code, documentation and review cycle. 

Specifically, and in no particular order, we'll be looking at:

- Documentation detailing
  - Planning / thought process (stream of consciousness):
    - What options you considered and why
    - How did you come to the final approach, why did you discard other
      options
  - Maintenance: Formal docs
    - How does someone contribute additional data sources
    - Architecture
  - Location of docs
    - Where you put your code relative to your docs and an explanation as to why
- Testing
  - Overall testability
  - Test plan
  - Some tests with test stubs and commentary for anything you don't have time to get to
- Architecture:
  - Use of patterns that would promote consistent implementation for additional external data sources
    of different types
  - Please do not use patterns for the sake of "pattern packing". Use them if they help and if you understand
    why you're adding them.
- Pull Request: Presented as you would normally present a PR for a new piece of functionality
- Ease of understanding
- Object-oriented programming

### Considerations

- What is the fastest way to stay in sync?
- How will the database stay up to date?
- Will this scale to millions of records?
- How do we know it is correct?

## Installation

### Requirements

- PHP 8 (with sqlite)

### Configure

```shell
# install dependencies
composer install

# setup for local dev
#  - copies .env
#  - generates app key
#  - prepares database
composer dev-setup
```

### Run tests

```bash
composer test
```

### Run application

```bash
php artisan serve
```
