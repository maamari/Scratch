import socket
import os
from _thread import *

sock = socket.socket()
TCP_IP = '127.0.0.1'
TCP_PORT = 2222
BUFFER_SIZE = 2048

# Start server
try:
    sock.bind((TCP_IP, TCP_PORT))
except socket.error as e:
    print(str(e))

# Listen for client
print('Waiting for client...')
sock.listen(5)

# Accept new client on thread
def new_client(client):
    while True:
        data = client.recv(BUFFER_SIZE)
        client.sendall(str.encode("Received!"))
    client.close()

# Accept/place clients on threads
while True:
    cli, addr = sock.accept()
    print('Connected to: ' + addr[0] + ':' + str(addr[1]))
    start_new_thread(new_client, (cli, ))
sock.close()
