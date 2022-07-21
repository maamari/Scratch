#include <iostream>
#include <string>
#include <fstream>
#include <vector>

using namespace std;

int main()
{
	std::ifstream file("plan.plan");
	std::string str;

	std::string temp = "";
	std::string delimiter = ",";
	int start_flag = 0;

	vector<vector<float>> waypoints;
	
	cout << "[";
	while (std::getline(file, str))
	{
		// Process str
		//cout << str << endl;

		// find params key
		int index = str.find("params");
		if (index >= 0)
		{
			temp = "";
			start_flag = 1;
		}
		
		if (start_flag == 1) // if params key is started
		{
			temp += str;
			index = str.find("]");
			if (index >= 0)
			{
				start_flag = 0;
				
				// find [, ]
				int index1 = temp.find("[");
				int index2 = temp.find("]");
				temp = temp.substr(index1 + 1, index2 - index1 - 1);

				//cout << temp;

				// split string
				size_t pos = 0;
				std::string token;
				std::vector<string> params;
				while ((pos = temp.find(delimiter)) != std::string::npos) {
					token = temp.substr(0, pos);
					//std::cout << token << std::endl;
					params.push_back(token);
					temp.erase(0, pos + delimiter.length());
				}
				//std::cout << temp << std::endl;
				params.push_back(temp);

				// get last 3 elements
				if (params.size() >= 3)
				{
					vector<float> pt;
					pt.push_back(stof(params.at(params.size() - 3)));
					pt.push_back(stof(params.at(params.size() - 2)));
					pt.push_back(stof(params.at(params.size() - 1)));

					waypoints.push_back(pt);

					cout << "[" << pt[0] << ", " << pt[1] << ", " << pt[2] << "],";
				}


			}
		}

		
	}

	cout << "]" << endl;
return 0;
}
