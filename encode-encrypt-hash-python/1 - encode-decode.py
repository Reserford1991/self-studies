import base64
from urllib.parse import quote


print('1')
# 1) Base64 -> text
# Decode: U29mdHdhcmUgaXMgZnVuIQ==
encoded1 = "U29mdHdhcmUgaXMgZnVuIQ=="
decoded1 = base64.b64decode(encoded1).decode("utf-8")
print(decoded1)
print()

print('2')
# 2) Text -> Base64 (ASCII)
# Encode the ASCII string: Data > code
text2 = "Data > code"
encoded2 = base64.b64encode(text2.encode("utf-8")).decode()
print(encoded2)
print()

print('3')
# 3) UTF-8 → Base64
# Encode the word Привіт (Ukrainian “Hello”) as UTF-8, then Base64.
text3 = "Привіт"
utf8_bytes3 = text3.encode("utf-8")
base64_str3 = base64.b64encode(utf8_bytes3).decode("utf-8")
print(utf8_bytes3)
print(base64_str3)
print()

print('4')
# 4) Hex → text
# Convert this hex to text: 48656c6c6f2c20576f726c6421
bytes4 = "48656c6c6f2c20576f726c6421"
text4 = bytes.fromhex(bytes4).decode("utf-8")
print(text4)
print()

print('5')
# 5) Spot the encoding
# Which of these looks like Base64, which like hex?
# a) 4d616e
# b) TWFu
# c) Z29vZC1kYXk_
# (Assume URL-safe Base64 may appear.)
print("a) - hex, b) - base64, c) - base64")
print()

print('6')
# 6) Base64 padding logic
# The strings TQ==, TWE=, TWFu decode to what texts?
string6_1 = "TQ=="
string6_2 = "TWE="
string6_3 = "TWFu"
base64_string6_1 = base64.b64decode(string6_1).decode("utf-8")
print(base64_string6_1)
base64_string6_2 = base64.b64decode(string6_2).decode("utf-8")
print(base64_string6_2)
base64_string6_3 = base64.b64decode(string6_3).decode("utf-8")
print(base64_string6_3)
print()

print('7')
# 7) URL encoding
# Properly URL-encode: Alice & Bob / café
# (Spaces should be %20, keep it strict.)
url_7 = quote("Alice & bob / café", safe="")
print(url_7)
print()

print('8')
# 8) URL-safe Base64
# Convert standard Base64 a+b/c== into URL-safe Base64.
base64_8 = "a+b/c=="
url_safe_8 = base64_8.replace("+", "-").replace("/", "_")
print("URL-safe:", url_safe_8)
print()

print('9')
# 9) UTF-8 byte length
# How many UTF-8 bytes is the emoji 🙂 and what’s its Base64?
base64_9 = "🙂"
base64_encoded_9 = base64.b64encode(base64_9.encode("utf-8")).decode("utf-8")
print(base64_encoded_9)

utf8_bytes = base64_9.encode("utf-8")
print(utf8_bytes)
print(len(utf8_bytes))
print()

print('10')
# 10) Missing padding
# Will most decoders accept SGVsbG8 (no =) and what does it decode to?


def loose_b64decode(s: str) -> str:
    return base64.b64decode(s + "==="[: (4 - len(s) % 4) % 4]).decode("utf-8")


print(loose_b64decode("SGVsbG8"))
print()
