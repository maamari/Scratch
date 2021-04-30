#include <iostream>

int main(){
  std::cout << "Enter values: " << std::endl;
  
  int val1;
  int val2;
  std::cin >> val1 >> val2;
  
  std::cout << "Sum of input is: " << val1+val2 << std::endl;
  return 0;
}
