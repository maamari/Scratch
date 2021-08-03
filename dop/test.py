import numpy as np
from  numpy.linalg import inv

A = [ 3.29, 0.34, 0.19, 0.16 ]
B = [ 0.34, 2.7,-0.27, -0.062 ]
C = [ 0.19, -0.27, 4.42, 6.08 ]
D = [ 0.162, -0.062, 6.08, 11 ]

print(inv(np.array([A,B,C,D])))
'''
data = np.array([A,B,C,D,E]).T
dataT = np.array([A,B,C,D,E])

cov = np.dot(data,dataT.conj())
#print(cov)
covMatrix = np.cov(data,bias=False)
#print(covMatrix)

###########################################

m = data
m = np.asarray(m)
dtype = np.result_type(m, np.float64)
X = np.array(m, ndmin=2, dtype=dtype)
#print(X)
ddof = 1

# Get the product of frequencies and weights
w = None
avg, w_sum = np.average(X, axis=1, weights=w, returned=True)
w_sum = w_sum[0]
#print(avg)

# Determine the normalization
fact = X.shape[1] - ddof

X -= avg[:, None]
print(X)
X_T = X.T
#print(X_T)
print(X_T.conj())
c = np.dot(X, X_T.conj())
#print(c)
c *= np.true_divide(1, fact)
#print(c)
#print(c.squeeze())
#print(c.squeeze())
'''
