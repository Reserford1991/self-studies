# 16-Hour C# Study Plan

## Progress
- [x] Session 1 — Language Tour & Type System
- [x] Session 2 — Control Flow, Methods & Modern Syntax
- [x] Session 3 — Object-Oriented C#
- [ ] Session 4 — Collections, Generics & Nullable Reference Types
- [ ] Session 5 — LINQ
- [ ] Session 6 — async/await
- [ ] Session 7 — Project Structure, DI & Configuration
- [ ] Session 8 — Build Something Real

---

## Day 1 — Fundamentals (8h)

### Session 1 — Language Tour & Type System (2h) ✓

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

### Session 2 — Control Flow, Methods & Modern Syntax (2h) ✓

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

### Session 3 — Object-Oriented C# (2h) ✓

**Concepts learned:**
- **Classes** — fields (private `_field` convention), constructors, `this(...)` chaining, primary constructors (C# 12), auto-properties, explicit `get`/`set`, `init`-only setters. The compiler's free parameterless constructor disappears the moment you write any constructor yourself.
- **`record` types** — reference type with compiler-generated value equality, `ToString()`, and deconstruction. Positional syntax (`record Point(int X, int Y)`) auto-generates init-only properties. `with` expressions produce a modified copy without mutating the original. Use `record` when identical contents means the same thing; use `class` when identity matters.
- **Inheritance** — `: BaseClass` syntax; `base(...)` to call the base constructor (required when the base has no parameterless constructor). `virtual`/`override` enables polymorphism — the runtime picks the method based on the actual object, not the variable's declared type. Without `virtual`/`override` you get method hiding, not polymorphism. `abstract` class cannot be instantiated; `abstract` method has no body and forces derived classes to override. `sealed` prevents further inheritance or overriding. `protected` is visible to the class and its descendants only.
- **Interfaces** — a contract with no state and no implementation (by default). A class can inherit one base class but implement any number of interfaces. Decouples callers from concrete types, enabling testability and dependency injection (covered fully in Session 7). Explicit interface implementation (`IFoo.Method()`) hides the member from the class's public surface; accessible only through the interface type.
- **`static`** — belongs to the type, not any instance; accessed via the type name. Static methods cannot access instance fields or `this`. Static classes cannot be instantiated or inherited. Static constructors run once automatically on first use of the type. Pitfalls: mutable static state is global and hard to test; prefer static for pure functions and constants.

**Goal:** Model a domain with classes, records, and interfaces.

**Resources:**
- [Object-oriented programming in C#](https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/object-oriented/)
- [Records](https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/types/records)

---

### Session 4 — Collections, Generics & Nullable Reference Types (2h)
- Core collections: `List<T>`, `Dictionary<TKey,TValue>`, `HashSet<T>`, arrays
- Generics: generic methods and classes, basic constraints (`where T : ...`)
- `IEnumerable<T>` and `yield return`
- Nullable reference types (`string?` vs `string`)

**Goal:** Comfortably use everyday data structures and understand nullability warnings.

**Resources:**
- [Generics](https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/types/generics)
- [Nullable reference types](https://learn.microsoft.com/en-us/dotnet/csharp/nullable-references)

---

## Day 2 — Productive Intermediate C# (8h)

### Session 5 — LINQ (2h)
- Method syntax: `Where`, `Select`, `OrderBy`, `GroupBy`, `First`/`FirstOrDefault`, `Any`/`All`, `Sum`/`Count`, `ToList`
- Deferred (lazy) execution
- `SelectMany`, projection into anonymous types and records

**Goal:** Manipulate collections fluently — LINQ is everywhere in C# and EF Core.

**Resources:**
- [LINQ overview](https://learn.microsoft.com/en-us/dotnet/csharp/linq/)
- [101 LINQ Samples](https://learn.microsoft.com/en-us/samples/dotnet/try-samples/101-linq-samples/)

---

### Session 6 — async/await (2h)
- `Task` and `Task<T>`, `async`/`await`, `await Task.WhenAll(...)`
- Why async exists (I/O-bound scalability) and the "async all the way" rule
- `CancellationToken` basics
- Common pitfalls: `.Result`/`.Wait()` (deadlocks), `async void`

**Goal:** Write and reason about async code — nearly all modern .NET I/O APIs are async-only.

**Resources:**
- [Asynchronous programming with async/await](https://learn.microsoft.com/en-us/dotnet/csharp/asynchronous-programming/)

---

### Session 7 — Project Structure, DI & Configuration (2h)
- Solutions vs projects, NuGet package management (`dotnet add package`)
- DI container: `IServiceCollection`, service lifetimes (`Singleton`, `Scoped`, `Transient`)
- Configuration: `appsettings.json`, the options pattern, environment-based config
- The generic host / `Program.cs` minimal-hosting model
- Logging with `ILogger<T>`

**Goal:** Understand how a real .NET application is wired together.

**Resources:**
- [Dependency injection in .NET](https://learn.microsoft.com/en-us/dotnet/core/extensions/dependency-injection)
- [Configuration in .NET](https://learn.microsoft.com/en-us/dotnet/core/extensions/configuration)

---

### Session 8 — Build Something Real (2h)
Pick the slice that matches your upcoming project:

- **Web/API project:** Build a minimal ASP.NET Core Web API — endpoints, record DTOs, an injected service
  - [Minimal APIs tutorial](https://learn.microsoft.com/en-us/aspnet/core/tutorials/min-web-api)
- **Data-heavy project:** EF Core walkthrough — `DbContext`, entity, migration, LINQ query
  - [EF Core getting started](https://learn.microsoft.com/en-us/ef/core/get-started/overview/first-app)
- **Console/worker/library:** Worker service or CLI tool using DI, config, logging, and NuGet

**Goal:** Integrate everything from sessions 1–7 into one running app.

**Also:** Write a basic xUnit test — `[Fact]`, `Assert`, `dotnet test`.

---

## General Notes
- Type the code, don't just read it
- Keep one scratch console project open (`dotnet new console`) throughout
- After each session, write 3 lines: what clicked, what didn't
- Session 8 is the most important — don't skip it
- Main reference: [learn.microsoft.com/dotnet/csharp](https://learn.microsoft.com/en-us/dotnet/csharp/)
- **Do not compare C# with Python** — teach C# on its own terms
