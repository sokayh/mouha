import hashlib
import sys

def hash_password_md5(password: str) -> str:
    """Hash a password using MD5."""
    md5_hash = hashlib.md5(password.encode())
    return md5_hash.hexdigest()

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Error: Password not provided.")
        sys.exit(1)
    password = sys.argv[1]
    print(hash_password_md5(password))  # Print the hashed password