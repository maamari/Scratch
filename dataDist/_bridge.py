import socket
import threading
import time

sock = socket.socket()
bridge_sock = socket.socket()
lock = threading.Lock()
SERV_IP = '127.0.0.1'
SERV_PORT = 2222
BRIDGE_IP = '127.0.0.1'
BRIDGE_PORT = 2002
BUFFER_SIZE = 2048

connectedClients = []
addresses = {}

# Relay data to clients
def newClient(clients):
  firstPass = True
  while True:
    try: data = sock.recv(BUFFER_SIZE)
    except socket.error: 
        sock.close()
        return
    if firstPass == True:
      firstPass = False
      continue
    with lock:
      for c in connectedClients:
        try: c.sendall(data)
        except socket.error:
          connectedClients.remove(c)
          print("Lost connection to: {}:{}".
                format(addresses[c][0],str(addresses[c][1])))
  sock.close()

def main():
  # Connect bridge to server
  print('Connecting to server...')
  try: sock.connect((SERV_IP, SERV_PORT))
  except socket.error as e: print(str(e))

  # Start up bridge
  try: bridge_sock.bind((BRIDGE_IP, BRIDGE_PORT))
  except socket.error as e: print(str(e))

  # Make room for up to 50 clients (can be more if need be)
  print('Listening for clients...')
  bridge_sock.listen(50)

  # Accept/place clients on threads
  thr = threading.Thread(target = newClient, args = (connectedClients, ))
#  thr.daemon = True
  thr.start()
#  thr.join()
  try:
    while True:
      cli, addr = bridge_sock.accept()
      connectedClients.append(cli)
      addresses[cli] = addr
      print('Connected to: {}:{}'.format(addr[0],str(addr[1])))
  except KeyboardInterrupt:
    print("Disconnecting bridge.")
    sock.close()
  bridge_sock.close()

if __name__ == '__main__': main()
