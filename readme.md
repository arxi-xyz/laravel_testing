# Laravel Testing Roadmap with Exercises

This roadmap is designed for a mid-level Laravel developer aiming to master testing in Laravel, focusing on modern PHP
best practices, SOLID principles, and clean architecture. It progresses from foundational concepts to advanced
techniques, preparing you for professional environments. Each topic includes its importance, key concepts, a learning
goal, and a tailored exercise to reinforce the topic. Complete the exercises in order, and request feedback or hints
when needed. I create branch for each level of each phase so you can see the result as soon as possible.

## Phase 1: Foundations of Testing in Laravel

**Objective**: Build a strong understanding of testing fundamentals and Laravel’s testing ecosystem.

### 1. Introduction to Testing Concepts

- **Why**: Understand the purpose and value of testing to ensure code reliability, maintainability, and confidence in
  refactoring.
- **Topics to Cover**:
    - Types of tests (unit, feature, integration, end-to-end).
    - Differences between manual and automated testing.
    - Test-driven development (TDD) principles.
    - Laravel’s testing philosophy and built-in testing tools (PHPUnit, Laravel Test Suite).
- **Goal**: Grasp why testing is essential and how Laravel’s testing tools fit into the development workflow.
- **Exercise**: Create a markdown file for a fictional Laravel blog application. Document:
    - The purpose of unit, feature, integration, and end-to-end tests.
    - A specific example of each test type for the blog app (e.g., testing a slug generator, a post creation route, or a
      comment submission flow).
    - How TDD could be applied to develop a feature like post categorization.
    - Why automated testing benefits the blog app’s long-term maintenance.

### 2. Setting Up the Testing Environment

- **Why**: A properly configured environment ensures consistent and repeatable tests.
- **Topics to Cover**:
    - Installing and configuring PHPUnit in a Laravel project.
    - Understanding `phpunit.xml` configuration.
    - Setting up an in-memory SQLite database for testing.
    - Laravel’s `TestCase` class and `artisan test` command.
- **Goal**: Be able to set up and run a test suite in a Laravel project.
- **Exercise**: Initialize a new Laravel project and configure its testing environment. Your tasks:
    - Install PHPUnit and verify it runs with `php artisan test`.
    - Modify `phpunit.xml` to use an in-memory SQLite database.
    - Write a test to confirm the database connection is SQLite during testing.
    - Ensure the test suite runs without errors and document any setup challenges in a markdown file.

### 3. Writing Your First Tests

- **Why**: Hands-on practice with basic tests builds familiarity with Laravel’s testing syntax.
- **Topics to Cover**:
    - Writing basic unit tests for utility functions or helpers.
    - Writing feature tests for routes and controllers.
    - Using Laravel’s testing helpers (`get`, `post`, `assertStatus`, etc.).
    - Understanding assertions and their role in verifying behavior.
- **Goal**: Write and run simple tests that validate basic application behavior.
- **Exercise**: In your Laravel project, create a `/greet` route with a controller that returns a view displaying a
  customizable greeting message (e.g., "Hello, [Name]!"). Write:
    - A unit test for a helper function that formats the greeting (e.g., ensures proper capitalization).
    - A feature test to verify the `/greet` route returns a 200 status, renders the correct view, and displays the
      greeting.
    - Use at least three distinct assertions (e.g., `assertStatus`, `assertSee`, `assertViewHas`).

## Phase 2: Core Testing Techniques

**Objective**: Master the essentials of unit, feature, and integration testing in Laravel.

### 4. Unit Testing

- **Why**: Unit tests isolate and verify the behavior of individual components, ensuring modularity and reliability.
- **Topics to Cover**:
    - Testing pure PHP classes (e.g., services, repositories).
    - Mocking dependencies with Mockery or PHPUnit mocks.
    - Applying SOLID principles in unit tests (e.g., testing single responsibility).
    - Testing edge cases and failure scenarios.
- **Goal**: Write unit tests that isolate and verify specific functionality without external dependencies.
- **Exercise**: Create a `DiscountCalculator` service class that computes a discounted price based on a percentage and
  product price. Write unit tests to:
    - Verify discount calculations for various percentages (e.g., 0%, 25%, 100%).
    - Test edge cases (e.g., negative prices, invalid percentages).
    - Mock a `CurrencyConverter` dependency to isolate the calculator logic.
    - Ensure the class follows the Single Responsibility Principle.

