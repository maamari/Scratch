#include <iostream>
#include <vector>
#include <numeric> 
#include <algorithm>
#include <math.h>

int main(){
std::vector< std::vector<float> > los_matrix;

std::vector<float> sat_los;
float azi_ele[9][2] = {{192.97,16.86},
  {19.89,63.35},
  {65.046,36.42},
  {172.43,21.28},
  {268.54,62.91},
  {119.2,50.78},
  {313.71,10.75},
  {91.05,67.14},
  {343.73,35.79}};

for (int i = 0; i < 9; i++){
  float az = azi_ele[i][0];
  float el = azi_ele[i][1];

  std::vector<float> sat_los = {sin(az)*cos(el),cos(az)*sin(el),sin(el),1.0};
  los_matrix.push_back(sat_los);
}

for (unsigned int row = 0; row < los_matrix.size(); ++row)
  for (unsigned int col = 0; col < los_matrix[0].size(); ++col){
    std::cout<<los_matrix[row][col]<<std::endl;
  }
std::cout<<std::endl;


/*
sat_los = { 1, 2, 3, 1.0 };
los_matrix.push_back(sat_los);
sat_los = { 0.4, 0.5, 0.6, 1.0 };
los_matrix.push_back(sat_los);
sat_los = { 0.007, 0.008, 0.009, 1.0 };
los_matrix.push_back(sat_los);
sat_los = { 1, 1.1, 1.2, 1.0 };
los_matrix.push_back(sat_los);
sat_los = { 1.3, 1.4, 1.5, 1.0 };
los_matrix.push_back(sat_los);
*/

/*
// Transpose
std::vector< std::vector<float> > los_matrix_T(los_matrix[0].size(), std::vector<float>());
for (unsigned int row = 0; row < los_matrix.size(); ++row)
  for (unsigned int col = 0; col < los_matrix[0].size(); ++col){
    std::cout<<los_matrix[row][col]<<std::endl;
	  los_matrix_T[col].push_back(los_matrix[row][col]);
  }
std::cout<<std::endl;

for (unsigned int row = 0; row < los_matrix_T.size(); ++row)
  for (unsigned int col = 0; col < los_matrix_T[0].size(); ++col){
    std::cout<<los_matrix_T[row][col]<<std::endl;
  }
std::cout<<std::endl;
*/
float num_sats = los_matrix.size();   // Number of satellites (rows)
int cols = los_matrix[0].size();            // LoS terms (cols)
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
/*
double cov[cols][cols];
int r1 = cols;
int c1 = rows;
int c2 = cols;
for (unsigned int i = 0; i < r1; i++)
  for (unsigned int j = 0; j < c2; j++)
	  for (unsigned int k = 0; k < c1; k++){
      cov[i][j] += (los_matrix_T[i][k]*los_matrix[k][j])/(num_sats-1);
    }

for(unsigned int i=0; i<cols; ++i){
  for(unsigned int j=0; j<cols; ++j)
    std::cout << cov[i][j] << std::endl;
}
std::cout<<std::endl;
*/
std::cout << variances[0] << " "<<variances[1] << " "<<variances[2] <<" "<<variances[4]<< std::endl;

return 0;
}
