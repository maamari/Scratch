#include <iostream>

int main(){
  std::cout << "Enter values: " << std::endl;
  
  int val1;
  int val2;
  std::cin >> val1 >> val2;
  std::cout << "Sum of input is: " << val1+val2 << std::endl;

  int pre = 5;
  int post = 5;
  std::cout << ++pre << std::endl;
  std::cout << post++ << std::endl;  
  std::cout << post << std::endl;

  int input;
  int output;
  while(std::cin>>input){
    output+=input;
  }
  std::cout << output << std::endl;
  return 0;
}
