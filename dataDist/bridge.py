import sys, getopt
import threading
import socket
import time
from datetime import datetime

sock = socket.socket()  # Socket for server connection
bridge_sock = socket.socket()  # Socket for server connection
lock = threading.Lock()

BRIDGE_IP = '127.0.0.1' 
BRIDGE_PORT = 2002
BUFFER_SIZE = 2048
SERV_IP = '127.0.0.1'
SERV_PORT = 2222
logfile = 'bridge.log'

connected_clients = []  # List of clients connected to bridge
addresses = {}  # IP/Ports of clients

'''
sendData:
-------------------------------------------------
- All data is printed to a log file for debugging 
  purposes. Timers are set to print timestamps to 
  log file every 10 minutes and wipe the log file 
  every 24 hours.
- Data is received from the GPS server and passed
  accordingly to all currently connected clients.
'''
def sendData(clients, logfile):
  t = datetime.now()  
  t0 = datetime.now() 
  with open(logfile, 'w') as log:
    while True:
      time_passed = datetime.now()-t
      time_passed_24hr = datetime.now()-t0
      if time_passed.seconds >= 1:  # Print data every 10 minutes
        t = datetime.now()
        curr_time = datetime.now().strftime("%H:%M:%S")
        log.write("\n\nCurrent time: "+curr_time+"\n\n")
        log.flush()
      if time_passed_24hr.seconds >= 10:  # Clear log every 24 hours
        t0 = datetime.now()
        log.seek(0)
        log.truncate()
      
      try:
        data = sock.recv(BUFFER_SIZE)  # Receive data from server
        log.write(data.decode('utf-8'))
      except socket.error:
        log.write("Failed to receive data.")
        return
      with lock:
        for c in connected_clients:
          try: c.sendall(data)  # Send data to clients
          except socket.error:
            connected_clients.remove(c)
            print("Lost connection to: {}:{}".
                  format(addresses[c][0],str(addresses[c][1])))
            log.write("Failed to transmit data to {}:{}".
                       format(addresses[c][0],str(addresses[c][1])))
  sock.close()


'''
main:
-------------------------------------------------
- Any user configuration of server ip, port, or 
  log filename is handled. If not specified, all 
  variables will be set to defaults.
- Establish connection to the server and start up
  bridge, allowing a maximum of 50 clients to
  wait in queue
- Start up new thread to pass data to clients via 
  sendData(). As such, one thread is dedicated to
  the accepting of new clients and another to 
  passing data to connected clients
'''
def main(argv):
  global SERV_IP, SERV_PORT, logfile

  # Allow user to specify server ip, server port, logfile name
  try: opts, args = getopt.getopt(argv,"hi:p:l:",["ip=","port=","log="])
  except getopt.GetoptError: 
    print("serialport_bridge_con.py -i <server_ip> -p <server_port> -l <logfile>")
    return
  for opt, arg in opts:
    if opt == '-h':
      print('serialport_bridge_con.py -i <server_ip> -p <server_port> -l <logfile>')
      return
    elif opt in ("-i", "--ip"):
      SERV_IP = arg
    elif opt in ("-p", "--port"):
      SERV_PORT = int(arg)
    elif opt in ("-l", "--log"):
      logfile = arg

  # Connect bridge to server
  print('Connecting to server...')
  try: sock.connect((SERV_IP, SERV_PORT))
  except socket.error as e: print(str(e))
 
  # Start up bridge
  try: bridge_sock.bind((BRIDGE_IP, BRIDGE_PORT))
  except socket.error as e: print(str(e))
 
  # Make room for up to 50 clients
  print('Listening for clients...')
  bridge_sock.listen(50)
  
  # Accept/place clients on threads
  threading.Thread(target = sendData, args = (connected_clients, logfile, )).start()
  try:
    while True:
      cli, addr = bridge_sock.accept()
      connected_clients.append(cli)
      addresses[cli] = addr
      print('Connected to: {}:{}'.format(addr[0],str(addr[1])))
  except KeyboardInterrupt:  # If user terminates, close all sockets
    print("Disconnecting bridge.")
    sock.close()
  bridge_sock.close()

if __name__ == '__main__':  main(sys.argv[1:])