### 5. Feature Testing

- **Why**: Feature tests verify that larger parts of the application (e.g., routes, controllers) work as expected.
- **Topics to Cover**:
    - Testing HTTP endpoints (GET, POST, PUT, DELETE).
    - Testing middleware and authentication.
    - Using Laravel’s `actingAs` for authenticated user testing.
    - Testing JSON APIs and response structures.
- **Goal**: Create feature tests that validate end-to-end behavior of application features.
- **Exercise**: Build a simple CRUD API for a `Task` model with routes for creating and listing tasks (`/tasks` GET and
  POST). Write feature tests to:
    - Verify the POST `/tasks` endpoint creates a task and returns a 201 status with correct JSON structure.
    - Test the GET `/tasks` endpoint returns a list of tasks in JSON format.
    - Test middleware that restricts access to authenticated users using `actingAs`.
    - Include at least one test for an unauthorized access scenario.

### 6. Integration Testing

- **Why**: Integration tests ensure that multiple components (e.g., database, services, controllers) work together
  correctly.
- **Topics to Cover**:
    - Testing database interactions with Laravel’s `RefreshDatabase` trait.
    - Testing Eloquent models and relationships.
    - Mocking external services (e.g., APIs, mailers).
    - Handling test data with factories and seeders.
- **Goal**: Write integration tests that verify interactions between components and the database.
- **Exercise**: Create a `Post` model with a `hasMany` relationship to a `Comment` model. Write integration tests to:
    - Verify that creating a post with comments saves both to the database using `RefreshDatabase`.
    - Test that retrieving a post includes its comments via the relationship.
    - Mock an external `NotificationService` that sends an email when a comment is added.
    - Use a factory to generate test data for posts and comments.

## Phase 3: Advanced Testing Practices

**Objective**: Deepen your testing skills with advanced techniques and real-world scenarios.

### 7. Test-Driven Development (TDD)

- **Why**: TDD promotes writing tests before implementation, leading to cleaner, more reliable code.
- **Topics to Cover**:
    - Red-Green-Refactor cycle.
    - Writing tests for new features before implementing them.
    - Applying TDD to Laravel controllers, services, and models.
    - Balancing TDD with development speed in real-world projects.
- **Goal**: Develop features using TDD, ensuring tests drive the implementation.
- **Exercise**: Use TDD to implement a `CategoryFilter` service that filters products by category. Your tasks:
    - Write failing tests for filtering products by a single category and multiple categories.
    - Implement the minimum code to pass the tests.
    - Refactor the service to ensure it’s clean and maintainable.
    - Write additional tests for edge cases (e.g., no products in a category, invalid category).

### 8. Testing Design Patterns

- **Why**: Testing code that follows design patterns (e.g., Repository, Service Layer) requires specific strategies to
  maintain clean architecture.
- **Topics to Cover**:
    - Testing repositories and service classes in isolation.
    - Mocking interfaces and dependencies.
    - Testing event listeners and observers.
    - Ensuring tests align with SOLID principles.
- **Goal**: Write tests for code that adheres to design patterns and clean architecture.
- **Exercise**: Implement a `UserRepository` interface and a concrete `EloquentUserRepository` class for user
  management. Write tests to:
    - Verify the repository’s `findByEmail` method returns a user or null.
    - Mock the repository interface in a service class that handles user registration.
    - Test an event listener that logs user creation events.
    - Ensure the repository adheres to the Interface Segregation Principle.

### 9. Testing Authentication and Authorization

- **Why**: Secure applications require robust testing of authentication and authorization logic.
- **Topics to Cover**:
    - Testing Laravel’s authentication (login, logout, registration).
    - Testing authorization (Gates, Policies, and middleware).
    - Handling edge cases like unauthorized access or expired tokens.
