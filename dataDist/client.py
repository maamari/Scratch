import socket

sock = socket.socket()
SERV_IP = '127.0.0.1'
SERV_PORT = 2222
BUFFER_SIZE = 2048

# Connect client
print('Connecting...')
try:
    sock.connect((SERV_IP, SERV_PORT))
except socket.error as e:
    print(str(e))

# Send data to server
while True:
    data = input('Send: ')
    try: sock.send(str.encode(data))
    except socket.error as e:
        print(str(e))
        break
    
    reply = sock.recv(BUFFER_SIZE)
    print(reply.decode('utf-8'))

sock.close()
