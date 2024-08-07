# Thrive Cart : Acme Widget Co Sales System

This project is a proof of concept for the sales system of Acme Widget Co. (Coding Challenge)

## Requirements

- PHP 8.1
- Composer
- Docker
- Docker Compose

## Installation

1. Clone the repository.
2. Run `composer install`.

## Running Tests

You can run the tests using Docker:

```sh
docker-compose up
```

## Assumptions

1. Delivery rules are based on the total basket price before applying offers.
2. Special offers are applied before delivery charges are calculated.
3. The "buy one red widget, get the second half price" offer only applies to red widgets and only if an even number of red widgets are purchased.

## Code Structure

- `src/` contains the source code.
- `tests/` contains the unit tests.
- `docker/` contains the Docker configuration.

## Contact

For any questions, please contact me at wquadrillion@gmail.com.
```
This comprehensive implementation includes all the necessary classes and tests for the basket system with the required functionalities. Each class has been designed to ensure clean code and proper separation of concerns, while the tests provide coverage for each aspect of the functionality.

This implementation plan outlines the project structure, provides sample code for core functionality, includes Docker configuration and assumptions. The provided code may need adjustments based on specific requirements or constraints.