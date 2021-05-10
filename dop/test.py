import numpy as np

A = [ 1, 2, 3, 1.0 ]
B = [ 0.4, 0.5, 0.6, 1.0 ]
C = [ 0.007, 0.008, 0.009, 1.0 ]
D = [ 1, 1.1, 1.2, 1.0 ]
E = [ 1.3, 1.4, 1.5, 1.0 ]

data = np.array([A,B,C,D,E]).T
dataT = np.array([A,B,C,D,E])

cov = np.dot(data,dataT.conj())
print(cov)
covMatrix = np.cov(data,bias=False)
print(covMatrix)

