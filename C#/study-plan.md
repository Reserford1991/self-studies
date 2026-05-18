# 16-Hour C# Study Plan

## Progress
- [x] Session 1 — Language Tour & Type System
- [ ] Session 2 — Control Flow, Methods & Modern Syntax
- [ ] Session 3 — Object-Oriented C#
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

### Session 2 — Control Flow, Methods & Modern Syntax (2h)
- Methods: parameters, `ref`/`out`/`in`, optional and named arguments, overloading, expression-bodied members (`=>`)
- Control flow: modern `switch` expression and pattern matching (`is`, `when`, property patterns)
- Exceptions: `try`/`catch`/`finally`, `using` statement and `IDisposable`
- `namespace`, `using` directives, access modifiers (`public`, `private`, `internal`, `protected`)

**Goal:** Write clean methods and understand idiomatic modern C# syntax.

**Resources:**
- [C# fundamentals tutorials](https://learn.microsoft.com/en-us/dotnet/csharp/tour-of-csharp/tutorials/)
- [Pattern matching](https://learn.microsoft.com/en-us/dotnet/csharp/fundamentals/functional/pattern-matching)

---

### Session 3 — Object-Oriented C# (2h)
- Classes, constructors, properties (auto-properties, `get`/`set`, `init`-only)
- `record` types — immutable data carriers with value equality
- Inheritance, `abstract`, `virtual`/`override`, `sealed`
- Interfaces — backbone of C# design and dependency injection
- `static` members and classes

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
