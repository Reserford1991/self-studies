import hashlib
from argon2 import PasswordHasher

print("1 Avalanche effect (SHA-256):")
# 1) Avalanche effect (SHA-256):
# Compute SHA-256 of password1 and password2. How different are the digests?
password1_1 = "password1"
password2_1 = "password2"
password1_1_sha256_digest = hashlib.sha256(
    password1_1.encode("utf-8")).hexdigest()
password2_1_sha256_digest = hashlib.sha256(
    password2_1.encode("utf-8")).hexdigest()
print(password1_1_sha256_digest)
print(password2_1_sha256_digest)
print("Digests are completely different.")
print()

print("2 Salted KDF record:")
# 2) Salted KDF record:
# Design a storage string for a user’s password using Argon2id with t=3, m=65536,
# p=1, a 16-byte random salt, and produce an example record.

# 16-byte random salt is included by default
ph_2 = PasswordHasher(time_cost=3, memory_cost=65536, parallelism=1)
hash_2 = ph_2.hash('password_2')
print(hash_2)
print()

print("3 Timing-safe compare:")
# 3) Timing-safe compare:
# Why is == unsafe for comparing secret hashes? Show the constant-time call you’d use.
print("== may leak timing info. Use constant-time:")
print("hmac.compare_digest(a, b)")
print()

print("4")
# 4) Pepper concept:

# Where do you store a pepper, and what risk does it mitigate vs salt?
print("Pepper = server-secret added (e.g., HSM/env var).")
print("Mitigates DB exfiltration: stolen hashes+salts still need the pepper.")
print()

print("5")
# 5) Migration plan:
# You currently store PBKDF2-HMAC-SHA256 with 100k iterations. Describe a zero-downtime plan to migrate to Argon2id.
print("""
Phase 1 — Plan & Prepare
    • Pick Argon2id parameters that cost ~100–250 ms per hash on prod hardware (e.g., memory 64–128 MiB, time 2–4, parallelism 1–2). Benchmark first.
    • Confirm storage: password column length OK (Argon2id strings fit in 255 chars). Keep legacy salt/iteration columns for now.
    • Risk controls: database backup, feature flag for “dual-verify,” and error/latency dashboards ready.

Phase 2 — Dual Support Rollout
    • Set Argon2id as the default for new hashes (new users, password resets/changes).
    • Keep PBKDF2 verification in place alongside Argon2id:
        – On login: detect hash type → verify with the matching algorithm.
        – If PBKDF2 verification succeeds → rehash immediately to Argon2id and save.
    • Preserve pepper usage (if any) for legacy verification; decide whether to keep or drop pepper for new Argon2id.

Phase 3 — Progressive Migration
    • Users silently migrate as they log in or change passwords.
    • For long-tail accounts that rarely log in:
        – Opportunistic rehash on token refresh, sensitive actions, or email prompts nudging a re-login.
        – Optionally, a background job can mark old hashes for attention (no plaintext available, just for reporting).

Phase 4 — Observability & Guardrails
    • Metrics: count % of accounts on Argon2id vs PBKDF2 daily.
    • Alarms: auth error rate, average hash time, and CPU/memory pressure (Argon2id is memory-hard).
    • Rate limiting stays on; Argon2id increases per-attempt cost—watch DoS exposure.

Phase 5 — Clean-up
    • When >99% migrated (or after a defined window, e.g., 60–90 days):
        – Disable PBKDF2 verification behind the feature flag.
        – Drop legacy columns (salt/iterations) and retire any PBKDF2 pepper.
        – Update internal docs/runbooks to “Argon2id-only.”

Phase 6 — Post-Migration Hardening
    • Re-benchmark periodically; adjust Argon2id params upward over time as hardware improves.
    • Ensure password reset and registration paths always produce Argon2id with your current parameters.
    • Document an emergency rollback (re-enable dual-verify flag) if needed.

Communication & Compliance
    • This change is transparent to users; no mass password reset.
    • Brief the team (support/ops) about expected logs/metrics and the migration window.

That’s the whole roadmap—safe, incremental, and reversible without downtime.
""")
print()

print("6")
# 6) HMAC vs hash:
# What problem does HMAC-SHA256 solve that plain SHA-256 does not? Give a one-line example call in Python.
print("""
HMAC-SHA256 solves a problem plain SHA-256 does not:

	•	SHA-256 alone is just a hash function — it can prove data integrity but not authenticity. Anyone can recompute sha256(message).

	•	HMAC (Hash-based Message Authentication Code) with SHA-256 combines a secret key with the message before hashing. That way, only someone with the secret key can generate or verify the correct code.

	•	This protects against attackers who might tamper with the message and recompute a plain hash.

Here is Python code example:

import hmac, hashlib; print(hmac.new(b"secret-key", b"important message", hashlib.sha256).hexdigest())
""")
print()

