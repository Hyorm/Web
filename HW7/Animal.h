#ifndef Animal_H
#define Animal_H
#include <string>
#include <iostream>

using namespace std;

class Animal{

	private:
		string species;
		string habitat;
		string food;
		string type;
		
		int weight;

	public:
		Animal(string species, string food);

		string getSpecies();

		string getHabitat();

		void setHabitat(string habitat);

		string getFood();

		string getType();

		void setType(string type);

		int getWeight();

		void setWeight(int weight);

		void getInfo();

};

#endif