- **Goal**: Ensure authentication and authorization mechanisms are thoroughly tested.
- **Exercise**: Set up Laravel’s authentication system (e.g., using Breeze or Jetstream). Write tests to:
    - Verify successful and failed login attempts (e.g., wrong password).
    - Test a policy that restricts editing a `Post` to its owner.
    - Test a middleware that blocks unauthenticated users from accessing a protected route.
    - Include a test for an expired session or token scenario.

## Phase 4: Specialized Testing

**Objective**: Tackle advanced testing scenarios commonly encountered in professional Laravel projects.

### 10. Testing APIs

- **Why**: APIs are a critical part of modern applications, and testing ensures reliability and consistency.
- **Topics to Cover**:
    - Testing RESTful and GraphQL APIs.
    - Validating JSON response structures and status codes.
    - Testing API authentication (e.g., Sanctum, Passport, JWT).
    - Handling rate-limiting and throttling in tests.
- **Goal**: Write comprehensive tests for API endpoints, including authentication and error handling.
- **Exercise**: Build a RESTful API for managing `Orders` with endpoints for creating and retrieving orders. Write tests
  to:
    - Verify the POST `/orders` endpoint creates an order and returns the correct JSON structure.
    - Test the GET `/orders/{id}` endpoint for valid and invalid order IDs.
    - Test API authentication using Sanctum tokens.
    - Test rate-limiting behavior for the API.

### 11. Testing Asynchronous Processes

- **Why**: Asynchronous tasks (e.g., queues, events) are common in Laravel and require specific testing strategies.
- **Topics to Cover**:
    - Testing Laravel queues and jobs.
    - Testing event listeners and dispatched events.
    - Mocking queue behavior with `Queue::fake()`.
    - Testing scheduled tasks.
- **Goal**: Ensure asynchronous processes are reliable and testable.
- **Exercise**: Create a `SendWelcomeEmailJob` that sends an email to new users. Write tests to:
    - Verify the job dispatches correctly when a user is created.
    - Use `Queue::fake()` to ensure the job is queued without executing.
    - Test an event listener that triggers the job on user registration.
    - Test a scheduled task that cleans up failed jobs daily.

### 12. Testing Performance and Optimization

- **Why**: Performance testing ensures your application scales and performs well under load.
- **Topics to Cover**:
    - Measuring test execution time and optimizing slow tests.
    - Testing database queries for performance (e.g., avoiding N+1 issues).
    - Using Laravel’s `DB::shouldReceive` for query mocking.
    - Basic load testing concepts with tools like Laravel Dusk or external tools.
- **Goal**: Identify and address performance bottlenecks through testing.
- **Exercise**: Optimize a `ProductListController` that retrieves products with their categories. Write tests to:
    - Identify and fix an N+1 query issue when loading categories.
    - Mock database queries with `DB::shouldReceive` to simulate large datasets.
    - Measure test execution time and optimize a slow test (e.g., reduce database calls).
    - Write a test to ensure the endpoint responds within 200ms for 100 products.

## Phase 5: Real-World Testing and Best Practices

**Objective**: Prepare for professional environments by mastering testing workflows and tools.

### 13. Testing in Continuous Integration (CI)

- **Why**: CI pipelines ensure tests run automatically, maintaining code quality in team environments.
- **Topics to Cover**:
    - Setting up Laravel tests in CI systems (e.g., GitHub Actions, GitLab CI).
    - Running tests in parallel to reduce execution time.
    - Handling environment-specific configurations in CI.
    - Code coverage reporting and thresholds.
- **Goal**: Integrate tests into a CI pipeline and understand coverage metrics.
- **Exercise**: Set up a GitHub Actions workflow for your Laravel project. Your tasks:
    - Configure the workflow to run tests on push to the `main` branch.
    - Include parallel test execution for faster runs.
    - Generate a code coverage report and set a minimum threshold of 80%.
    - Document the setup process and any challenges in a markdown file.

### 14. Refactoring and Maintaining Tests

- **Why**: Well-maintained tests are critical for long-term project success and code evolution.
- **Topics to Cover**:
    - Refactoring tests for clarity and maintainability.
    - Avoiding test duplication and brittle tests.
    - Organizing test suites for large projects.
    - Updating tests during code refactoring.