print("7")
# 7) Parameter tuning:
# On your server, you can afford ~200ms for password hashing. Explain how you’d choose Argon2id parameters.
print("""
1) Ground rules (kept constant)
	•	Variant: Argon2id (resists GPU & side-channel attacks; the modern default).
	•	Salt: 16 bytes random (per-hash, cryptographically secure).
	•	Hash length: 32 bytes (or 64 if you want a longer tag).
	•	Parallelism (p): 1–2 for web logins. (Higher p = more CPU and memory; start with 1 unless you have spare cores and tight latency SLOs.)
	•	Rate limiting & lockouts stay in place (Argon2id raises per-attempt cost).

2) Tune memory first, then time

You want to be memory-hard before you crank time:
	1.	Pick a memory_cost (m) target your boxes can handle under peak login load:
	•	Start at 128 MiB (good baseline).
	•	If your fleet has headroom, try 192–256 MiB.
	•	If memory is tight, don’t go below 64 MiB unless you must.
	2.	With p fixed (1–2) and your chosen m, increase time_cost (t) until the median hashing time ≈200 ms on production-like hardware.
	•	Typical landing spots: t = 2–4.

A common, good outcome on modern servers: Argon2id(m=128 MiB, t=3, p=1) ≈ 180–230 ms.
But measure on your boxes—don’t copy blindly.

3) Benchmark loop (quick scripts)

import time
from argon2.low_level import hash_secret, Type

pwd = b"benchmark-password"
salt = b"A"*16  # fixed for repeatability during tuning ONLY

def run(m_kib, t, p):
    t0 = time.perf_counter()
    hash_secret(pwd, salt, time_cost=t, memory_cost=m_kib, parallelism=p,
                hash_len=32, type=Type.ID)
    return (time.perf_counter() - t0) * 1000

for m in [65536, 131072, 196608, 262144]:  # 64MiB .. 256MiB
    for t in [2, 3, 4]:
        ms = run(m, t, 1)
        print(f"m={m//1024}MiB t={t} p=1 -> {ms:.0f} ms")
""")
print()

print("8")
# 8) Unicode gotcha:
# Why must you normalize to UTF-8 before hashing? Give a one-liner in Python that ensures UTF-8 bytes.
print("""
We must normalize string into UTF-8 in order to transform string into sequence of bytes

as all hashing algorithms work with bytes only.

Beside that, unicode str is a sequence of unicode characters, not bytes.
So, different encodings (UTF-8, UTF-16, UTF-32) may map the same string into different byte sequences -> different digests.
""")
print()

print("9")
# 9) Salt mistakes:
# What happens if you reuse the same salt for all users? How do unique salts defeat rainbow tables?
print("""
Using the same salt in in multiple cases of users, passwords will result to the same hash is the passwords that are same.

For example two users two users have passwords '12356' and it will result in the same hash.

As a result, this will make possible to decrypt passwords using rainbow tables - a massive lookout of hashes to plane text).

So it would be truthful to say that using the same soul for all passwords is the same as no using salt at all.
 
Now let's describe why random salt is a good defeat for rainbow tables.

If a server code uses a random salt for each password, rainbow tables method won't work at all. When using rainbow tables method attack would be obliged to do rainbow tables for each of souls.

And if you assume salt is large enough for example 128 beats and it's random it would be large computational task.

And even if two users have the same password, but use different salts, their passwords would look unrelated.
""")
print()

print("10")
# 10) Integrity vs passwords:
# Name two good uses for SHA-256, and state again why it’s not suitable alone for passwords.
print("""
SHA–256 hashing Algorithm can be used in multiple cases.

The first one which comes up to mind is data integrity check. 

You can hatch the file and publish the hash online.

When someone is downloading the file they can check downloaded file with have some in order to be sure that it was not tempered with.
 
For example, Linux distro are published along side with cash checks in order to be sure that is image was not modified by somebody.
 
The second used case of SHA–256 is digital signatures and cryptographic protocols.

SHA–256 is widely used inside DLS/SSL protocols, bitcoin Git and digital signatures.

In this context, it acts as a security measure for insurance, authenticity, and integrity of messages or transactions.

Why SHA–256 is not suitable for password storage?

First of all, it is too fast as it was designed for fast passion on modern CPUs and GPU, so attackers can try billions of attempts per second.

Secondly, it does not support built insulting so it does not prevent rainbow table attacks or collisions across users with the same password and that is why I must be added manually.
 
And thirdly, it does not support doable work factor. It means that unlike other action techniques, such as PBKDF2, bcrypt, or Argon2id, you cannot configure SHA – 256 to deliberately slow down computation.
""")
print()
