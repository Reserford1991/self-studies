import base64

encoded = "U29mdHdhcmUgaXMgZnVuIQ=="
decoded = base64.b64decode(encoded).decode("utf-8")

print(decoded)