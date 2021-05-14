import numpy as np

A = [ 1, 2, 3, 1.0 ]
B = [ 0.4, 0.5, 0.6, 1.0 ]
C = [ 0.007, 0.008, 0.009, 1.0 ]
D = [ 1, 1.1, 1.2, 1.0 ]
E = [ 1.3, 1.4, 1.5, 1.0 ]

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
