#include <iostream>
#include <vector>
#include <numeric> 
#include <algorithm>
#include <math.h>

int main(){
std::vector< std::vector<float> > los_matrix_T;

std::vector<float> sat_los;
sat_los = { 1, 2, 3, 1.0 };
los_matrix_T.push_back(sat_los);
sat_los = { 0.4, 0.5, 0.6, 1.0 };
los_matrix_T.push_back(sat_los);
sat_los = { 0.007, 0.008, 0.009, 1.0 };
los_matrix_T.push_back(sat_los);
sat_los = { 1, 1.1, 1.2, 1.0 };
los_matrix_T.push_back(sat_los);
sat_los = { 1.3, 1.4, 1.5, 1.0 };
los_matrix_T.push_back(sat_los);

// Reformat the line-of-sight matrix to get the original
int cols_T = los_matrix_T[0].size();
std::vector< std::vector<float> > los_matrix(cols_T, std::vector<float>());
for (unsigned int row = 0; row < los_matrix_T.size(); ++row)
  for (unsigned int col = 0; col < los_matrix_T[0].size(); ++col)
	los_matrix[col].push_back(los_matrix_T[row][col]);

float num_sats = los_matrix[0].size();   // Number of satellites (rows)
int cols = los_matrix.size();            // LoS terms (cols)
int rows = num_sats;
float mean;
std::vector<float> variances;

// Iterate through each LoS component and determine the variance
for (unsigned int i = 0; i < cols; i++)
{
mean = std::accumulate(los_matrix[i].begin(), los_matrix[i].end(), 0.0) / num_sats;

variances.push_back(std::inner_product(los_matrix[i].begin(),
	los_matrix[i].end(), los_matrix[i].begin(), 0.0,
	[](double const & x, double const & y) { return x + y; },
	[mean](double const & x, double const & y)
	{ return (x - mean)*(y - mean); })/(num_sats-1.0));
}
 
double cov[cols][cols];
for (unsigned int matrix1col = 0; matrix1col < cols; matrix1col++)
  for (unsigned int matrix2row = 0; matrix2row < cols; matrix2row++)
	  for (unsigned int matrix1row = 0; matrix1row < rows; matrix1row++){
      cov[matrix1col][matrix2row] += (los_matrix[matrix1col][matrix1row]*los_matrix_T[matrix1row][matrix2row])/((cols*cols)-1);
    }

for(unsigned int i=0; i<cols; ++i){
  for(unsigned int j=0; j<cols; ++j)
    std::cout << cov[i][j] << std::endl;
}
std::cout<<std::endl;
std::cout << variances[0] << " "<<variances[1] << " "<<variances[2] <<" "<<variances[4]<< std::endl;

return 0;
}