- **Goal**: Write maintainable, reusable tests that evolve with the codebase.
- **Exercise**: Refactor an existing test suite for a `UserController` with duplicated test code. Your tasks:
    - Consolidate duplicated setup logic into a `setUp` method or custom trait.
    - Organize tests into subdirectories (e.g., `Tests/Feature/Users/`).
    - Refactor a brittle test that fails on minor view changes to be more robust.
    - Update tests to accommodate a new `User` model field without breaking existing tests.

### 15. Browser and End-to-End Testing

- **Why**: End-to-end tests simulate real user interactions, ensuring the application works as expected.
- **Topics to Cover**:
    - Using Laravel Dusk for browser testing.
    - Testing JavaScript-heavy applications.
    - Testing user flows (e.g., registration, checkout).
    - Handling flaky tests in browser automation.
- **Goal**: Create robust end-to-end tests for critical user journeys.
- **Exercise**: Use Laravel Dusk to test a user registration flow in your Laravel project. Write tests to:
    - Simulate a user registering with valid data and verify they are redirected to a dashboard.
    - Test a failed registration due to invalid input (e.g., missing password).
    - Test a JavaScript-dependent feature, like a dynamic form field.
    - Mitigate flakiness by adding appropriate waits or retries.

## Phase 6: Mastery and Specialization

**Objective**: Achieve mastery by applying testing in complex, real-world scenarios and exploring advanced tools.

### 16. Testing Microservices and Distributed Systems

- **Why**: Modern Laravel applications may interact with microservices, requiring specialized testing strategies.
- **Topics to Cover**:
    - Testing API integrations with external services.
    - Mocking third-party APIs and handling failures.
    - Testing event-driven architectures (e.g., Laravel with Kafka or RabbitMQ).
    - Contract testing for microservices.
- **Goal**: Test interactions between Laravel and external systems reliably.
- **Exercise**: Build a Laravel service that fetches user data from a mock external API. Write tests to:
    - Verify the service handles successful API responses.
    - Mock the external API to simulate failures (e.g., 500 errors).
    - Test an event-driven flow where user data updates trigger a Kafka event (mock the Kafka interaction).
    - Implement a simple contract test to ensure the API response structure is consistent.

### 17. Advanced Mocking and Stubbing

- **Why**: Advanced mocking techniques allow testing complex systems without relying on external dependencies.
- **Topics to Cover**:
    - Using Mockery for advanced mocking scenarios.
    - Stubbing HTTP clients and external services.
    - Testing complex dependency chains.
    - Mocking time and date in tests.
- **Goal**: Master mocking to isolate and test complex logic.
- **Exercise**: Create a `PaymentProcessor` service that interacts with a third-party payment gateway. Write tests to:
    - Mock the payment gateway’s HTTP client to simulate successful and failed payments.
    - Test a chain of dependencies (e.g., `PaymentProcessor` -> `TransactionLogger` -> `Database`).
    - Mock the system clock to test time-sensitive logic (e.g., payment expiration).
    - Use Mockery to create partial mocks for complex scenarios.

### 18. Behavior-Driven Development (BDD)

- **Why**: BDD aligns testing with business requirements, improving collaboration with non-technical stakeholders.
- **Topics to Cover**:
    - Introduction to Behat or similar BDD tools in Laravel.
    - Writing feature files with Gherkin syntax.
    - Mapping business requirements to tests.
    - Integrating BDD with Laravel’s testing suite.
- **Goal**: Write tests that reflect business requirements and are understandable by non-technical stakeholders.
- **Exercise**: Install Behat in your Laravel project and create a feature for a shopping cart. Your tasks:
    - Write a Gherkin feature file describing a user adding items to a cart and checking out.
    - Map the Gherkin steps to PHP test code using Behat.
    - Integrate the BDD tests with Laravel’s existing test suite.
    - Write a test to verify the cart total updates correctly when items are added or removed.

## Resources

- [Pest](https://pestphp.com/docs/installation)
- Phase 1
  - [Software Testing](https://medium.com/@suraif16/types-of-software-testing-e61d1441f07f)
  - [What is TDD](https://medium.com/javascript-scene/tdd-changed-my-life-5af0ce099f80)
