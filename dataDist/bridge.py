import socket
import threading
import queue
import time

SERV_IP = '127.0.0.1'
SERV_PORT = 2222
BUFFER_SIZE = 2048

print('Connecting to server...')
try:
    sock=socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    sock.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
    sock.connect((SERV_IP, SERV_PORT))
except socket.error as e:
    print(str(e))

while(True):
    try:
        data = sock.recv(BUFFER_SIZE)
        print(data.decode('utf-8'))
    except KeyboardInterrupt:
        sock.close()
