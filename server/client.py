import socket

sock = socket.socket()
SERV_IP = '127.0.0.1'
SERV_PORT = 2002
BUFFER_SIZE = 2048

# Connect client
print('Connecting to bridge...')
try:
    sock.connect((SERV_IP, SERV_PORT))
    print('Connected.')
except socket.error as e:
    print(str(e))

# Send data to server
while True:
    reply = sock.recv(BUFFER_SIZE)
    print(reply.decode('utf-8'))
sock.close()
