# C# Study Plan

## Progress
- [x] Foundation Session 1 — Language Tour & Type System
- [x] Foundation Session 2 — Control Flow, Methods & Modern Syntax
- [x] Foundation Session 3 — Object-Oriented C#
- [x] Foundation Session 4 — Collections, Generics & Nullable Reference Types
- [ ] Theory Sprint Block 1 — Backend C# Mental Model, ASP.NET Core, DI, Middleware
- [ ] Theory Sprint Block 2 — EF Core, LINQ-for-Data, Migrations, Transactions
- [ ] Theory Sprint Block 3 — Mediator Pattern, CQRS-style Flow, Validation
- [ ] Theory Sprint Block 4 — GraphQL, OpenAPI, Scalar, API Contracts
- [ ] Theory Sprint Wrap-up — Architecture Map & Review Notes

Source topics to cover from the referenced C# stack:
- ASP.NET Core
- EF Core
- Mediator
- GraphQL
- OpenAPI / Scalar

Constraint for the next pass:
- Available time: about 4-5 hours
- Goal: read theory and build mental models
- No coding required in this sprint

---

## Completed Foundation — C# Language Basics

### Foundation Session 1 — Language Tour & Type System ✓

**Concepts learned:**
- **CLR/runtime model** — `.cs` compiles to IL (Intermediate Language), CLR JIT-compiles IL to native machine code per method on first call. CLR handles garbage collection, type safety, exception handling, and assembly loading. Native AOT compiles to a native binary ahead of time — faster startup, no runtime required on target, but one binary per platform and limited reflection.
- **Value types vs reference types** — value types (`int`, `struct`, `enum`) hold data directly and are fully copied on assignment. Reference types (`class`, `string`, arrays) hold a reference to heap data; assignment copies the reference, both variables share the same object.
- **Primitives & `var`** — `double` is binary floating point (imprecise), `decimal` stores base-10 exactly (use for money). `var` infers the type at compile time — still statically typed, type cannot change. `int?` (`Nullable<int>`) lets a value type hold `null` to represent absent values.
- **Strings** — immutable: every "modification" returns a new string, original is untouched. Use `$"{var}"` for interpolation. Use `StringBuilder` when building strings in loops to avoid repeated allocations.

**Goal:** Understand C#'s static, strongly-typed nature and the value/reference split.

