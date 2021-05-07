import socket
import os
from _thread import *
import random 
import time

sock = socket.socket()
TCP_IP = '127.0.0.1'
TCP_PORT = 2222
BUFFER_SIZE = 2048
clients = []

# Start server
try:
    sock.bind((TCP_IP, TCP_PORT))
except socket.error as e:
    print(str(e))

# Listen for client
print('Waiting for bridge...')
sock.listen(5)

# Accept new client on thread
def new_client(client):
    while True:
        #data = client.recv(BUFFER_SIZE)
        time.sleep(1)
        data = str(random.randint(0,9))
        for c in clients:
            c.sendall(data.encode('utf-8'))
    client.close()

# Accept/place clients on threads
while True:
    cli, addr = sock.accept()
    clients.append(cli)
    print('Connected to: ' + addr[0] + ':' + str(addr[1]))
#    for c in clients:
#        time.sleep(2)
#        data = random.randint(0,9)**2        
#        c.sendall(str(data).encode('utf-8'))
    start_new_thread(new_client, (cli, ))
sock.close()
