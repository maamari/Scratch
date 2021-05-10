#include <iostream>
#include <vector>
#include <numeric> 
#include <algorithm>
#include <math.h>

int main(){
std::vector< std::vector<float> > sat_los;

std::vector<float> los_matrix;
los_matrix = { 1, 2, 3, 1.0 };
sat_los.push_back(los_matrix);
los_matrix = { 0.4, 0.5, 0.6, 1.0 };
sat_los.push_back(los_matrix);
los_matrix = { 0.007, 0.008, 0.009, 1.0 };
sat_los.push_back(los_matrix);
los_matrix = { 1, 1.1, 1.2, 1.0 };
sat_los.push_back(los_matrix);
los_matrix = { 1.3, 1.4, 1.5, 1.0 };
sat_los.push_back(los_matrix);

std::vector< std::vector<float> > sat_los_temp(sat_los[0].size(),std::vector<float>());
for (unsigned int row = 0; row < sat_los.size(); row++)
  for (unsigned int col = 0; col < sat_los[0].size(); col++)
    sat_los_temp[col].push_back(sat_los[row][col]);
sat_los = sat_los_temp;

int rows = sat_los.size();
float num_sats = sat_los[0].size();
float cols = num_sats;
float mean;
//std::cout<<rows<<num_sats<<std::endl;
std::vector<float> diff(num_sats);
std::vector<float> variances;
for (unsigned int i = 0; i < rows; i++)
{
  mean = std::accumulate(sat_los[i].begin(), sat_los[i].end(), 0.0)/num_sats;

  variances.push_back(std::inner_product(sat_los[i].begin(), sat_los[i].end(), sat_los[i].begin(), 0.0,[](double const & x, double const & y) { return x + y; },[mean](double const & x, double const & y) { return (x - mean)*(y - mean); })/(num_sats-1));  
}


std::vector< std::vector<float> > sat_los_t(sat_los[0].size(),std::vector<float>());
for (unsigned int row = 0; row < sat_los.size(); row++)
  for (unsigned int col = 0; col < sat_los[0].size(); col++){
    sat_los_t[col].push_back(sat_los[row][col]);
//    std::cout << sat_los_t[col][row] << std::endl;
  }

double product[4][4];
int i, j, k;
for(i=0; i<rows; ++i)
  for(j=0; j<rows; ++j)
    for(k=0; k<cols; ++k) {
      product[i][j]+=sat_los[i][k]*sat_los_t[k][j];
    }

/*for(i=0; i<rows; ++i){
  for(j=0; j<rows; ++j)
    std::cout << product[i][j] << std::endl;
}*/

double m[16];
double inv[16];
double invOut[16];
double det;
for (unsigned int i = 0; i < rows; i++)
  for (unsigned int j = 0; j < rows; j++){
    m[(4*i)+j] = product[i][j];
    std::cout<< m[(4*i)+j] << std::endl;
  }
/*
inv[0] = m[5] * m[10] * m[15] - m[5] * m[11] * m[14] - m[9]  * m[6]  * m[15] +
         m[9] * m[7]  * m[14] + m[13] * m[6] * m[11] - m[13] * m[7]  * m[10];

inv[4] = -m[4]  * m[10] * m[15] + m[4] * m[11] * m[14] + m[8] * m[6] * m[15] -
          m[8]  * m[7]  * m[14] -m[12] * m[6]  * m[11] + m[12] * m[7]  * m[10];

inv[8] = m[4]  * m[9] * m[15] - m[4]  * m[11] * m[13] -m[8]  * m[5] * m[15] +
         m[8]  * m[7] * m[13] +m[12] * m[5] * m[11] -m[12] * m[7] * m[9];

inv[12] = -m[4]  * m[9] * m[14] + m[4]  * m[10] * m[13] + m[8]  * m[5] * m[14] -
           m[8]  * m[6] * m[13] - m[12] * m[5] * m[10] + m[12] * m[6] * m[9];

inv[1] = -m[1]  * m[10] * m[15] + m[1]  * m[11] * m[14] + m[9]  * m[2] * m[15] -
          m[9]  * m[3] * m[14] - m[13] * m[2] * m[11] + m[13] * m[3] * m[10];

inv[5] = m[0]  * m[10] * m[15] -m[0]  * m[11] * m[14] - m[8]  * m[2] * m[15] +
         m[8]  * m[3] * m[14] +m[12] * m[2] * m[11] - m[12] * m[3] * m[10];

inv[9] = -m[0]  * m[9] * m[15] + m[0]  * m[11] * m[13] + m[8]  * m[1] * m[15] -
          m[8]  * m[3] * m[13] - m[12] * m[1] * m[11] + m[12] * m[3] * m[9];

inv[13] = m[0]  * m[9] * m[14] - m[0]  * m[10] * m[13] - m[8]  * m[1] * m[14] +
          m[8]  * m[2] * m[13] + m[12] * m[1] * m[10] - m[12] * m[2] * m[9];

inv[2] = m[1]  * m[6] * m[15] - m[1]  * m[7] * m[14] -m[5]  * m[2] * m[15] +
         m[5]  * m[3] * m[14] + m[13] * m[2] * m[7] - m[13] * m[3] * m[6];

inv[6] = -m[0]  * m[6] * m[15] + m[0]  * m[7] * m[14] + m[4]  * m[2] * m[15] -
          m[4]  * m[3] * m[14] - m[12] * m[2] * m[7] + m[12] * m[3] * m[6];

inv[10] = m[0]  * m[5] * m[15] - m[0]  * m[7] * m[13] - m[4]  * m[1] * m[15] +
          m[4]  * m[3] * m[13] +m[12] * m[1] * m[7] - m[12] * m[3] * m[5];

inv[14] = -m[0]  * m[5] * m[14] +m[0]  * m[6] * m[13] + m[4]  * m[1] * m[14] -
           m[4]  * m[2] * m[13] - m[12] * m[1] * m[6] + m[12] * m[2] * m[5];

inv[3] = -m[1] * m[6] * m[11] + m[1] * m[7] * m[10] + m[5] * m[2] * m[11] -
          m[5] * m[3] * m[10] - m[9] * m[2] * m[7] + m[9] * m[3] * m[6];

inv[7] = m[0] * m[6] * m[11] - m[0] * m[7] * m[10] - m[4] * m[2] * m[11] +
         m[4] * m[3] * m[10] + m[8] * m[2] * m[7] - m[8] * m[3] * m[6];

inv[11] = -m[0] * m[5] * m[11] +m[0] * m[7] * m[9] + m[4] * m[1] * m[11] -
           m[4] * m[3] * m[9] - m[8] * m[1] * m[7] + m[8] * m[3] * m[5];

inv[15] = m[0] * m[5] * m[10] - m[0] * m[6] * m[9] - m[4] * m[1] * m[10] +
          m[4] * m[2] * m[9] +m[8] * m[1] * m[6] -m[8] * m[2] * m[5];

det = m[0] * inv[0] + m[1] * inv[4] + m[2] * inv[8] + m[3] * inv[12];

if (det == 0)
    return false;

det = 1.0 / det;
*/
for (unsigned int i = 0; i < 16; i++)
{
    invOut[i] = inv[i] * det;
    std::cout<<invOut[i]<<std::endl;
}
std::cout << variances[0] << " "<<variances[1] << " "<<variances[2] <<" "<<variances[4]<< std::endl;



return 0;
}