**Resources:**
- [A tour of C#](https://learn.microsoft.com/en-us/dotnet/csharp/tour-of-csharp/)
- [.NET CLI overview](https://learn.microsoft.com/en-us/dotnet/core/tools/)

---

### Foundation Session 2 — Control Flow, Methods & Modern Syntax ✓

**Concepts learned:**
- **Methods** — arguments pass by value by default. `ref` = read and modify by reference; `out` = method must assign before returning; `in` = read-only reference. Optional parameters have defaults (`int port = 8080`); named arguments use `:` at the call site (`useTls: true`). Overloads share a name but differ in parameter count/types — return type alone does not distinguish overloads. `=>` replaces braces and `return` for single-expression members; computed properties (`public double Area => ...`) recalculate on every read.
- **`switch` expression & pattern matching** — produces a value, arms tested top to bottom, `_` is the discard/default. Type patterns (`is Circle c`), property patterns (`{ Country: "US" }`), relational patterns (`< 0`, `>= 0 and < 50`), and `when` guards for extra conditions. Non-exhaustive expressions throw at runtime — always include `_`.
- **Exceptions & resources** — `try`/`catch`/`finally`: `finally` always runs regardless of outcome. `IDisposable` is the interface for types holding external resources; `using` (statement or declaration) guarantees `Dispose()` is called even when exceptions propagate — compiles to `try`/`finally` internally.
- **`namespace`, `using` directives, access modifiers** — `namespace` groups types by fully-qualified name; `using` directives (top of file) import namespaces for short names. Access modifiers: `public` (everyone), `private` (same class only), `internal` (same assembly), `protected` (class + derived). No modifier defaults to `private` for members and `internal` for top-level types.

**Goal:** Write clean methods and understand idiomatic modern C# syntax.

**Resources:**
- [C# fundamentals tutorials](https://learn.microsoft.com/en-us/dotnet/csharp/tour-of-csharp/tutorials/)
- [Pattern matching](https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/functional/pattern-matching)

---

### Foundation Session 3 — Object-Oriented C# ✓

**Concepts learned:**
- **Classes** — fields (private `_field` convention), constructors, `this(...)` chaining, primary constructors (C# 12), auto-properties, explicit `get`/`set`, `init`-only setters. The compiler's free parameterless constructor disappears the moment you write any constructor yourself.
- **`record` types** — reference type with compiler-generated value equality, `ToString()`, and deconstruction. Positional syntax (`record Point(int X, int Y)`) auto-generates init-only properties. `with` expressions produce a modified copy without mutating the original. Use `record` when identical contents means the same thing; use `class` when identity matters.
- **Inheritance** — `: BaseClass` syntax; `base(...)` to call the base constructor (required when the base has no parameterless constructor). `virtual`/`override` enables polymorphism — the runtime picks the method based on the actual object, not the variable's declared type. Without `virtual`/`override` you get method hiding, not polymorphism. `abstract` class cannot be instantiated; `abstract` method has no body and forces derived classes to override. `sealed` prevents further inheritance or overriding. `protected` is visible to the class and its descendants only.
- **Interfaces** — a contract with no state and no implementation (by default). A class can inherit one base class but implement any number of interfaces. Decouples callers from concrete types, enabling testability and dependency injection. Explicit interface implementation (`IFoo.Method()`) hides the member from the class's public surface; accessible only through the interface type.
- **`static`** — belongs to the type, not any instance; accessed via the type name. Static methods cannot access instance fields or `this`. Static classes cannot be instantiated or inherited. Static constructors run once automatically on first use of the type. Pitfalls: mutable static state is global and hard to test; prefer static for pure functions and constants.

**Goal:** Model a domain with classes, records, and interfaces.

**Resources:**
- [Object-oriented programming in C#](https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/object-oriented/)
- [Records](https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/types/records)

---

### Foundation Session 4 — Collections, Generics & Nullable Reference Types ✓

**Concepts learned:**
- **Arrays** — fixed-size, zero-indexed. Default value for reference type arrays is `null`, not `0`. `int[,]` is a single contiguous object (rectangular); `int[][]` is an array of independent array objects (rows can differ in length). `Length` property (not `Count`).
- **`List<T>`** — dynamically resizable, backed by an array internally. `Add`, `AddRange`, `Remove(value)`, `RemoveAt(index)`, `Contains`, `IndexOf`, `Count`, `Clear`. Use array when size is fixed and known; use `List<T>` when size changes at runtime.
- **`Dictionary<TKey,TValue>`** — O(1) average key lookup. Indexer `[]` is an upsert; `Add` throws if key exists. Reading a missing key throws `KeyNotFoundException` — use `TryGetValue` for safe lookup. Iteration order not guaranteed.
- **`HashSet<T>`** — unique values, O(1) membership tests. `Add` returns `bool` (false if already present — use this to detect duplicates). `UnionWith`, `IntersectWith`, `ExceptWith` mutate the receiver in place.
- **Generics** — type parameters (`<T>`) give type safety without casting or boxing. Compiler infers `T` from arguments. `default` gives the zero value for any `T`. Constraints: `where T : class`, `where T : struct`, `where T : new()`, `where T : SomeInterface`.
- **`IEnumerable<T>` and `yield return`** — accept `IEnumerable<T>` when you only need forward iteration. `foreach` compiles to `GetEnumerator`/`MoveNext`/`Current`. `yield return` produces items lazily — the method body runs only when iterated, not when called.
- **Nullable Reference Types** — `string` = non-nullable (compiler warns on null assignment); `string?` = explicitly nullable. Compile-time only — `string?` and `string` are the same type at runtime. `?.`, `??`, `??=`, and `!` are null-handling tools.

**Goal:** Comfortably use everyday data structures and understand nullability warnings.

**Resources:**
- [Generics](https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/types/generics)
- [Nullable reference types](https://learn.microsoft.com/en-us/dotnet/csharp/nullable-references)

---

# 4-5 Hour Theory-Only C# Backend Sprint

## Sprint Goal

Build enough theory to recognize how a modern C# backend is structured:

Request comes in → ASP.NET Core routes it → middleware and filters participate → controller/minimal endpoint calls application logic → Mediator may dispatch a request/command/query → EF Core loads or saves data → API contract is exposed through OpenAPI/Scalar and/or GraphQL.

This sprint is for reading and mental models only. Do not stop to build a project unless you finish early.

---

## Block 0 — Orientation and Prerequisite Refresh (20-30 min)

**Read for:** the minimum language/runtime concepts needed for backend theory.

**Topics:**
- `Task` / `Task<T>` and why web/data APIs are usually asynchronous
- LINQ basics: `Where`, `Select`, `FirstOrDefault`, `Any`, `ToList`
- Dependency Injection vocabulary: service, implementation, container, lifetime
- Configuration and logging vocabulary

**Resources:**
- [Asynchronous programming with async and await](https://learn.microsoft.com/en-us/dotnet/csharp/asynchronous-programming/)
- [LINQ in C#](https://learn.microsoft.com/en-us/dotnet/csharp/linq/)
- [Dependency injection in .NET](https://learn.microsoft.com/en-us/dotnet/core/extensions/dependency-injection)

**Checkpoint notes to write:**
- What is a `Task<T>`?
- What does DI solve?
- Why does LINQ appear in both collection code and EF Core queries?

---

## Block 1 — ASP.NET Core Mental Model (60-75 min)

**Main idea:** ASP.NET Core is the web framework. It receives HTTP requests, builds a request pipeline, routes requests to handlers, and sends HTTP responses.

**Read for these concepts, not syntax memorization:**
- Minimal APIs vs controllers
- Routing: path, HTTP method, route parameters
- Middleware pipeline: order matters
- Model binding and validation
- Dependency injection in request handlers/controllers
- Configuration through `appsettings.json` and environment variables
- Logging with `ILogger<T>`
- Error handling and status codes

**Resources:**
- [ASP.NET Core fundamentals overview](https://learn.microsoft.com/en-us/aspnet/core/fundamentals/)
- [ASP.NET Core middleware](https://learn.microsoft.com/en-us/aspnet/core/fundamentals/middleware/)
- [Routing in ASP.NET Core](https://learn.microsoft.com/en-us/aspnet/core/fundamentals/routing)
- [Minimal APIs overview](https://learn.microsoft.com/en-us/aspnet/core/fundamentals/minimal-apis/overview)

**What to capture in notes:**
- Draw the request pipeline in 5-7 steps.
- Explain why middleware order matters.
- List what belongs in an endpoint and what should be delegated to services.

---

## Block 2 — EF Core: Data Access Theory (60-75 min)

**Main idea:** EF Core maps C# objects to database tables and lets you express many database queries through LINQ.

**Read for these concepts:**
- `DbContext` as the unit-of-work/session object
- Entity classes and relationships
- `DbSet<T>` as the entry point for querying a table-like set
- LINQ queries and deferred execution
- Change tracking: EF remembers loaded/attached entities and generates updates
- Migrations: versioned database schema changes
- Eager loading with `Include`
- Transactions at a conceptual level
- Common performance ideas: N+1 queries, projections, tracking vs no-tracking

**Resources:**
- [EF Core overview](https://learn.microsoft.com/en-us/ef/core/)
- [DbContext lifetime, configuration, and initialization](https://learn.microsoft.com/en-us/ef/core/dbcontext-configuration/)
- [Querying data](https://learn.microsoft.com/en-us/ef/core/querying/)
- [Saving data](https://learn.microsoft.com/en-us/ef/core/saving/)
- [Migrations overview](https://learn.microsoft.com/en-us/ef/core/managing-schemas/migrations/)

**What to capture in notes:**
- What is the job of `DbContext`?
- What is the difference between changing an object in memory and saving changes to the database?
- Why can a LINQ query against EF Core become SQL?

---

## Block 3 — Mediator Pattern and Application Flow (45-60 min)

**Main idea:** A mediator library helps route requests/commands/queries to handlers, so controllers/endpoints stay thin and application logic has a consistent shape.

The gist says "Mediator". In .NET projects this often means one of these libraries/patterns:
- [MediatR](https://github.com/jbogard/MediatR)
- [Mediator](https://github.com/martinothamar/Mediator)
- the mediator pattern in general

**Read for these concepts:**
- Request/response object
- Command vs query naming convention
- Handler class
- Pipeline behaviors: validation, logging, transactions, authorization-style checks
- Why teams use mediator: separation of endpoint layer from application layer
- Tradeoff: can add indirection if overused

**Resources:**
- [Mediator pattern overview](https://refactoring.guru/design-patterns/mediator)
- [MediatR GitHub README](https://github.com/jbogard/MediatR)
- [Mediator GitHub README](https://github.com/martinothamar/Mediator)

**What to capture in notes:**
- What problem does mediator solve in a backend app?
- What is a handler responsible for?
- What logic should not remain inside a controller if mediator is used?

---

## Block 4 — API Contracts: OpenAPI, Scalar, and GraphQL (60-75 min)

**Main idea:** Backend APIs need a contract. OpenAPI describes HTTP/REST-style endpoints. Scalar is a modern UI for reading/testing an OpenAPI document. GraphQL exposes a schema where clients request exactly the fields they need.

### OpenAPI / Scalar

**Read for these concepts:**
- OpenAPI document as machine-readable API contract
- Endpoints, operations, request bodies, response schemas, status codes
- Swagger vs OpenAPI naming
- Scalar as API reference/testing UI for an OpenAPI document
- Why contract quality matters for frontend/backend collaboration

**Resources:**
- [OpenAPI Specification: What is OpenAPI?](https://spec.openapis.org/oas/latest.html)
- [ASP.NET Core OpenAPI support](https://learn.microsoft.com/en-us/aspnet/core/fundamentals/openapi/overview)
- [Scalar documentation](https://guides.scalar.com/scalar/scalar-api-references/overview)

### GraphQL

**Read for these concepts:**
- Schema, object type, field, query, mutation
- Resolver
- Variables
- Strongly typed API schema
- Difference between query shape and response shape
- Common backend concern: avoiding inefficient resolver/data-loading behavior
- Popular .NET GraphQL library: Hot Chocolate

**Resources:**
- [GraphQL Learn](https://graphql.org/learn/)
- [Hot Chocolate GraphQL for .NET](https://chillicream.com/docs/hotchocolate)

**What to capture in notes:**
- What does OpenAPI describe?
- What is Scalar's role?
- What is a GraphQL resolver?
- When looking at an API, how can you tell whether it is OpenAPI/REST-style or GraphQL-style?

---

## Wrap-up — Architecture Map and Memory Check (20-30 min)

Create one page of notes with this shape:

```text
C# backend map

HTTP request:
1. ASP.NET Core receives request
2. Middleware pipeline runs
3. Routing selects endpoint/controller action
4. Endpoint validates/binds input
5. Application layer handles use case
6. Mediator may dispatch command/query to handler
7. EF Core may query/save database data
8. Response returned
9. OpenAPI/Scalar or GraphQL describes how clients interact with API
```

Then answer these without looking:

1. What is ASP.NET Core responsible for?
2. What is EF Core responsible for?
3. What does a mediator handler do?
4. What does OpenAPI describe?
5. What does Scalar add on top of OpenAPI?
6. What is the basic idea of GraphQL?

If any answer feels unclear, reread only that block instead of expanding into new topics.

---

## If There Is Extra Time

Only after the full theory sprint:

1. Read about authentication/authorization in ASP.NET Core.
   - [Authentication overview](https://learn.microsoft.com/en-us/aspnet/core/security/authentication/)
   - [Authorization overview](https://learn.microsoft.com/en-us/aspnet/core/security/authorization/introduction)

2. Read about testing ASP.NET Core apps.
   - [Integration tests in ASP.NET Core](https://learn.microsoft.com/en-us/aspnet/core/test/integration-tests)

3. Read about background services.
   - [Worker services in .NET](https://learn.microsoft.com/en-us/dotnet/core/extensions/workers)

---

## General Study Notes

- For this sprint, reading is enough. Do not code unless you explicitly decide to extend the plan later.
- Write short notes after each block: 3 bullets for what clicked, 1 bullet for what remains unclear.
- Prefer official docs first. Use blog posts only when the official docs feel too reference-like.
- Do not compare C# with Python unless explicitly requested.
- Main reference: [learn.microsoft.com/dotnet/csharp](https://learn.microsoft.com/en-us/dotnet/csharp/)
