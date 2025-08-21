print("1.	Why hybrid? Explain why we don’t encrypt large files with RSA directly.")
print("""
Hybrid encryption, AES plus LSA is used because AES encryption is used for large amounts of data and HSA is mostly used for small amounts of data because it is hard harder to decrypt.
So in order to transfer files using AES we should encrypt our key, which is symmetric means the same for both sides with a public key of an open end and transfer it to receiving party.
This way TLS transmission work.
""")
print()

print("2.	Modes: Why is AES-ECB insecure? Give an example of information it leaks.")
print("""
AES–ECB is insecure because it has pattern leaks.
ECB encrypts identical plane text blocks to identical ciphertext blocks.
In other words, it licks patterns/structure for example "TUX" image still looks like TUX.
It provides confidentiality, but not semantic security.
""")
print()

print("3.	GCM nonce: What goes wrong if the same nonce is reused with the same key?")
print("""
When GCM nose is reused the same key it reveals XOR of plane, texts (key stream reuse).
It also enables forgery of valid tags which breaks in integrity and authenticity.
""")
print()

print("4.	OAEP vs PSS: Which is for encryption and which for signatures? Why are they preferred?")
print("""
OAEP is preferred for encryption as a pending scheme (probabilistic, IND–CCA secure)
""")
print()

print("5.	Integrity: With AES-CBC(no MAC), what attack becomes possible? What pattern prevents it?")
print("""
It is vulnerable padding-oracle and bit-flipping attacks as it does not have an integrity.
Prevent with AEAD (e.g., AES-GCM, AES-SIV) or at least Encrypt-then-MAC (e.g., HMAC over IV+ciphertext).
""")
print()

print("6.	Key sizes: When would you choose AES-128 vs AES-256? Tradeoffs?")
print("""
AES–128 is already very strong and usually slightly faster than AES–256.
AES-256 has great security margin.
So we should choose AES–128 for performance critical general use and AES–256 for long term and high value data.
""")
print()

print("7.	Key storage: Name two safe places/approaches to store private keys in production.")
print("""
•	HSM/KMS (e.g., AWS KMS, GCP KMS, Azure Key Vault) or on-prem HSM/TPM—keys never leave protected hardware.
•	Encrypted at rest with access control (e.g., PEM with strong passphrase) + OS keychain/secret manager (HashiCorp Vault) + strict permissions.
""")
print()

print("8.	Password-to-key: How do you turn a user password into an AES key safely?")
print("""
•	Use a password-based KDF: Argon2id (preferred) or scrypt (or PBKDF2 if required).
•	Use a unique random salt, tune cost parameters (memory/time), derive exactly key_len (e.g., 32 bytes for AES-256).
•	Store salt + KDF params alongside ciphertext.
""")
print()

print("9.	Auth data(AAD): What’s AAD in AES-GCM and when is it useful?")
print("""
AAD or additional authenticated data it is an encrypted but authenticated data.
It is used to bind metadata of headers, for example, protocol version content type sequence number, so they can't be tempered without detection.
""")
print()

print("10.	Performance: Which is typically faster: AES-GCM or RSA-OAEP? Why does that matter for protocol design?")
print("""
•	AES-GCM is orders of magnitude faster (symmetric, can use CPU AES-NI).
•	RSA-OAEP is slow (big-integer ops); also limited in plaintext size.
•	Hence protocols use RSA/ECC only to protect small keys, and AES for all bulk data (the hybrid design).
""")
print()
